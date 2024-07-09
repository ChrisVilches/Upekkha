<!DOCTYPE html>
<html <? language_attributes() ?>>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="<? bloginfo("charset") ?>">
  <? wp_head() ?>
</head>

<body class="md:container md:my-16 bg-slate-200 dark:bg-slate-900 overflow-hidden">
  <div id="loading-overlay" class="flex justify-center items-center fixed inset-0 w-full h-screen bg-slate-800 z-50">
    <i class="fa-solid fa-circle-notch animate-spin text-slate-200 text-3xl"></i>
    <span class="sr-only">Loading...</span>
  </div>

  <? wp_body_open() ?>
  <div>
    <? get_header() ?>
  </div>

  <!-- Must be hidden so that the theme switch doesn't do any color transition. -->
  <main class="flex-grow bg-white dark:bg-slate-600 dark:text-white my-8 py-10 hidden" id="main-container">

    <div class="bg-yellow-200 text-black p-4 rounded-md hidden dark:block mx-4 mb-20">
      Dark theme is in development! It's not complete right now.
    </div>
