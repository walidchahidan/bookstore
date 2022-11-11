<?php

function uploadFile($name, $targetDir= "uploads/" ){
    $targetfile = $targetDir.basename($_FILES[$name]['name']);

    if (move_uploaded_file($_FILES[$name]['tmp_name'], $targetfile)) {
        return $targetfile;
    }else{
        echo "Error in file moving";
        return null;
    }


}