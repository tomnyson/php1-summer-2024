<?php
ini_set('display_errors', '1');
define('ROOTPATH', __DIR__);
function asset_url($path)
{
    $root = str_replace($_SERVER['DOCUMENT_ROOT'], '', ROOTPATH);
    return $root . '/' . $path;
}
