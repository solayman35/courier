<?php

include './php/courier.php';

$admin=new Admin();

$delete=$admin->delete_employee($_GET['id']);

if($delete){
    header("Location:manage-employee.php");
}