function elementInsideContainer($el, $container) {
  if (!$el) return false;
  return (
    $el === $container || elementInsideContainer($el.parentElement, $container)
  );
}

export const createFocusTrap = ($container, $defaultFocus) => () => {
  if (!elementInsideContainer(document.activeElement, $container)) {
    if ($defaultFocus) {
      $defaultFocus.focus();
    }
  }
};
