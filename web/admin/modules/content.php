<section>
	<?php 
		if (isset($_GET['management'])) {
			$temp=$_GET['management'];
		}else {
			$temp='';
		}
		switch ($temp) {
			case 'coffeemanagement':
				include('coffeemanagement/main.php');
				break;
			case 'coffeedetailsmanagement':
				include('coffeedetailsmanagement/main.php');
				break;
			default:
				include('coffeemanagement/main.php');
				break;
		}
	 ?>
</section>