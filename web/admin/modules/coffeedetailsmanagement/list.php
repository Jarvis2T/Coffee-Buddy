<?php  
	$sql="SELECT * FROM coffee,coffeedetails WHERE coffee.id_coffee=coffeedetails.id_coffee ORDER BY coffeedetails.id_coffee DESC";
	$run=mysqli_query($db,$sql);
?>
<table width="100%" border="1">
	<tr>
		<td>Coffee name</td>
		<td>Prepare time</td>
		<td>Difficulty</td>
		<td colspan="2">Ingredients</td>
		<td>Extra</td>
		<td colspan="2">Instructions</td>
		<td colspan="2">Management</td>
	</tr>
	
	<?php 
		while ($row=mysqli_fetch_array($run)) {
	 ?>
		<tr>
			<td><?php echo $row['coffeename']; ?></td>
			<td><?php echo $row['pretime'] ?></td>
			<td><?php echo $row['difficulty'] ?></td>
			<td><?php echo $row['ingredient1'] ?></td>
			<td><?php echo $row['ingredient2'] ?></td>
			<td><?php echo $row['extra'] ?></td>
			<td><textarea cols="20" rows="10"><?php echo $row['instruction1'] ?></textarea></td>
			<td><textarea cols="20" rows="10"><?php echo $row['instruction2'] ?></textarea></td>
			<td><a href="index.php?management=coffeedetailsmanagement&pc=edit&id=<?php echo $row['id_coffee'] ?>">Edit</a></td>
			<td><a href="modules/coffeedetailsmanagement/process.php?id=<?php echo $row['id_coffee'] ?>">Delete</a></td>
		</tr>
	<?php
		}
	 ?>
</table>