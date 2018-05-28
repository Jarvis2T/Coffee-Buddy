<?php  
	$sql="SELECT * FROM coffee ORDER BY id_coffee DESC";
	$run=mysqli_query($db,$sql);
?>
<table width="100%" border="1">
	<tr>
		<td>Coffee Name</td>
		<td>Image</td>
		<td>Description</td>
		<td colspan="2">Management</td>
	</tr>
	
	<?php 
		while ($row=mysqli_fetch_array($run)) {
	 ?>
		<tr>
			<td><?php echo $row['coffeename'] ?></td>
			<td>
				<img src="https://s3.amazonaws.com/thanh-img2/<?php echo $row['coffeeimg'] ?>" width="80" height="80">
			</td>
			<td><textarea name="description" cols="73" rows="5"><?php echo $row['description'] ?></textarea></td>
			<td><a href="index.php?management=coffeemanagement&pc=edit&id=<?php echo $row['id_coffee'] ?>">Edit</a></td>
			<td><a href="modules/coffeemanagement/process.php?id=<?php echo $row['id_coffee'] ?>">Delete</a></td>
		</tr>
	<?php
		}
	 ?>
</table>