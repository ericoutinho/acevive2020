<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link rel="icon" type="image/png" sizes="32x32" href="<?=get_template_directory_uri()?>/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=get_template_directory_uri()?>/favicon-16x16.png">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
		<?php wp_body_open(); ?>

		<?php get_template_part('template-parts/template','menu');