// TODO: Not yet tested with actual screen readers or tools like that.

function elementInsideContainer($el, $container) {
  if (!$el) return false;
  return (
    $el === $container || elementInsideContainer($el.parentElement, $container)
  );
}

export const createFocusTrap = ($container) => {
  const $defaultFocus = $container.querySelector("button, a, input");

  return () => {
    if (!$defaultFocus) return;

    if (!elementInsideContainer(document.activeElement, $container)) {
      $defaultFocus.focus();
    }
  };
};
