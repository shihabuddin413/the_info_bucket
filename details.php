

<?php
	include ('config/db_connect.php');


	


	if (isset($_GET['id'])){
		$id = mysqli_real_escape_string ($conn, $_GET['id']);
		$sql_query = "SELECT * FROM peoples WHERE id= $id";
		$result = mysqli_query($conn, $sql_query);
		$person = mysqli_fetch_assoc($result) ;

		mysqli_free_result($result);
		mysqli_close($conn);

		// print_r($person);

	} 
?>



<!DOCTYPE html>
<html>
  
  <?php include('templates/header.php'); ?>

  <div class="container center">
  		<div class="card z-depth-0 p-4">
  			<h2>Details </h2>
  			<div class="card-content left-align">
	  			
	  			<div class="center"><img class="circle" src="images/<?php echo htmlspecialchars($person['image'])?>" alt=""></div>

	  			<div class="border_b center" >
	  				<!-- <p class="text-sm">Name</p> -->
	  				<h3><?php echo htmlspecialchars (strtoupper($person['name']));?> </h3>

	  				<div>
		  				<span class="blue-text">Joined in </span>
		  				<span><?php echo date($person['created_at']); ?></span>
		  			</div>
	  	
	  			</div>
	  		

	  			<div class="border_b flex-row">
	  				<h3>Contact</h3>
	  				<div class="center contact">
	  					<div>
	  						<div>
	  							<p  class="text-sm box">Email</p>
		  						<h5 class="left_text"><?php echo htmlspecialchars ($person['email']);?></h5>
	  						</div>
	  						<div>
	  							<p  class="text-sm box">Phone</p>
		  						<h5 class="left_text"><?php echo htmlspecialchars ($person['phone']);?></h5>
	  						</div>
		  					<div>
		  						<p  class="text-sm box">Address</p>
		  						<h5 class="left_text"><?php echo htmlspecialchars ($person['address']);?></h5>
		  					</div>	
		  				</div>
	  				</div>
	  			</div>
	  		

	  			<div class="center">
	  				<div>
	  					<h3>Skills</h3>
		  				<div class="flex-row">
		  					<div>
			  					<?php foreach (explode(",", $person['skills']) as $skill) : ?>
			  						<span class="highlight_skills"><?php echo $skill; ?></span>
			  					<?php endforeach; ?>
		  					</div>
		  				</div>
	  				</div>
	  			</div>
	  		</div>
	  		<div class="card-action right-align">
				Powered by - <span class="blue-text"> The Info Bucket </span>
			</div>
  		</div>
  </div>

  <?php include('templates/footer.php'); ?>
</html>