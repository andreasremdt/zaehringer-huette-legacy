<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>
  </head>
  <body class="<?php body_class(); ?>">

    <?php get_template_part('template-parts/contact-information'); ?>
    <?php get_template_part('template-parts/main-header'); ?>
    <?php get_template_part('template-parts/main-navigation'); ?>