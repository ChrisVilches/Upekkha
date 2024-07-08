<!DOCTYPE html>
<html <? language_attributes() ?>>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="<? bloginfo("charset") ?>">
  <? wp_head() ?>
</head>

<body class="md:container md:my-16 bg-slate-200">
  <? wp_body_open() ?>
  <div>
    <? get_header() ?>

    <? # TODO: Add this to the left sidebar menu= get_sidebar() 
    ?>
  </div>

  <main class="flex-grow bg-white my-8 py-10">
