<section>	

	<?php 
		if (isset($_GET['p'])){
			$temp=$_GET['p'];
		}else {
			$temp='';
		}
		switch ($temp) {
		 	case 'about':
		 		include('pages/about.php');
		 		break;
		 	case 'recipes':
		 		include('pages/recipes.php');
		 		break;
		 	case 'recipedetails':
		 		include('pages/recipedetails.php');
		 		break;
		 	default:
		 		include('pages/about.php');
		 		break;
		 }
	?>

</section>