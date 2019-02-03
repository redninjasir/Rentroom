<!DOCTYPE html>
<html lang="en">
<?php include 'connect.php'?>
<head>
    <title>Receipt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<style>
    .text-danger strong {
        color: #9f181c;
    }
    
    .receipt-main {
        background: #ffffff none repeat scroll 0 0;
        border-bottom: 12px solid #333333;
        border-top: 12px solid #9f181c;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #acacac;
        color: #333333;
        font-family: open sans;
    }
    
    .receipt-main p {
        color: #333333;
        font-family: open sans;
        line-height: 1.42857;
    }
    
    .receipt-footer h1 {
        font-size: 15px;
        font-weight: 400 !important;
        margin: 0 !important;
    }
    
    .receipt-main::after {
        background: #414143 none repeat scroll 0 0;
        content: "";
        height: 5px;
        left: 0;
        position: absolute;
        right: 0;
        top: -13px;
    }
    
    .receipt-main thead {
        background: #414143 none repeat scroll 0 0;
    }
    
    .receipt-main thead th {
        color: #fff;
    }
    
    .receipt-right h5 {
        font-size: 16px;
        font-weight: bold;
        margin: 0 0 7px 0;
    }
    
    .receipt-right p {
        font-size: 12px;
        margin: 0px;
    }
    
    .receipt-right p i {
        text-align: center;
        width: 18px;
    }
    
    .receipt-main td {
        padding: 9px 20px !important;
    }
    
    .receipt-main th {
        padding: 13px 20px !important;
    }
    
    .receipt-main td {
        font-size: 13px;
        font-weight: initial !important;
    }
    
    .receipt-main td p:last-child {
        margin: 0;
        padding: 0;
    }
    
    .receipt-main td h2 {
        font-size: 20px;
        font-weight: 900;
        margin: 0;
        text-transform: uppercase;
    }
    
    .receipt-header-mid .receipt-left h1 {
        font-weight: 100;
        margin: 34px 0 0;
        text-align: right;
        text-transform: uppercase;
    }
    
    .receipt-header-mid {
        margin: 24px 0;
        overflow: hidden;
    }
    
    #container {
        background-color: #dcdcdc;
    }
</style>
<script>
    function myFunction() {
    window.print();
    }
</script>

<head>
    <title>Page Title</title>
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <?php
    if(isset($_GET["roomid"])){
        $roomid=$_GET["roomid"];
    }
    $re=$conn->query("select billing.room,room_price,electric_unit,electric,water_unit,water,extra,total,name,phone,email
     from billing,client_info where billing.id=$roomid and billing.room=client_info.room");
    while(($row = $re->fetch_assoc())!=null){
    ?>
    <div class="container">
        <div class="row">
            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="receipt-header">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <div class="receipt-right">
                                <h5>Rental House</h5>
                                <p>081-4929970 <i class="fa fa-phone"></i></p>
                                <p>rental.house@gmail.com <i class="fa fa-envelope-o"></i></p>
                                <p>Thailand <i class="fa fa-location-arrow"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <h5><?php echo $row["name"];?> <small>  |   ห้อง : <?php echo $row["room"];?></small></h5>
                                <p><b>Mobile :</b><?php echo $row["phone"]?></p>
                                <p><b>Email :</b><?php echo $row["email"]?></p>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h1>ใบเสร็จ</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>รายละเอียด</th>
                                <th>จำนวนเงิน(บาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-md-9">ค่าห้อง</td>
                                <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $row["room_price"];?></td>
                            </tr>
                            <tr>
                                <td class="col-md-9">ค่าไฟ</td>
                                <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $row["electric"]," (",$row["electric_unit"],")";?></td>
                            </tr>
                            <tr>
                                <td class="col-md-9">ค่าน้ำ</td>
                                <td class="col-md-3"><i class="fa fa-inr"></i><?php echo $row["water"]," (",$row["water_unit"],")";?></td>
                            </tr>   
                            <tr>
                                <td class="col-md-9">เพิ่มเติม</td>
                                <td class="col-md-3"><i class="fa fa-inr"></i><?php echo $row["extra"];?></td>
                            </tr>                     
                            <tr>
                                <td class="text-right">
                                    <h2><strong>ยอดรวม: </strong></h2>
                                </td>
                                <td class="text-left text-danger">
                                    <h2><strong><i class="fa fa-inr"></i><?php echo $row["total"];?></strong></h2>
                                </td>                              
                            </tr>                            
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <p><b>วันที่ :</b> <?php echo date("d/m/y")?></p>
                                <h5 style="color: rgb(140, 140, 140);">ขอบคุณที่ใช้บริการ</h5>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h1>ลายเซ็น</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<body>
    
<div class="container" id="box">
	<div class="row well">
         <center>
             <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
	    </center>
        
	</div>
</div>
</body>
</html>