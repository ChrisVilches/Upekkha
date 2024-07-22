<!DOCTYPE html>
<html <? language_attributes() ?> x-init :class="$store.theme.currentTheme">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="<? bloginfo("charset") ?>">
  <? wp_head() ?>
</head>

<body class="md:container md:my-16 bg-slate-200 dark:bg-slate-900 overflow-hidden">
  <div id="loading-overlay" class="flex justify-center items-center fixed inset-0 w-full h-screen bg-slate-800 z-50">
    <? /* Hardcode the SVG (for slow connections) */ ?>
    <svg class="text-slate-200 size-8 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
      <path fill="currentColor" d="M222.7 32.1c5 16.9-4.6 34.8-21.5 39.8C121.8 95.6 64 169.1 64 256c0 106 86 192 192 192s192-86 192-192c0-86.9-57.8-160.4-137.1-184.1c-16.9-5-26.6-22.9-21.5-39.8s22.9-26.6 39.8-21.5C434.9 42.1 512 140 512 256c0 141.4-114.6 256-256 256S0 397.4 0 256C0 140 77.1 42.1 182.9 10.6c16.9-5 34.8 4.6 39.8 21.5z" />
    </svg>
    <span class="sr-only">Loading...</span>
  </div>

  <? wp_body_open() ?>
  <div>
    <? get_header() ?>
  </div>

  <!-- Must be hidden so that the theme switch doesn't do any color transition. -->
  <main class="flex-grow bg-white dark:bg-slate-600 dark:text-white my-8 py-10 hidden" id="main-container">
