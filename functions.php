<?php
function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    exit();
}



function replace($lien = "/"){
    echo "<script>window.location.replace('index.php?page=".$lien."')</script>";
                exit();
}