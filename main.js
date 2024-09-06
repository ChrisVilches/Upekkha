import { Modal, Drawer } from "flowbite";
import Alpine from "alpinejs";
import { themeStore } from "./theme-store";
import { lineQr } from "./line-qr";
import { createFocusTrap } from "./focus-trap";

function initSidebar(sidebarId) {
  const $targetEl = document.getElementById(sidebarId);
  const $content = $targetEl.querySelector("[data-role=sidebar-content]");
  $content.classList.add("hidden");

  const trap = createFocusTrap($content);

  const options = {
    placement: "left",
    onHide: () => {
      window.removeEventListener("focusin", trap);
      setTimeout(() => {
        $content.classList.add("hidden");
      }, 300);
    },
    onShow: () => {
      $content.classList.remove("hidden");
      window.addEventListener("focusin", trap);
    },
  };

  return new Drawer($targetEl, options);
}

function initSearchModal() {
  const modalElement = document.querySelector("#search-modal");

  // Don't submit search form if input is empty
  modalElement.querySelector("form").addEventListener("submit", (ev) => {
    const formElement = ev.target;
    const formData = new FormData(formElement);
    if ((formData.get("s") ?? "").trim().length === 0) {
      ev.preventDefault();
    }
  });

  // Focus on the search input when the search modal is shown.
  const options = {
    onShow: () => {
      if (!isMobile()) {
        modalElement.querySelector("input[type=text]").focus();
      }
    },
  };

  const searchModal = new Modal(modalElement, options);

  for (const element of document.querySelectorAll(
    "button[data-open-search-modal]",
  )) {
    element.addEventListener("click", () => {
      searchModal.show();
    });
  }
}

let isMobileMemo = null;

function isMobile() {
  if (isMobileMemo !== null) return isMobileMemo;
  isMobileMemo = false;
  try {
    isMobileMemo = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
  } catch {}
  return isMobileMemo;
}

function removeLoadingOverlay() {
  const overlayElement = document.querySelector("#loading-overlay");
  const seconds = 0.3;
  overlayElement.style.transition = `opacity ${seconds}s linear 0s`;
  overlayElement.style.opacity = 0;
  document.body.classList.remove("overflow-hidden");
  setTimeout(() => {
    overlayElement.remove();
  }, seconds * 1000);
}

document.addEventListener("DOMContentLoaded", () => {
  initSearchModal();
  initSidebar("sidebar-drawer");
  removeLoadingOverlay();
});

Alpine.store("theme", themeStore);
Alpine.data("lineQr", lineQr);
Alpine.start();
