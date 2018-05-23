<?php 
	include('../dbcon.php');
	require '../../../../vendor/autoload.php';
	$bucketName = 'thanh-img';
	$IAM_KEY = 'AKIAJBMLP3OFGJPWRD3Q';
	$IAM_SECRET = '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';
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
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

	$coffeeimg=$_FILES['coffeeimg']['name'];
	$coffeeimg_tmp=$_FILES['coffeeimg']['tmp_name'];
	move_uploaded_file($coffeeimg_tmp,'uploads/'.$coffeeimg);
	$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $coffeeimg,
				'SourceFile' => $coffeeimg_tmp,
				'StorageClass' => 'REDUCED_REDUNDANCY'
	
			)
		);

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