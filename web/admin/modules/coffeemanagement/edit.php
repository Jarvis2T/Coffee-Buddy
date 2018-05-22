<?php 
	$sql="SELECT * FROM coffee WHERE id_coffee = $_GET[id]";
	$run=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($run);
 ?>
<form action="modules/coffeemanagement/process.php?id=<?php echo $row['id_coffee'] ?>" method="post" enctype="multipart/form-data">
	<table width="100%" border="1">
		<tr>
			<td colspan="2" align="center">Edit coffee</td>
		</tr>

		<tr>
			<td>Coffee name</td>
			<td><input type="text" name="coffeename" value="<?php echo $row['coffeename'] ?>"></td>
		</tr>

		<tr>
			<td>Image</td>
			<td><input type="file" name="coffeeimg"><img src="modules/coffeemanagement/uploads/<?php echo $row['coffeeimg'] ?>" width="80" height="80"></td>
		</tr>

		<tr>
			<td>Description</td>
			<td>
				<textarea name="description" cols="30" rows="20"><?php echo $row['description'] ?></textarea>
			</td>
		</tr>

		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="edit" id="edit" value="Edit">
			</td>
		</tr>
	</table>
</form>