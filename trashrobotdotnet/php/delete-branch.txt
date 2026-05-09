<?php

$branchname = $_POST["branchname"];//get name of branch to delete

rrmdir($branchname);//run recursive delet function

function rrmdir($src) {
    $dir = opendir($src);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            $full = $src . '/' . $file;
            if ( is_dir($full) ) {
                rrmdir($full);
            }
            else {
                unlink($full);//this is the delete command
            }
        }
    }
    closedir($dir);
    rmdir($src);
}


?>