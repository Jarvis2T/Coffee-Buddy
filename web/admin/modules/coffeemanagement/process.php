<?php 
	include('../dbcon.php');
	require('../../../../vendor/autoload.php');
	use Aws\S3\Exeption\S3Exeption;
	$coffeeimg=$_FILES['coffeeimg']['name'];
	$coffeeimg_tmp=$_FILES['coffeeimg']['tmp_name'];
	move_uploaded_file($coffeeimg_tmp,'uploads/'.$coffeeimg);
	$id=$_GET['id'];
	$coffeename=$_POST['coffeename'];
	$description=$_POST['description'];
	
	if (isset($_POST['add'])) {
		
		# add method
		
		try {
			$s3->putObject([
				'Bucket' => "thanh-img",
				'Key' => $coffeeimg,
				'Body' => fopen($coffeeimg_tmp, 'rb'),
				'ACL' => 'public-read'
			]);
		} catch (S3Exeption $e) {
			die("Error");
		}

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