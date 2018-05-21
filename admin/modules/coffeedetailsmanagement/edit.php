<?php 
	$sql="SELECT * FROM coffee,coffeedetails WHERE coffee.id_coffee = $_GET[id] AND coffeedetails.id_coffee = $_GET[id]";
	$run=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($run);
 ?>
<form action="modules/coffeedetailsmanagement/process.php?id=<?php echo $row['id_coffee'] ?>" method="post" enctype="multipart/form-data">
	<table width="100%" border="1">
		<tr>
			<td colspan="2" align="center">Edit coffee details</td>
		</tr>

		<tr>
			<td>Coffee name</td>
			<td>
				<?php echo $row['coffeename'] ?>
			</td>
		</tr>
		
		<tr>
			<td>Prepare time </td>
			<td><input type="text" name="pretime" value="<?php echo $row['pretime'] ?>"></td>
		</tr>
		
		<tr>
			<td>Difficulty </td>
			<td><input type="text" name="difficulty" value="<?php echo $row['difficulty'] ?>"></td>
		</tr>

		<tr>
			<td rowspan="2">Ingredients</td>
			<td><textarea cols="22" rows="3" name="ingredient1"><?php echo $row['ingredient1'] ?></textarea></td>
		</tr>

		<tr>
			<td><input type="text" name="ingredient2" value="<?php echo $row['ingredient2'] ?>"></td>
		</tr>
		
		<tr>
			<td>Extra</td>
			<td><input type="text" name="extra" value="<?php echo $row['extra'] ?>"></td>
		</tr>

		<tr>
			<td rowspan="2">Instructions</td>
			<td><textarea name="instruction1" cols="30" rows="7"><?php echo $row['instruction1'] ?></textarea></td>
		</tr>
		
		<tr>
			<td><textarea name="instruction2" cols="30" rows="13"><?php echo $row['instruction2'] ?></textarea></td>
		</tr>

		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="edit" id="edit" value="Edit">
			</td>
		</tr>
	</table>
</form>