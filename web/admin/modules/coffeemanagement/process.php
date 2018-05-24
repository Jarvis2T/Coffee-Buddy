<?php 
	include('../dbcon.php');
	require '../../../../vendor/autoload.php';
	$bucketName = 'thanh-img';
	$IAM_KEY = 'AKIAJBMLP3OFGJPWRD3Q';
	$IAM_SECRET = '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';
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	try {
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'us-east-2'
			)
		);
	} catch (Exception $e) {
		die("Error: " . $e->getMessage());
	}

	$coffeeimg=$_FILES['coffeeimg']['name'];
	
	$keyName = 'test_example/' . basename($_FILES["coffeeimg"]['tmp_name']);
	$pathInS3 = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyName;
	move_uploaded_file($coffeeimg_tmp,'uploads/'.$coffeeimg);
	try {
		// Uploaded:
		$coffeeimg_tmp=$_FILES['coffeeimg']['tmp_name'];
		
		$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $coffeeimg_tmp,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);
	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}

	$id=$_GET['id'];
	$coffeename=$_POST['coffeename'];
	$description=$_POST['description'];
	
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