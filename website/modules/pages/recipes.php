<?php 
	$sql="SELECT * FROM coffee";
	$run=mysqli_query($db,$sql);
 ?>
<article id="recipes">
	<?php 
	while ($row=mysqli_fetch_array($run)) {
	?>

	<a href="main.php?p=recipedetails&id=<?php echo($row['id_coffee']) ?>" class="hover" >
		<div class="recipelist">
			<img src="../admin/modules/coffeemanagement/uploads/<?php echo($row['coffeeimg']) ?>">
			<h2><?php echo($row['coffeename']) ?></h2>
			<p><?php echo($row['description']); ?></p>
		</div>
	</a>
	<?php 
	}	
	?>

	<div class="clear"></div>
</article>
