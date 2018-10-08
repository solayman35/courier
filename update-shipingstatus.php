<?php

include './database/admin.php';

$admin=new courier();

$delete=$admin->update_startus($_GET['id'],'yes');

if($delete){
    header("Location:report.php");
}