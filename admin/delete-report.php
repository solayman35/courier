<?php

include './php/courier.php';

$admin=new Admin();

$delete=$admin->delete_shiping($_GET['id']);

if($delete){
    header("Location:report.php");
}