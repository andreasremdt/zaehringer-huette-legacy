<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Willkommen auf der Zähringer Hütte im idyllischen Naturschutzgebiet des Schwarzwaldes. Genießen Sie entspannende Tage in rustikaler Atmosphäre.">

    <?php wp_head(); ?>

    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php bloginfo('url'); ?>">
    <meta property="og:title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
    <meta property="og:description" content="Willkommen auf der Zähringer Hütte im idyllischen Naturschutzgebiet des Schwarzwaldes. Genießen Sie entspannende Tage in rustikaler Atmosphäre.">
    <meta property="og:image" content="<?php header_image(); ?>">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="<?= get_custom_header()->width; ?>">
    <meta property="og:image:height" content="<?= get_custom_header()->height; ?>">
  </head>
  <body <?php body_class(); ?>>

    <?php get_template_part('template-parts/contact-information'); ?>
    <?php get_template_part('template-parts/main-header'); ?>
    <?php get_template_part('template-parts/main-navigation'); ?>

    <?php if(is_front_page()) : ?>
      <?php get_template_part('template-parts/hero-banner'); ?>
    <?php endif; ?>
    