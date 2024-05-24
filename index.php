<?php
require "Database.php";
require "functions.php";
require "routes.php";
require "models/model.php";
session_start();
$db = Database::getPdoGsb();
$lien = $_GET["page"] ?? "/";
if(!isset($_SESSION["email"])){
    $lien = "/compte";
}
require "views/partials/header.php";
// dd($_SESSION["question"]);
if(array_key_exists($lien,$routes)){
    require($routes[$lien]);
}
else {
    replace("/");
}
