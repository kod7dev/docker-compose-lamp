<?php

function sessionControl($session)
{
    if (isset($session['login'])) {
        return true;
    } else {
        return false;
    }
}

function dirScan()
{
    $directory = __DIR__.'/../uploads';
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));

    return $scanned_directory;
}

function fileParse($file)
{

}


