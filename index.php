
<?php
	
	include ('config/db_connect.php');
	

	//write quires

	// $sql_query = 'SELECT * FROM peoples';
	$sql_query = 'SELECT id, name, phone, email, address, skills FROM peoples ORDER BY  created_at';

	// make query get result
	$result = mysqli_query($conn, $sql_query);

	//fetch the resulting rows as array (MYSQLI_ASSOC stand for Associative array)
	$peoples = mysqli_fetch_all($result, MYSQLI_ASSOC);

	



?>


<!DOCTYPE html>
<html>
	<?php include("./templates/header.php");  ?>

	<h4 class="center grey-text"> Pick A Connetions In Your Buckets</h4>

	<div class="container">
		<div class="row">
			<?php foreach ($peoples as $idx) : ?>
				
				<div class="col s12 md3">
					<div class="card z-depth-0">
						<div class="card-content left-align flex-row-between">
							<div>
								<h3 class="blue-text"> #<?php echo htmlspecialchars($idx['id']); ?> </h3>
								<h4> <?php echo htmlspecialchars($idx['name']); ?> </h4>
								<h6 class="grey-text"> <?php echo htmlspecialchars($idx['email']); ?></h5>

								<!-- <h6> <?php echo htmlspecialchars($idx['phone']); ?></h6> -->
								<!-- <h6> <?php echo htmlspecialchars($idx['address']); ?></h6> -->
								<!-- <?php print_r (explode(",", $idx['address'])); ?> -->

								<div class="skills_div">

									<?php
										$skills_array = explode(",", $idx['skills']);
										$modified_array = [];
										foreach($skills_array as $s){
											array_push($modified_array, "<span class='skills_border'>$s</span>");
										}
										$separator = "<span class='bold_dot'><b>&middot</b></span>";
										$skills_array_str = join($separator, $modified_array);
										echo "<div>$skills_array_str</div>";
									?>

									<!-- <?php foreach (explode(",", $idx['skills']) as $skill) : ?>
										<span class= "highlight_skills">
											<?php 

												// echo "$skill "; 
											?>
										</span>
									<?php endforeach; ?> -->
								</div>

							</div>
							<div>
								<img class="circle_feed" src="images/default.jpg" alt="profile image">
							</div>
						</div>
						<div class="card-action right-align">
							<a href="details.php?id=<?php echo $idx['id']; ?>" class="brand-text">More Info</a>
						</div>
					</div>
				</div>

			<?php endforeach;  ?>
		</div>		
	</div>
	

	<?php include("./templates/footer.php");  ?>
</html>

