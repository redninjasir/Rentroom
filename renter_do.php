<?php
include 'connect.php';
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$room=$_POST["room"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$curdate=date("Y-m-d");

$insert = $conn->query("INSERT INTO client_info (name, surname, phone, startdate,email,room) 
            VALUES ('$fname', '$lname', '$phone','$curdate','$email','$room')")

?>
<html>
	<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<script>
			function myFunc() {
				<?php
				if($insert){ ?>
    				alert("Add Complete");
				<?php
				}
				else{?>
					alert("Add Fail");
				<?php
				}?>
				window.location="addrenter.php";
			}
		</script>
	</head>
	<body>
		<?php
			echo '<script> myFunc() </script>';
		?>
	</body>
</html>