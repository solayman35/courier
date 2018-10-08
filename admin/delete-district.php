<?php

include './php/courier.php';

$admin=new Admin();

$delete=$admin->delete_district($_GET['id']);

if($delete){
    header("Location:manage-district.php");
}