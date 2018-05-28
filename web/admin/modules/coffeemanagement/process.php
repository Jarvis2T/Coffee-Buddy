<?php 
	include('../dbcon.php');
	$coffeeimg=$_FILES['coffeeimg']['name'];
	$coffeeimg_tmp=$_FILES['coffeeimg']['tmp_name'];
	move_uploaded_file($coffeeimg_tmp,'uploads/'.$coffeeimg);
	$id=$_GET['id'];
	$coffeename=$_POST['coffeename'];
	$description=$_POST['description'];

		// connect to s3
	require('../../../../vendor/autoload.php');
	$s3 = Aws\S3\S3Client::factory(
    	array(
        	'credentials' => array(
            'key' => $_ENV["AWS_ACCESS_KEY_ID"],
            'secret' => $_ENV["AWS_SECRET_ACCESS_KEY"]
        	),
        'version' => 'latest',
        'region' => 'us-east-1'
   		)    
	);
	$bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');
	
	if (isset($_POST['add'])) {
		
		# add method
		
		try {
        	$upload = $s3->putObject(
	            array(
		            'Bucket' => $bucket,
		            'Key' => basename($coffeeimg),
		            'SourceFile' => $coffeeimg_tmp,
		            'ACL' => 'public-read'
	           	)
        	);
        } catch (Exeption $e) {
        	echo $e->getMessage();
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