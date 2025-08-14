<?php
// Mapping des vues
$folder_views= "views";
$views= array(
    "dashboard" => "$folder_views/dashboard.php",
    "user" => "$folder_views/users.php",
    "commandes" => "$folder_views/commandes1.php",
    "medicaments" => "$folder_views/medicaments1.php",
    "settings" => "$folder_views/setting1.php"

);

$view= null;
if(isset($_GET['view']) == true) {
    if(array_key_exists($_GET['view'], $views) == true) {
       $view = $views[$_GET['view']];
    }
    else{
        $view = "$folder_views/404.php";
    }
}

else{
    //header('Location:../index.php');
    header("Location:index.php?view=dashboard");
}

?>