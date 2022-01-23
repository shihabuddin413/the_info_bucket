<?php 

	include ('config/db_connect.php');

	$errors = array(
			'email'=>'',
			'name' =>'',
			'phone'=>'',
			'address'=>'',
			'image'=>'',
			'skills'=>'', 
	);

	$email = "";
	$name  = "";
	$phone = "";
	$address = "";
	$image = "";
	$skills = "";

	if (isset($_POST['submit'])){
		// print_r($_POST);
		// echo htmlspecialchars($_POST['email']);

		//check mail
		if (empty($_POST['email'])){
			$errors['email'] = "An email is required";
		}
		else {
			$email = $_POST['email'];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = "Enter a valid email address";
			}
		}

		//check name
		if (empty($_POST['name'])){
			$errors['name'] = "An name is required";
		}
		else {
			$name = $_POST['name'];
			if (!preg_match('/^[a-zA-z\s]+$/', $name)){
				$errors['name'] = "Enter a valid name";
			}
		}

		//check phone
		if (empty($_POST['phone'])){
			$errors['phone'] = "An phone number is required";
		}
		else {
			$phone=$_POST['phone'];
			if (preg_match('/[^0-9]/', $phone)){
				$errors['phone'] = "Enter a valid phone number";
			}
		}

		//check address
		if (empty($_POST['address'])){
			$errors['address'] = "An address is required ";
		}
		else {
			$address = $_POST['address'];
			if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $address )){
				$errors['address'] = "A valid address is required";
			}
		}

		// check skills
		if (empty($_POST['skills'])){
			$errors['skills'] = "At least two skills is required ";
		}
		else {
			$skills = $_POST['skills'];
			if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $skills )){
				$errors['skills'] = "Skills should be valid";
			}
		}

		//check image
		$image = "default.jpg";
		
		// -- its preserve for the upcoming updates >
		// if (empty($_POST['image'])){
		// 	$image = "default.jpg";
		// }
		// else {
		// 	$image = $_POST['image'];
		// 	if (!(str_ends_with($image, 'jpg') or str_ends_with($image, 'png'))) {
		// 		$errors['image'] = "Image Format Is not Valid only Jpg, Png allowed";
		// 	}
		// } 
		// -- its preserve for the upcoming updates >

		// echo $email ;
		// echo $name;
		// echo $phone;
		// echo $address;
		// echo $image;
		// echo $skills;

		if(array_filter($errors)){
			// echo "There are errors";
		} else {
			// echo "There are no errors";
			$name    = mysqli_real_escape_string($conn, $_POST['name']); 
			$email   = mysqli_real_escape_string($conn, $_POST['email']); 
			$phone   = mysqli_real_escape_string($conn, $_POST['phone']); 
			$address = mysqli_real_escape_string($conn, $_POST['address']); 
			$image   = mysqli_real_escape_string($conn, $_POST['image']); 
			$skills  = mysqli_real_escape_string($conn, $_POST['skills']); 

			$sql_query = "INSERT INTO peoples(name, email, phone, address, image, skills) VALUES('$name', '$email', '$phone', '$address', '$image', '$skills')";

			if(mysqli_query($conn, $sql_query)){
			 	// success
			 	header ('Location: index.php');
			} else {
			 	// error
			 	echo 'query error:'. mysqli_error($conn);
			}
		}
	}

 ?>




<!DOCTYPE html>
<html>
	<?php include("./templates/header.php");  ?>

	<section class="container grey-text">
		<h4 class="center">Add A New Profile</h4>
		<form action="add.php" method="POST" class="white">
			<label> Name:</label>
			<input type="text" name="name" value="<?php echo $name ?>">
			<div class="red-text"> <?php echo $errors['name']; ?> </div>

			<label> Email:</label>
			<input type="text" name="email" value="<?php echo $email ?>">
			<div class="red-text"> <?php echo $errors['email']; ?> </div>

			<label> Phone:</label>
			<input type="text" name="phone" value="<?php echo $phone ?>">
			<div class="red-text"> <?php echo $errors['phone']; ?> </div>

			<label> Address:</label>
			<input type="text" name="address" value="<?php echo $address ?>">
			<div class="red-text"> <?php echo $errors['address']; ?> </div>

			<label> Skills (Separeted by comma ):</label>
			<input type="text" name="skills" value="<?php echo $skills ?>">
			<div class="red-text"> <?php echo $errors['skills']; ?> </div>

			<label> Image Link:</label>
			<input type="text" name="image" value="<?php echo $image ?>">
			<div class="red-text"> <?php echo $errors['image']; ?> </div>

			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include("./templates/footer.php");  ?>
</html>