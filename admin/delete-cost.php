<?php

include './php/courier.php';

$admin=new Admin();

$delete=$admin->delete_cost($_GET['id']);

if($delete){
    header("Location:manage-cost.php");
}