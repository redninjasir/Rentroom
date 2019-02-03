<?php
$db = 'test';
$host = 'localhost';
$username = 'root@localhost';
$password = '';
 try {
    $connection = new mysqli($host, $username, $password, $db);
} catch (Exception $e) {
    die('failed');
}
?>
<html lang="en">

<head>
    <title>update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<style>
    .scrolling table {
        table-layout: inherit;
        *margin-left: -100px;
        /*ie7*/
    }

    .scrolling td,
    th {
        vertical-align: top;
        padding: 10px;
        min-width: 50px;
    }

    .scrolling th {
        position: absolute;
        *position: relative;
        /*ie7*/
        left: 0;
        width: 100px;
    }

    .outer {
        position: relative
    }

    .inner {
        overflow-x: auto;
        overflow-y: visible;
        margin-left: 120px;
    }
</style>


<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="Home.php">Rental House</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="history.php">ประวัติ</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    เพิ่มข้อมูลผู้เช่า
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="AddRenter.php">เพิ่มผู้เช่าใหม่</a>
                    <a href="addpayment.php" class="dropdown-item">เพิ่มข้อมูลค่าเช่า</a>                   
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="maintainence.php">แก้ไข</a>
            </li>
        </ul>
        <a href="config.php" class="btn btn-info ml-auto"><i class="fa fa-cogs" style="font-size:24px"></i></a>
    </nav>


    <!------ Include the above in your HEAD tag ---------->
	<div class="container">
        
        <div class="row">
            <div class="table">
                <div class="scrolling outer">
                    <div class="inner">
                        <table class="table table-striped table-hover table-condensed">
                            <fieldset disable> 
                                <tr>
                                <td>ห้อง</td>
                                <td>ค่าห้อง</td>
                                <td>วันที่</td>
								<td>ค่าน้ำ(หน่วย)</td>
								<td>ค่าไฟ(หน่วย)</td>
                                <td>เพิ่มเติม</td>
								<td></td>
                            </tr>
							
							<?php
										$room1=$_POST["id"];
                                        $res = $connection->query("SELECT * FROM billing where id =$room1"); 
                                        while (($row = $res->fetch_assoc()) != null) {
                                            ?>
											<form method="POST" action="updating_do.php">
                                            <input type="hidden" name="id" value=<?php echo $room1?>>
                                            <tr><td><div class="input-group">
													<span class="input-group-addon"></span>
													<input  name="room" type="text" placeholder="room" class="form-control" value ='<?php echo $row["room"]; ?>'><br></div></td>
											    <td><div class="input-group">
													<span class="input-group-addon"></span>
													<input  name="room_price" type="text" placeholder="room_price" class="form-control" value ='<?php echo $row["room_price"]; ?>'><br></div></td>
                                                    <td><div class="input-group">
													<span class="input-group-addon"></span>
													<input  name="date" type="text" placeholder="date" class="form-control" value ='<?php echo $row["date"]; ?>'><br></div></td>    
												<td><div class="input-group">
													<span class="input-group-addon"></span>
													<input  name="water_unit" type="text" placeholder="water_unit" class="form-control" value ='<?php echo $row["water_unit"]; ?>'><br></div></td>
												<td><div class="input-group">
													<span class="input-group-addon"></span>
													<input  name="electric_unit" type="text" placeholder="electric_unit" class="form-control" value ='<?php echo $row["electric_unit"]; ?>'><br></div></td>
                                                <td><div class="input-group">
													<span class="input-group-addon"></span>
													<input  name="extra" type="text" placeholder="extra" class="form-control" value ='<?php echo $row["extra"]; ?>'><br></div></td>    
												<td><input type="submit"class=" btn btn-outline-primary" id="button1" value="บันทึก"></td>
												
                                            </tr>
                                          </form>
                                            <?php
                                        }
                                        ?>
                                </td>
                            
                            </tr>
                            </fieldset>
                        </table>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    

</body>

</html>

