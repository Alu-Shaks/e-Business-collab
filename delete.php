<?php
include "connectdb.php";
$companyID=$_GET['companyID'];
$sql="DELETE FROM Company_Information WHERE companyID=$companyID";
$result=mysqli_query($connect,$sql);
if($result){
	header("locaton:profile.php");
}else{
	die(mysqli_error($connect));
}
?>