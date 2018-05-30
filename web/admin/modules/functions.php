<?php 

										# Connect to S3 service function
										
	function s3connection($IAM_KEY,$IAM_SECRET){
		include('../../../vendor/autoload.php');
		use Aws\S3\S3Client;
		use Aws\S3\Exception\S3Exception;
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
	}

										# Upload images to S3 funtion
										
	function s3upload($coffeeimg_tmp,$bucketName,$keyName){
		include('../../../vendor/autoload.php');
		use Aws\S3\S3Client;
		use Aws\S3\Exception\S3Exception;
		try {
			$keyName_tmp=$coffeeimg_tmp;

        	$s3->putObject(
	            array(
		            'Bucket' => $bucketName,
		            'Key' => $keyName,
		            'SourceFile' => $keyName_tmp,
		            'ACL' => 'public-read'
	           	)
        	);
        } catch (Exeption $e) {
        	echo $e->getMessage();
        }
	}

										# Coffee management functions
										 
	function addcoffee($coffeename,$coffeeimg,$description){
		include('dbcon.php');
		$sql="INSERT INTO coffee (coffeename,coffeeimg,description) VALUES ('$coffeename','$coffeeimg','$description')";

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeemanagement&pc=add');
	}

	function editcoffee($coffeename,$coffeeimg,$description,$id){
		include('dbcon.php');
		if ($coffeeimg!='') {
			$sql="UPDATE coffee SET coffeename='$coffeename',coffeeimg='$coffeeimg',description='$description' WHERE id_coffee = '$id'";
		}else{
			$sql="UPDATE coffee SET coffeename='$coffeename',description='$description' WHERE id_coffee = '$id'";
		}		

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeemanagement&pc=edit&id='.$id);
	}

	function deletecoffee($id){
		include('dbcon.php');
		$sql="DELETE FROM coffee WHERE id_coffee = '$id'";

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeemanagement&pc=add');
	}

										# Coffee details management functions

	function addcoffeedetails($id_coffee,$pretime,$difficulty,$ingredient1,$ingredient2,$extra,$instruction1,$instruction2){
		include('dbcon.php');
		$sql="INSERT INTO coffeedetails (id_coffee,pretime,difficulty,ingredient1,ingredient2,extra,instruction1,instruction2) VALUES ('$id_coffee','$pretime','$difficulty','$ingredient1','$ingredient2','$extra','$instruction1','$instruction2')";

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeedetailsmanagement&pc=add');
	}

	function editcoffeedetails($pretime,$difficulty,$ingredient1,$ingredient2,$extra,$instruction1,$instruction2,$id){
		include('dbcon.php');
		$sql="UPDATE coffeedetails SET pretime='$pretime',difficulty='$difficulty',ingredient1='$ingredient1',ingredient2='$ingredient2',extra='$extra',instruction1='$instruction1',instruction2='$instruction2' WHERE id_coffee = '$id'";

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeedetailsmanagement&pc=edit&id='.$id);
	}

	function deletecoffeedetails($id){
		include('dbcon.php');
		$sql="DELETE FROM coffeedetails WHERE id_coffee = '$id'";

		mysqli_query($db,$sql);
		header('location:../../index.php?management=coffeedetailsmanagement&pc=add');
	}
 ?>