<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
    #list,#list tr,#list td,#list th{
        border:1px solid black;
        border-collapse: collapse;
        font-size:17px;
        text-align: center;
        margin-top: 10px;
    } 
    th{
        width: 100px;
        background-color: grey;
    }
    tr{
        height: 30px;
    }
    #esewalogo{
         background-image: url("../images/esewa.png");
         height: 100px;
         width: 100px;
         border:none;
           background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover; 
    }  


    </style>
</head>
<body>
    <h1>Confirm Payment</h1>
<table id="list">
<tr>
<th style="width: 200px;">Item</th>
<th>Price</th>
</tr>
<?php $totalprice=0;
$allcartid=date("Y-m-d h:i:sa")."";
 foreach ($checkoutvalues as $value) {
    
    
    $totalprice=$totalprice+$value['total_price'];?>

<tr>
    <?php 
    $currentvalue=$value["id"];
    $allcartid.=$currentvalue.".";
     ?>
    
<td><?php echo $value['name']?></td>
<td><?php echo $value['total_price']?></td>
</tr>
<?php }
?>
<input type="hidden" name="allcartid" id="allcartid" value="<?php echo $allcartid;?>">
<tr>
<th>Sub Total:   </th>
<th><?php echo "  ".$totalprice; 
?><input type="hidden" id="totalprice" value="<?php echo $totalprice;?>"></th>
</tr>

</table>
<table>
<tr>
<td><h3>Payment Method:</h3><td>
<td><input type="submit" name="esewa" value="" id="esewalogo" onclick="post(path,params)" style="background-color: lightgreen;" ></td>
</tr>
</table>



<?php
$_SESSION['totalprice']= $totalprice;
?>
<script type="text/javascript">
    var allcartid=document.getElementById("allcartid").value;
    console.log("All cart id:");
    console.log(allcartid);
    var totalprice=document.getElementById("totalprice").value;
    console.log(totalprice);
    var path="https://uat.esewa.com.np/epay/main";
    var params= {
    amt:0,
    psc: 0,
    pdc: 0,
    txAmt: 0,
    tAmt: 0,
    pid: "null",
    scd: "NP-ES-COLLEGE-TEST",
    su: "http://localhost/try/customer/confirmorder.php",
    fu: "http://localhost/try/customer/purchasefailed.php"
}

params["amt"]=totalprice;
params["tAmt"]=totalprice;
params["pid"]=allcartid;


function post(path, params) {
    var form = document.createElement("form");
    form.setAttribute("method", "POST");
    form.setAttribute("action", path);

    for(var key in params) {
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", key);
        hiddenField.setAttribute("value", params[key]);
        form.appendChild(hiddenField);
    }

    document.body.appendChild(form);
    form.submit();
}

</script>


</body>
</html>
