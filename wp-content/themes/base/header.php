<?php
$url = site_url();
?>
<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= site_url()."/wp-content/themes/".get_template()."/style.css"; ?>">
    <script src="https://kit.fontawesome.com/73ba95509c.js" crossorigin="anonymous"></script>
  <title>Hello, world!</title>
</head>

<body>
  <!-- Vertical navbar -->
<div class="vertical-nav bgmenu" id="sidebar">
  <div class="py-4 px-3 mb-4 ">
    <div class="media d-flex align-items-center"><img src="wp-content/uploads/2021/01/logo.png" alt="Logo Paper" width="100%" class="mr-3">
    </div>
  </div>

<?php
wp_nav_menu(array(
      'menu'                 => '',
      'container'            => 'nav',
      'container_class'      => 'nav flex-column  mb-0',
      'container_id'         => '',
      'container_aria_label' => '',
      'menu_class'           => 'menu',
      'menu_id'              => '',
      'echo'                 => true,
      'fallback_cb'          => 'wp_page_menu',
      'before'               => '',
      'after'                => '',
      'link_before'          => '',
      'link_after'           => '',
      'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'item_spacing'         => 'preserve',
      'depth'                => 0,
      'walker'               => '',
      'theme_location'       => '',
));
?>

</div> 
<!-- End vertical navbar  -->


<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-light rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"> Menu</small></button>