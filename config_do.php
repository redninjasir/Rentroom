<?php
include 'connect.php';
$e = $_POST["elec"];
$w = $_POST["water"];
$elP= $conn->query("UPDATE maintainence SET elecprice=$e");
$waP= $conn->query("UPDATE maintainence SET waterprice=$w");
if (!$elP || !$waP) {
    die('Could not query:' . mysql_error());
}
?>
<html>
	<head>
		<script>
			function myFunc() {
				<?php
				if($elP || $waP){ ?>
    				alert("Edit Complete");
				<?php
				}
				else{?>
					alert("Edit Fail");
				<?php
				}?>
				window.location="config.php";
			}
		</script>
	</head>
	<body>
		<?php
			echo '<script> myFunc() </script>';
		?>
	</body>
</html>