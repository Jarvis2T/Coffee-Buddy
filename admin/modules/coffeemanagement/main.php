<div class="left">
	<?php 
		if (isset($_GET['pc'])) {
			$temp=$_GET['pc'];
		}else {
			$temp='';
		}
		switch ($temp) {
			case 'add':
				include('modules/coffeemanagement/add.php');
				break;
			case 'edit':
				include('modules/coffeemanagement/edit.php');
				break;
			default:
				include('modules/coffeemanagement/add.php');
				break;
		}
	 ?>			
</div>
<div class="right">
	<?php 
		include('modules/coffeemanagement/list.php');
	 ?>			
</div>