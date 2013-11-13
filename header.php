<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
  <meta charset="utf-8">
  <meta name="author" content="K. Chikuse">
  <meta name="description" content="Bible powered library management system"/>
  <meta name="robots" content="index, follow"/>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />   
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
</head>
<body class="single single-book">
  <div id="wrapper">
    <div id="casing">
     <div id="content">