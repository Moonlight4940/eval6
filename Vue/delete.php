<?php

$id = $_Get["id"] ?? null;
if(!$id){
    header("Location: index.php");
    exit;
}

