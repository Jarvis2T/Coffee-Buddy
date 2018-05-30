<?php 
	include('../dbcon.php');
	include('../functions.php');
	$coffeeimg=$_FILES['coffeeimg']['name'];
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
	            'key' => $IAM_KEY,
	            'secret' => $IAM_SECRET
	        	),
	        'version' => 'latest',
	        'region' => 'us-east-1'
	   		)    
		);

	$keyName = basename($coffeeimg);
	$pathInS3 = 'https://s3.amazonaws.com/' . $bucketName . '/' . $keyName;

	
	if (isset($_POST['add'])) {
		
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

        # add method	

		addcoffee($coffeename, $coffeeimg, $description);

	}elseif (isset($_POST['edit'])) {
		
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

		# edit method
		
		editcoffee($coffeename,$coffeeimg,$description,$id);

	}else {
		
		# delete method
		
		deletecoffee($id);
	}
 ?>