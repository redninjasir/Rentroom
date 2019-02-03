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
    <title>Maintenance</title>
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
	<div class="col-md-6" style="margin-left:27%">
        <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for room or date." title="Type in a name">
    </div>
    <div class="container">
        <div class="row">
            <div class="table">
                <div class="scrolling outer">
                    <div class="inner">
                        <table class="table table-hover table-condensed" id="project">
                            <tr>
                                <td>ห้อง</td>
                                <td>วันที่</td>
                                <td>ค่าห้อง</td>      
                                <td>มิเตอร์ไฟ(หน่วย)</td>                          
								<td>มิเตอร์น้ำ(หน่วย)</td>								
								<td>เพิ่มเติม</td>
                            </tr>							
							<?php
                                $res = $connection->query("SELECT * FROM billing ");										
                                while (($row = $res->fetch_assoc()) != null) {
                                ?>
                                <tr><form method="POST" action="update.php">
                                    <th hidden><input name="id" type="hidden" value ="<?php echo $row["id"]; ?>"></th>
                                    <td><input name="room"  type="text" class="form-control" value ='<?php echo $row["room"]; ?>'readonly></td>
                                    <td><input name="date"  type="text" class="form-control"value ='<?php $date=date_create($row["date"]); echo date_format($date,"d/m/Y")?>'readonly></td>
                                    <td><input name="room_price"  type="text" class="form-control"value ='<?php echo $row["room_price"]; ?>'readonly></td>
                                    <td><input name="electric_unit"  type="text" class="form-control"value ='<?php echo $row["electric_unit"]," (",$row["electric"],")";?>'readonly></td>
									<td><input name="water_unit"  type="text" class="form-control"value ='<?php echo $row["water_unit"]," (",$row["water"],")";?>'readonly></td>
                                    <td><input name="extra"  type="text" class="form-control"value ='<?php echo $row["extra"]; ?>'readonly></td>
									<td><input type="submit"class=" btn btn-outline-primary" id="button1" value="แก้ไข"></td></form>												
                                </tr>                                          
                                <?php }?>
                            </tr>
                            </table>
						</div>
                    </div>
                </div>
            </div>
        </div>
    <script>
        function myFunction() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("project");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            td1 = tr[i].getElementsByTagName("td")[1];
            if (td || td1) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
				
      </script>
 
    

</body>

</html>