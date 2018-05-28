<?php 
	include('../dbcon.php');

	$coffeeimg=$_FILES['coffeeimg']['name'];
	
	move_uploaded_file($coffeeimg_tmp,'uploads/'.$coffeeimg);

	$id=$_GET['id'];
	$coffeename=$_POST['coffeename'];
	$description=$_POST['description'];

		// connect to s3
	require('../../../../vendor/autoload.php');
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;

	$bucketName = $_ENV["S3_BUCKET"];
	$IAM_KEY = $_ENV["AWS_ACCESS_KEY_ID"];
	$IAM_SECRET = $_ENV["AWS_SECRET_ACCESS_KEY"];

		$s3 = S3Client::factory(
	    	array(
	        	'credentials' => array(
	            'key' => $_ENV["AWS_ACCESS_KEY_ID"],
	            'secret' => $_ENV["AWS_SECRET_ACCESS_KEY"]
	        	),
	        'version' => 'latest',
	        'region' => 'us-east-1'
	   		)    
		);

	$keyName = 'test_example/' . basename($coffeeimg_tmp);
	$pathInS3 = 'https://s3.amazonaws.com/' . $bucketName . '/' . $keyName;

	try {
			$coffeeimg_tmp=$_FILES['coffeeimg']['tmp_name'];

        	$s3->putObject(
	            array(
		            'Bucket' => $bucketName,
		            'Key' => $keyName,
		            'SourceFile' => $coffeeimg_tmp,
		            'ACL' => 'public-read'
	           	)
        	);
        } catch (Exeption $e) {
        	echo $e->getMessage();
        }
	
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