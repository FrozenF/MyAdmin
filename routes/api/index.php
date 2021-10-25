<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

#To Find Another Routes Files
$dir   = base_path('routes/api');

#Scan File To Dir
$files = scandir( $dir );

foreach ( $files as $file ) {
    if (!in_array($file, array( '.', '..', 'index.php' ))){
        require $dir . '/' . $file;
    }
};
