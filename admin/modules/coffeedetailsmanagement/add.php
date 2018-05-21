<form action="modules/coffeedetailsmanagement/process.php" method="post" enctype="multipart/form-data">
	<table width="100%" border="1">
		<tr>
			<td colspan="2" align="center">Add coffee details</td>
		</tr>

		<tr>
		<?php  
			$sql="SELECT * FROM coffee";
			$run=mysqli_query($db,$sql);
		?>
			<td>Coffee name</td>
			<td>
				<select name="id_coffee">
				<?php 
				while ($row=mysqli_fetch_array($run)) {
				?>
					<option value="<?php echo $row['id_coffee'] ?>">
						<?php echo $row['coffeename'] ?>
					</option>
				<?php 
				}	
				?>
				</select>
			</td>
		</tr>
		
		<tr>
			<td>Prepare time </td>
			<td><input type="text" name="pretime"></td>
		</tr>
		
		<tr>
			<td>Difficulty </td>
			<td><input type="text" name="difficulty"></td>
		</tr>

		<tr>
			<td rowspan="2">Ingredients</td>
			<td><input type="text" name="ingredient1"></td>
		</tr>

		<tr>
			<td><input type="text" name="ingredient2"></td>
		</tr>
		
		<tr>
			<td>Extra</td>
			<td><input type="text" name="extra"></td>
		</tr>

		<tr>
			<td rowspan="2">Instructions</td>
			<td><textarea name="instruction1" cols="30" rows="7"></textarea></td>
		</tr>
		
		<tr>
			<td><textarea name="instruction2" cols="30" rows="13"></textarea></td>
		</tr>

		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="add" id="add" value="Add">
			</td>
		</tr>
	</table>
</form>