<!DOCTYPE html>
<html <? language_attributes() ?>>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="<? bloginfo("charset") ?>">
  <? wp_head() ?>
</head>

<body class="md:container md:mt-16 flex flex-col h-screen bg-slate-200">
  <? wp_body_open() ?>
  <div class="mb-4">
    <? get_header() ?>

    <? # TODO: Add this to the left sidebar menu= get_sidebar() 
    ?>
  </div>

  <main class="flex-grow bg-white py-10 mb-4 px-0">
