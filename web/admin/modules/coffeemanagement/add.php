<form action="modules/coffeemanagement/process.php" method="post" enctype="multipart/form-data">
	<table width="100%" border="1">
		<tr>
			<td colspan="2" align="center">Add coffee</td>
		</tr>

		<tr>
			<td>Coffee name</td>
			<td><input type="text" name="coffeename"></td>
		</tr>
		
		<tr>
			<td>Image</td>
			<td><input type="file" name="coffeeimg"></td>
		</tr>

		<tr>
			<td>Description</td>
			<td><textarea name="description" cols="30" rows="20"></textarea></td>
		</tr>

		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="add" id="add" value="Add">
			</td>
		</tr>
	</table>
</form>