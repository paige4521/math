<?php
require_once './functions.php';

    if(isset($_POST['minVal'])){
        $data->minVal = $_POST['minVal'];
        $data->maxVal = $_POST['maxVal'];
    }
header('location: ../users/dashboard.php');