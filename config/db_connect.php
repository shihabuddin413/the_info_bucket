
<?php

//connect to database
$conn = mysqli_connect('localhost', 'info_bucket_admin', '1234567890', 'info_bucket');

// check connection
if (!$conn){
	echo "Connection Error" . mysqli_connect_error();
} 
/*
	else {
		echo "MySql is connected<br/>";
	}
	*/


/*
	foreach ($peoples as $idx) {
		echo " ------ ";
		foreach ($idx as $key => $value) {
			echo "<p class='pl-4'> $key : $value </p>";
		}
	}
	*/

?>

