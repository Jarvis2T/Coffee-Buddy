<div class="left">
	<?php 
		if (isset($_GET['pc'])) {
			$temp=$_GET['pc'];
		}else {
			$temp='';
		}
		switch ($temp) {
			case 'add':
				include('modules/coffeedetailsmanagement/add.php');
				break;
			case 'edit':
				include('modules/coffeedetailsmanagement/edit.php');
				break;
			default:
				include('modules/coffeedetailsmanagement/add.php');
				break;
		}
	 ?>			
</div>
<div class="right">
	<?php 
		include('modules/coffeedetailsmanagement/list.php');
	 ?>			
</div>