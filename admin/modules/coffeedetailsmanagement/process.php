<?php 
	include('../dbcon.php');
	$id=$_GET['id'];
	$id_coffee=$_POST['id_coffee'];
	$pretime=$_POST['pretime'];
	$difficulty=$_POST['difficulty'];
	$ingredient1=$_POST['ingredient1'];
	$ingredient2=$_POST['ingredient2'];
	$extra=$_POST['extra'];
	$instruction1=$_POST['instruction1'];
	$instruction2=$_POST['instruction2'];
	if (isset($_POST['add'])) {
		
		# add method
		
		$sql="INSERT INTO coffeedetails (id_coffee,pretime,difficulty,ingredient1,ingredient2,extra,instruction1,instruction2) VALUES ('$id_coffee','$pretime','$difficulty','$ingredient1','$ingredient2','$extra','$instruction1','$instruction2')";

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeedetailsmanagement&pc=add');
		
	}elseif (isset($_POST['edit'])) {
		
		# edit method
	
		$sql="UPDATE coffeedetails SET pretime='$pretime',difficulty='$difficulty',ingredient1='$ingredient1',ingredient2='$ingredient2',extra='$extra',instruction1='$instruction1',instruction2='$instruction2' WHERE id_coffee = '$id'";

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeedetailsmanagement&pc=edit&id='.$id);

	}else {
		
		# delete method
		
		$sql="DELETE FROM coffeedetails WHERE id_coffee = '$id'";

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeedetailsmanagement&pc=add');
	}
 ?>