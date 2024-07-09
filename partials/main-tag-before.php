<!DOCTYPE html>
<html <? language_attributes() ?>>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="<? bloginfo("charset") ?>">
  <? wp_head() ?>
</head>

<body class="overflow-hidden">
  <div id="loading-overlay" class="flex justify-center items-center fixed inset-0 w-full h-screen bg-slate-800">
    <i class="fa-solid fa-circle-notch animate-spin text-slate-200 text-3xl"></i>
    <span class="sr-only">Loading...</span>
  </div>

  <div class="md:container md:my-16 bg-slate-200">
    <? wp_body_open() ?>
    <div>
      <? get_header() ?>
    </div>

    <main class="flex-grow bg-white my-8 py-10">
