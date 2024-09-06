// TODO: Not yet tested with actual screen readers or tools like that.

function elementInsideContainer($el, $container) {
  if (!$el) return false;
  return (
    $el === $container || elementInsideContainer($el.parentElement, $container)
  );
}

export class FocusTrap {
  constructor($container) {
    const $interactive = $container.querySelectorAll("button, a, input");

    this.$container = $container;
    this.enabled = false;

    this.handlerFn = this.handler.bind(this);
    if ($interactive.length === 0) return;

    this.$first = $interactive[0];
    this.$last = $interactive[$interactive.length - 1];
  }

  handler({ key }) {
    if (key !== "Tab") return;

    let $active = document.activeElement;
    if (!$active) return;

    const outside = !elementInsideContainer($active, this.$container);

    if (outside && this.$prev === this.$first) {
      this.$last.focus();
      $active = this.$last;
    } else if (outside) {
      this.$first.focus();
      $active = this.$first;
    }

    this.$prev = $active;
  }

  enable() {
    if (this.enabled) return;
    this.$prev = null;
    this.enabled = true;
    window.addEventListener("keyup", this.handlerFn);
  }

  disable() {
    if (!this.enabled) return;
    this.enabled = false;
    window.removeEventListener("keyup", this.handlerFn);
  }
}
