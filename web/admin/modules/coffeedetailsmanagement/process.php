<?php
	include('../functions.php');
	include('../dbcon.php');
	$id=$_GET['id'];
	$id_coffee=$_POST['id_coffee'];
	$pretime=$_POST['pretime'];
	$difficulty=$_POST['difficulty'];
	$ingredient1=$_POST['ingredient1'];
	$ingredient2=$_POST['ingredient2'];
	$extra=$_POST['extra'];
	$instruction1=$_POST['instruction1'];
	$instruction2=$_POST['instruction2'];
	if (isset($_POST['add'])) {
		
		# add method
		
		addcoffeedetails($id_coffee,$pretime, $difficulty, $ingredient1, $ingredient2, $extra, $instruction1, $instruction2);
		
	}elseif (isset($_POST['edit'])) {
		
		# edit method
	
		editcoffeedetails($pretime, $difficulty, $ingredient1, $ingredient2, $extra, $instruction1, $instruction2,$id);

	}else {
		
		# delete method
		
		deletecoffeedetails($id);
	}
 ?>