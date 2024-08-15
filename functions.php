<?php
//PHP Libs
require_once( __DIR__ . '/inc/libs/SimpleXLSXEx.php' );
require_once( __DIR__ . '/inc/libs/SimpleXLSX.php' );

//Functions
require_once( __DIR__ . '/inc/functions/cyn-theme-init.php' );
require_once( __DIR__ . '/inc/functions/cyn-register.php' );
require_once( __DIR__ . '/inc/functions/cyn-customize.php' );
require_once( __DIR__ . '/inc/functions/cyn-acf.php' );
require_once( __DIR__ . '/inc/functions/cyn-general.php' );
require_once( __DIR__ . '/inc/functions/cyn-render.php' );
require_once( __DIR__ . '/inc/functions/cyn-sort.php' );
require_once( __DIR__ . '/inc/functions/cyn-update-checker.php' );
require_once( __DIR__ . '/inc/functions/cyn-api.php' );
require_once( __DIR__ . '/inc/functions/cyn-metabox.php' );
require_once( __DIR__ . '/inc/functions/cyn-posttype.php' );

//Classes
require_once( __DIR__ . '/inc/class/cyn-upload-excel.php' );

$cyn_upload_excel = new cyn_upload_excel();

