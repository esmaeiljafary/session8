<?php 
session_start(); 
if(isset($_SESSION["sid"]))
{
	$_SESSION["sid"]=session_id();
}
	?>
<!doctype html>
<html>
<head>
	<script>
		function changeprice()
		{
		alert("ewe");
			q1=document.getElementById("txtq[]");
			p1=document.getElementById("txtp[]");
			p2=document.getElementById("txtp1[]");
			sum=0;
			for(i=0;i<q1.length;i++)
				{
					p=q1[i].value;
					q=p1[i].value;
					pnew=p*q;
					p2[i].value=pnew;
					sum=sum+parseInt(p2[i].value);
					sum=sum+parseInt(p2[i].value);
					Document.getElementById("sump").innerHTML="[جمع کل:]+sum+"ریال";
				}
		}
	</script>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script language="javascript" src="func.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="js/calcatur.js">
</head>

<body>
	<?php include "funcs.php" ?>
	<?php include "header.php" ?>
	<?php include "menu.php" ?>
	
	<!-- start content -->
	<div class="content">
		<?php
	if(isset($_GET["sid"]))
	{
		$sid=$_GET["sid"];
	
	?>
		<form name="frm" action="updatesabad.php" method="post">
		<table dir="rtl" border="1" align="center" width="50%">
			<tr>
				<th colspan="5">فاکتور سفارش شما</th>
			</tr>
			<tr>
				<td>ردیف</td>
				<td>نام کالا</td>
				<td>تعداد</td>
				<td>قیمت</td>
				<td> قیمت کل</td>
			</tr>
			<?php 
				$sql="select tbl_kala.id as id1,name,price,tbl_order.id as id2,idk from tbl_order,tbl_kala where (sid='$sid' and idk=tbl_kala.id)";
		$result=mysqli_query($connect,$sql);
		$i=1;
		while($rows=mysqli_fetch_array($result));
		{?>
		<tr>
			<td><?php echo $i++; ?></td>
			<input type="hidden" name="txtid" id="txtid" value="<?php echo $rows["id1"];?>">
			<td><?php echo $rows["name"];?></td>
			<td><input type="number" name="txtq[]" id="txtq[]" value="1" onChange="changeprice()"></td>
			<td><input type="text" name="txtp" id="txtp" value=<?php echo $rows["price"];?>" readonly></td>
				<td><input type="text" name="txtp1" id="txtp1" readonly value=<?php echo $rows['price'];?>"<td>
		</tr>	
		<?php } ?>
			<tr>
				<td colspan="5"><input type="submit" value="ثبت" name="sabt" ></td>
			</tr>
			
		</table>
			
		</form>
		<?php
		
		?>
	<?php }?>
		<div id="sump">جمع کل:</div>
	</div>
	<?php include "footer.php" ?>

</body>
</html>