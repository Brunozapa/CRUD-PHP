<?php
session_start();
if(!empty($_SESSION)) {

    if($_SESSION['logged'] == true) header('Location: ../../view/home.php');

}