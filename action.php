<?php
include 'connect.php';
$roomNum=$_POST["roomNum"];
$roomP=$_POST["room_p"];
$waterU=$_POST["waterU"];
$date=$_POST["date"];
$elecU=$_POST["elecU"];
$extra=$_POST["extra"];
$lelecU= $conn->query("SELECT electric_unit,water_unit FROM billing WHERE MONTH(date) = MONTH(CURDATE())-1 AND billing.room = $roomNum");
$elP= $conn->query("SELECT elecprice,waterprice FROM maintainence");
$e = $lelecU->fetch_assoc();
$eP = $elP->fetch_assoc();
$ee = $e["electric_unit"];
$ww = $e["water_unit"];
$esp = $eP["elecprice"];
$wp = $eP["waterprice"];
if (!$e || !$eP) {
    die('Could not query:' . mysql_error());
}
$pelec = ($elecU - $ee) * $esp;
$pwater = ($waterU - $ww) * $wp;
$total = $roomP + $pelec + $pwater + $extra;
$insert = $conn->query("INSERT INTO billing (room, date, room_price, electric_unit,electric,water_unit, water, extra,total, paid) 
			VALUES ('$roomNum', '$date', '$roomP', '$elecU','$pelec', '$waterU','$pwater', '$extra','$total', 'No')");
?>
<html>
	<head>
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
				window.location="addpayment.php";
			}
		</script>
	</head>
	<body>
		<?php
			echo '<script> myFunc() </script>';
		?>
	</body>
</html>