<?php 
	include('../dbcon.php');
	include('../functions.php');
	
	$id=$_GET['id'];
	$coffeename=$_POST['coffeename'];
	$description=$_POST['description'];

		// connect to s3
	include('../../../../vendor/autoload.php');
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;

	$coffeeimg=basename($_FILES["coffeeimg"]["name"]);
	$coffeeimg_tmp=$_FILES["coffeeimg"]["tmp_name"];
	$bucketName = 'S3_BUCKET';
	$IAM_KEY = 'IAM_KEY';
	$IAM_SECRET = 'SECRET_KEY';

	$s3 = new S3Client(
	    	[
	        	'credentials' => [
	            'key' => $IAM_KEY,
	            'secret' => $IAM_SECRET
	        	],
	        'version' => 'latest',
	        'region' => 'us-east-1'
	   		]    
		);

	
	if (isset($_POST['add'])) {
		if ($coffeeimg!='') {
			try {
        		$s3->putObject(
	            	[
		            	'Bucket' => $bucketName,
		            	'Key' => $coffeeimg,
		            	'SourceFile' => $coffeeimg_tmp,
		            	'ACL' => 'public-read'
	           		]
        		);
        	} catch (Exeption $e) {
        		echo $e->getMessage();
        	}
        
        	# add method	

			addcoffee($coffeename, $coffeeimg, $description);
		}else{
			addcoffee($coffeename, $coffeeimg, $description);
		}
	}elseif (isset($_POST['edit'])) {
		if ($coffeeimg!='') {
			try {
        		$s3->putObject(
	            	[
		            	'Bucket' => $bucketName,
		            	'Key' => $coffeeimg,
		            	'SourceFile' => $coffeeimg_tmp,
		            	'ACL' => 'public-read'
	           		]
        		);
        	} catch (Exeption $e) {
        		echo $e->getMessage();
        	}

			# edit method
		
			editcoffee($coffeename,$coffeeimg,$description,$id);
		}else{
			editcoffee($coffeename,$coffeeimg,$description,$id);
		}
	}else {
		
		# delete method
		
		deletecoffee($id);
	}
 ?>
