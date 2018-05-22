<?php
	$sql="SELECT * FROM coffee,coffeedetails WHERE coffee.id_coffee = $_GET[id] AND coffeedetails.id_coffee = $_GET[id]";
	$run=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($run);
 ?>

<section id="details">
	<div id="top">
		<h1><?php echo $row['coffeename'] ?></h1>
	</div>

	<div id="left">	
		<div id="lefttop">
			<img src="admin/modules/coffeemanagement/uploads/<?php echo $row['coffeeimg'] ?>" height="380" width="380">
		</div>

		<div id="leftbottom">
			<div id="leftbottomleft">
				<h2>Prepare time</h2>
				<p><?php echo $row['pretime'] ?></p>
			</div>
			<div id="leftbottomright">
				<h2>Difficulty</h2>
				<p><?php echo $row['difficulty'] ?></p>
			</div>
		</div>
	</div>

	<div id="right">
		<div id="ingredients">
			<h2>Ingredients</h2>
			<p><?php echo $row['ingredient1'] ?></p>
			<p><?php echo $row['ingredient2'] ?></p>
			<h3>You will also need</h3>
			<p><?php echo $row['extra'] ?></p>
		</div>
		<div id="method">
			<h2>Instruction</h2>
			<p>1. <span><?php echo $row['instruction1'] ?></span></p>
			<p>2. <span><?php echo $row['instruction2'] ?></span></p>
		</div>
	</div>
	<div class="clear"></div>
</section>