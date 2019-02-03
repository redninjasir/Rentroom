<!DOCTYPE html>
<?php include 'connect.php'?>
<html lang="en">
<head>
    <title>Rental House Homepage</title>
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
    <div class="container">   
        <div class="row">
            <div class="table">
                <div class="scrolling outer">
                    <div class="inner">
                        <table class="table table-hover table-condensed">
                            <tr>
                                <th>สถานะ</th>
                                <td>วัน/เดือน/ปี</td>
                                <td>ห้อง</td>
                                <td>ค่าห้อง</td>
                                <td>ราคาค่าไฟ(หน่วย)</td>
                                <td>ราคาค่าน้ำ(หน่วย)</td>                                
                                <td>เพิ่มเติม</td>
                                <td>ยอดรวม</td>                            
                            </tr>
                            <?php 
                                $re = $conn->query("SELECT * from billing where paid='no' order by date asc");
                                while(($row = $re->fetch_assoc())!=null){
                            ?>                            
                                <th>
                                    <a href="paymentForRoom.php?roomid=<?php echo $row["id"];?>" <?php if($row["paid"]=="yes"){echo ("class="."'btn btn-outline-primary'>"."จ่ายแล้ว");}else{echo ("class="."'btn btn-warning'>"."ค้างชำระ");}?></a>
                                </th>
                                <td>
                                <input type="text" class="form-control" value="<?php $date=date_create($row["date"]); echo date_format($date,"d/m/Y")?>" disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value ="<?php echo $row["room"];?>" disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="<?php echo $row["room_price"];?>" disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="<?php echo $row["electric"]," (",$row["electric_unit"],")";?>" disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="<?php echo $row["water"]," (",$row["water_unit"],")";?>" disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="<?php echo $row["extra"];?>" disabled>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="<?php echo $row["total"];?>" disabled>
                                </td>
                            </tr>
                        <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>