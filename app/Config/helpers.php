<?php
function view($filename,$parametri=[]){
    extract($parametri);
    global $prikaz;
    require_once "app/views/$filename.php";  }