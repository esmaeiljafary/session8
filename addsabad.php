<?php
include "funcs.php";

session_start();
$sid=$_SESSION["sid"];
$idk=$_GET["id"];
$d="00/00/00";
$sql="insert into tbl_order(idk,dateins,sid)values('$idk','$d','$sid')";
$result=mysqli_query($connect,$sql);
if($result)
header("location:index.php");
?>