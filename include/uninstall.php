<?php

function xoops_module_uninstall_xComics(&$module)
{
    $cacheDir = XOOPS_ROOT_PATH . '/uploads/xComics';

    //Always check if a directory exists prior to creation

    if (!is_dir($cacheDir)) {
        return true;
    }
  

    return rmdirr($cacheDir);
}

/**
 * Delete a file, or a folder and its contents
 *
 * @param string $dirname The directory to delete
 * @return      bool     Returns true on success, false on failure
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0
 */
function rmdirr($dirname)
{
    // Simple delete for a file

    if (is_file($dirname)) {
        return unlink($dirname);
    }

    // Loop through the folder

    $dir = dir($dirname);

    while (false !== $entry = $dir->read()) {
        // Skip pointers

        if ('.' == $entry || '..' == $entry) {
            continue;
        }

        // Deep delete directories

        if (is_dir("$dirname/$entry")) {
            rmdirr("$dirname/$entry");
        } else {
            unlink("$dirname/$entry");
        }
    }

    // Clean up

    $dir->close();

    return rmdir($dirname);
}
