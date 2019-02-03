<?php
include 'connect.php';
if(isset($_GET["roomid"])){
    $roomid=$_GET["roomid"];
}
$up = $conn->query("UPDATE billing SET paid = 'yes' WHERE billing.id = $roomid");
?>
<html>
	<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<script>
			function myFunc() {
				<?php
				if($up){ ?>
    				alert("Update success");
				<?php
				}
				else{?>
					alert("Update Fail");
				<?php
				}?>
				window.location="history.php";
			}
		</script>
	</head>
	<body>
		<?php
			echo '<script> myFunc() </script>';
		?>
	</body>
</html>