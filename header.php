<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Willkommen auf der Zähringer Hütte im idyllischen Naturschutzgebiet des Schwarzwaldes. Genießen Sie entspannende Tage in rustikaler Atmosphäre.">

    <?php wp_head(); ?>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri(); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?= get_template_directory_uri(); ?>/site.webmanifest">
    <link rel="mask-icon" href="<?= get_template_directory_uri(); ?>/safari-pinned-tab.svg" color="#a29061">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#292b2c">

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
    