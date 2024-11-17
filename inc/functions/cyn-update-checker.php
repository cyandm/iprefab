<?php
require( get_stylesheet_directory() . '/inc/libs/plugin-update-checker/plugin-update-checker.php' );
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/cyandm/iprefab/', //github theme
	get_stylesheet_directory(),
	'cyandm' //theme slug
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch( 'amirtanazzoh' );