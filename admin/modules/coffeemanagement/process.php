<?php 
	include('../dbcon.php');
	$id=$_GET['id'];
	$coffeename=$_POST['coffeename'];
	$description=$_POST['description'];
	$coffeeimg=$_FILES['coffeeimg']['name'];
	$coffeeimg_tmp=$_FILES['coffeeimg']['tmp_name'];
	move_uploaded_file($coffeeimg_tmp,'uploads/'.$coffeeimg);
	if (isset($_POST['add'])) {
		
		# add method
		
		$sql="INSERT INTO coffee (coffeename,coffeeimg,description) VALUES ('$coffeename','$coffeeimg','$description')";

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeemanagement&pc=add');
	}elseif (isset($_POST['edit'])) {
		
		# edit method
		
		if ($coffeeimg!='') {
			$sql="UPDATE coffee SET coffeename='$coffeename',coffeeimg='$coffeeimg',description='$description' WHERE id_coffee = '$id'";
		}else{
			$sql="UPDATE coffee SET coffeename='$coffeename',description='$description' WHERE id_coffee = '$id'";
		}		

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeemanagement&pc=edit&id='.$id);
	}else {
		
		# delete method
		
		$sql="DELETE FROM coffee WHERE id_coffee = '$id'";

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeemanagement&pc=add');
	}
 ?>