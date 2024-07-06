<!DOCTYPE html>
<html <? language_attributes() ?>>

<head>
  <meta charset="<? bloginfo("charset") ?>">
  <? wp_head() ?>
</head>

<body class="flex flex-col h-screen bg-slate-200">
  <? wp_body_open() ?>
  <div class="md:mt-16 mb-4">
    <? get_header() ?>

    <? # TODO: Add this to the left sidebar menu= get_sidebar() 
    ?>
  </div>

  <main class="container flex-grow bg-white py-10 mb-4 px-0">
