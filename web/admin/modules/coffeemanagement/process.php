<?php 
	include('../../../../vendor/autoload.php');
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	include('../dbcon.php');
	include('../functions.php');

	$id=$_GET['id'];
	$coffeename=$_POST['coffeename'];
	$description=$_POST['description'];

		# Connect to s3 service
	 
	$coffeeimg=basename($_FILES['coffeeimg']['name']);
	$coffeeimg_tmp=$_FILES['coffeeimg']['tmp_name'];
	#$keyName = basename($coffeeimg);
	$bucketName = $_ENV["S3_BUCKET"];
	$IAM_KEY = $_ENV["AWS_ACCESS_KEY_ID"];
	$IAM_SECRET = $_ENV["AWS_SECRET_ACCESS_KEY"];

	s3connection($IAM_KEY,$IAM_SECRET);
	
	if (isset($_POST['add'])) {
		
		# upload image to s3
		
        #s3upload($coffeeimg_tmp, $bucketName, $coffeeimg);

        # add method	

		addcoffee($coffeename, $coffeeimg, $description);

	}elseif (isset($_POST['edit'])) {
		
		# upload image to s3
		try {
			$keyName_tmp=$coffeeimg_tmp;

        	$s3->putObject(
	            array(
		            'Bucket' => $bucketName,
		            'Key' => $coffeeimg,
		            'SourceFile' => $keyName_tmp,
		            'ACL' => 'public-read'
	           	)
        	);
        } catch (Exeption $e) {
        	echo $e->getMessage();
        }
	}
        #s3upload($coffeeimg_tmp, $bucketName, $coffeeimg);

		# edit method
		
		editcoffee($coffeename,$coffeeimg,$description,$id);

	}else {
		
		# delete method
		
		deletecoffee($id);
	}
 ?>