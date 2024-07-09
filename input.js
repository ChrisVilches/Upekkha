import { Modal, Carousel } from "flowbite";
import qr from "qr-encode";

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
      modalElement.querySelector("input[type=text]").focus();
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

function initRecommendedCarousel() {
  const element = document.getElementById("recommended-carousel");
  if (!element) return;

  const items = Array.from(
    document.querySelectorAll("[data-carousel-item]"),
  ).map((el, position) => {
    return { position, el };
  });

  const indicators = Array.from(
    document.querySelectorAll("[data-carousel-indicator]"),
  ).map((el, position) => {
    return { position, el };
  });

  const options = {
    defaultPosition: 0,
    interval: 3000,
    indicators: {
      items: indicators,
      // NOTE: Indicator style can be set here.
      //       Add JS files to Tailwind content in order to write classes here.
      // activeClasses: 'bg-slate-600',
      // inactiveClasses: 'bg-slate-200',
    },
  };

  const instanceOptions = {
    id: "recommended-carousel",
    override: true,
  };

  const carousel = new Carousel(element, items, options, instanceOptions);
  carousel.cycle();

  document
    .querySelector("[data-carousel-prev]")
    .addEventListener("click", carousel.prev.bind(carousel));
  document
    .querySelector("[data-carousel-next]")
    .addEventListener("click", carousel.next.bind(carousel));
}

function genQrSingle(selector, container) {
  const element = container.querySelector(selector);
  const content = element.getAttribute("data-qr-content");
  element.src = qr(content, { type: 6, size: 6, level: "Q" });
}

function initLineModalBtns() {
  for (const element of document.querySelectorAll(
    "[data-role=line-modal-btn]",
  )) {
    element.addEventListener("click", () => {
      const modalId = element.getAttribute("data-modal-target");
      const modalElement = document.querySelector(`#${modalId}`);
      genQrSingle("[data-role=line-qr]", modalElement);
    });
  }
}

document.addEventListener("DOMContentLoaded", () => {
  initSearchModal();
  initRecommendedCarousel();
  initLineModalBtns();
});
