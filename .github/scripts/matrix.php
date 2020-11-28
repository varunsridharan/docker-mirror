<?php
#define( 'BASE_PATH', $_ENV['GITHUB_WORKSPACE'] );
define( 'BASE_PATH', __DIR__ . './../../' );

$paths  = glob( BASE_PATH . '*/*' );
$return = array();
foreach ( $paths as $path ) {
	$image_name    = basename( dirname( $path ) );
	$image_version = basename( $path );
	$return[]      = array(
		'name' => $image_name . ':' . $image_version,
		'file' => $image_name . '/' . $image_version,
	);
}

$return = json_encode( $return );

echo "::set-output name=dockerinfo::$return";

echo $return;
