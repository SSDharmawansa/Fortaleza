<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        

    if(isset($_POST['usernameom'])){
        $conn = new mysqli("sql103.ezyro.com","ezyro_28837284", "ssd123", "ezyro_28837284_db1");
        $name=$_POST['name'];
        $username=$_POST['usernameom'];
        $roomno=$_POST['roomno'];
        $mobileno=$_POST['mobileno'];
        $meals=$_POST['meal'];
        $drink=$_POST['drink'];
        $desert=$_POST['desert'];
        $additional=$_POST['additional'];
        $ordersql="INSERT INTO ordermealstoroom (name,username,roomno,mobileno,meals,drink,desert,additional) VALUES ( '$name','$username','$roomno','$mobileno','$meals','$drink','$desert','$additional')";
        $result = $conn->query($ordersql);
        unset($_POST);
        $conn->close();
    }
    if(isset($_POST['usernamers'])){
    $conn6 = new mysqli("sql103.ezyro.com","ezyro_28837284", "ssd123", "ezyro_28837284_db1");        
        $name =$_POST['name'];
        $username=$_POST['usernamers'];
        $mobileno=$_POST['mobileno'];
        $roomno=$_POST['roomno'];
        $additional =$_POST['additional'];
        $roomservice="INSERT INTO roomservice (name,username,mobileno,roomno,additional) VALUES ('$name','$username','$mobileno','$roomno','$additional')";
        $result2 = $conn6->query($roomservice);
        unset($_POST);
        $conn6->close();

    }

    if(isset($_POST['usernamerb'])){
    $conn7 = new mysqli("sql103.ezyro.com","ezyro_28837284", "ssd123", "ezyro_28837284_db1");        
        $name =$_POST['name'];
        $name =$_POST['name'];
        $username=$_POST['usernamerb'];
        $mobileno=$_POST['mobileno'];
        $period=$_POST['period'];
        $roomtype=$_POST['roomtype'];
        $additional =$_POST['additional'];
        $roomooking="INSERT INTO roomooking(name,username,mno,period,rtype,additional) VALUES ('$name','$username','$mobileno','$period','$roomtype','$additional')";
        $result3 = $conn7->query($roomooking);
        unset($_POST);
        $conn7->close();

    }

}


function login_button()
{
    if (empty($_SESSION)) {
        echo "<a href='login.php'>Login</a>";
    } else {
        echo "<a href='logout.php'>Logout</a>";
    }
}
function show_name()
{
    if (!empty($_SESSION)) {
        echo $_SESSION["name"];
    }
}
function rolebutton(){
    if(!empty($_SESSION)){
        if($_SESSION["role"]=="manager"){   
            echo "<a href='Manager.php'>Manage</a>";
        }
     }
    
}
?>
<html>
    <head>
<link rel="stylesheet" type="text/css" href="css/accomodation.css">
    <script src="js/accomodation.js"></script>
<style type="text/css">
    .body2{
    background-image:url('mbg.jpg');
    background-size:contain;
    height:400px;
    }
    .t1{
    height:380px;
    width:200px;
    margin-left:100px;
    margin-top:10px;

    }
    .t11{
    background-size:contain;
    height:200px;
    width:200px;
    }
   .roomtype {
     
}
	</style>
	
    </head>
    <body onload="load()">
        <!--header-->
<div class="header">
<div style="height:4px;padding-left:50px">
<img src="images/logo.png">
</div>
         <table>
            <tr>
                <td id="menu">
                <a href="index.php">Home</a>
                <?php rolebutton();?>
                
                    <div class="dropdown">
                        <a class="dropbtn">Banquet hall</a>
                        <div class="dropdown-content">
                            <a href="banquet.php">Booking Hall</a>
                            <a href="banquet.php">Gallery</a>                        
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="dropbtn">Accommodation</a>
                        <div class="dropdown-content">
                            <a href="accomodation.php">Booking Room</a>
                            <a href="accomodation.php">Order Meals</a>
                            <a href="accomodation.php">Request a waiter</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="dropbtn">Restaurant</a>
                        <div class="dropdown-content">
                            <a href="restaurent.php">Reserve Table</a>
                            <a href="restaurent.php">Order Meals</a>
                            <a href="restaurent.php">Request Waiter</a>
                        </div>
                    </div>
                    <a href="#footer">Contact</a>
                    <a href="index.php" >About</a>
                    <?php login_button(); ?>
                </td>
                <td>
                    <div><?php show_name();?></div>
                </td>
            </tr>
        </table>
    </div>
 <!--header-->


        <!--button-->
		<div class="order_button" style="padding-right: 25px;border-radius: 1000px / 300px;background-color:rgba(5, 1, 15, 0.8);width:200px;height:300px;right:25px;bottom:195px">
<div class="order_button" id="order_button1">
<img id="order_button" onclick="order()" src="images/restaurent/resto.png">
<div id="ordertext">Order meals to room</div>  
</div>

<div class="order_button" id="order_button2">
<img id="order_button" onclick="roomservice()" src="images/restaurent/resto.png">
<div id="ordertext">Room Service </div>  
</div>

<div class="order_button" id="order_button3">
<img id="order_button" onclick="roomboking()" src="images/restaurent/resto.png">
<div id="ordertext">Room Booking </div>  
</div></div>


<!--button-->
<!--order model-->

    <div id="order_model" class="order_model">
    <div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Order Meals</div>
  <div class="order_modal_content">
    <form method="post" action="accomodation.php" id="meals">
       <input type="text" name="name" required placeholder=" Name" size="40"><br><br>
       <input type="text" name="usernameom" placeholder="Username" size="40"required ><br> <br>
        <input type="number" name="roomno" placeholder="Room Number" size="40" required min="0" max="99"><br><br>
      <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="mobileno" placeholder="  Mobile Number" size="40" required><br><br>
      <input type="text" name="meal" placeholder="Foods" size="40" ><br><br>
      <input type="text" name="drink" placeholder="Drinks" size="40" ><br><br>
        <input type="text" name="desert" placeholder="Deserts" size="40"><br><br>
        <textarea name="additional" form="meals" placeholder="Aditionals" rows=5 cols=30></textarea><br><br>
        <input type="submit" value="Order Meals">
    </form>
  </div>
</div>
<div id="roomboking" class="order_model">
<div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Room Booking</div>
  <div class="order_modal_content">
    <form method="post" action="accomodation.php" id="roomBoking">
    <input type="text" name="name" required placeholder=" Name" size="40"><br><br>
       <input type="text" name="usernamerb" placeholder="Username" size="40"required ><br> <br> 
       <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="mobileno" placeholder="Mobile Number" size="40" required><br><br>
        <input type="text" name="period" placeholder="Period (Hours/Days)"size="40"><br><br>
         <select name="roomtype" style="width: 80%;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;	background-color: white;color:black;
	border-radius: 5px;">
             <option value="Didnt Select" hidden selected >Room Type</option>
             <option value="Sigle">Single</option>
             <option value="Double">Double</option>
             <option value="Many">Many</option>
       </select>
       <br><br>
        <textarea name="additional" form="roomBoking" placeholder="Aditionals" rows=5 cols=30></textarea><br><br>
        <input type="submit" Value="Book Now">
    </form>
  </div>
</div>

<div id="roomservice" class="order_model" id="roomService">
<div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Room Service</div>
  <div class="order_modal_content">
    <form method="post" id="mealForm" action="accomodation.php">
    <input type="text" name="name" required placeholder=" Name" size="40"><br><br>
       <input type="text" name="usernamers" placeholder="Username" size="40"required ><br> <br> 
       <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="mobileno" placeholder="  Mobile Number" size="40" required><br><br>
        <input type="number"  name="roomno" placeholder="Room Number" size="40"max="99" min="0"><br><br>
        <textarea name="additional" form="mealForm" placeholder="Aditionals" rows=5 cols=30></textarea><br><br>
        <input type="submit" value="Request Room">
    </form>
  </div>
</div>

    <!--order model-->
    <div id="imgs">
        <img src="images/sideshow/k.jpg" id="imgc">
	<script>
		  var no = 0;
var x;

function slideshow() {
    no++;
    switch (no) {
        case 1:
            document.getElementById("imgc").src = "images/sideshow/a.jpg";
            break;
        case 2:
            document.getElementById("imgc").src = "images/sideshow/b.jpg";
            break;
        case 3:
            document.getElementById("imgc").src = "images/sideshow/c.jpg";
            break;
        case 4:
            document.getElementById("imgc").src = "images/sideshow/d.jpg";
            break;
        case 5:
            document.getElementById("imgc").src = "images/sideshow/e.jpg";
            break;
        case 6:
            document.getElementById("imgc").src = "images/sideshow/f.jpg";
            break;
        case 7:
            document.getElementById("imgc").src = "images/sideshow/g.jpg";
            break;
        case 8:
            document.getElementById("imgc").src = "images/sideshow/h.jpg";
            break;
        case 9:
            document.getElementById("imgc").src = "images/sideshow/i.jpeg";
            break;
        case 10:
            document.getElementById("imgc").src = "images/sideshow/j.jpg";
            no = 0;
            break;
    }
}
</script>
    </div>
  <div class="footer" id="footer">
       <div class="body2">
<table>
	<tr>
	<td>
	<div class="t1">
		<div class="t11"><h3 style="color:white;text-align:center;">THE MOST POPULAR ROOM</h3><hr>
		<div class="t111"><img src="images/sq.jpg" style="width:200px;height:200px"></div>
		</div>
		<div style="padding-top:70px">
		<p style="color:white;font-size:15px"><b>CityVillage</b>    610,000LKR<br><br></p><p style="color:white;font-size:12px">This apartments,set at the seaside getaway to CityVillage,offer... </p>
		</div>
		
	</div>
	</td>
	<td>
	<div class="t1">
		<div class="t11"><h3 style="color:white;text-align:center;">LINKS</h3><hr>
		<ul style="color:white;text-align:left;">
		<li style="color:white;text-align:left;"><a href="index.php">Home</a></li>
		<li style="color:white;text-align:left;"><a href="banquet.php">Banquet hall</a></li>
		<li style="color:white;text-align:left;"><a href="accomodation.php">Accommodation</a></li>
		<li style="color:white;text-align:left;"><a href="restaurent.php">Restaurant</a></li>
		<li style="color:white;text-align:left;"><a href="#footer.php">Contact</a></li>
		<li style="color:white;text-align:left;"><a href="#about.php">About</a></li>
		</ul>
		</div>
		<div class="t11"><h3 style="color:white;text-align:center;">STAY</h3><hr>
		<ul style="color:white;text-align:left;">
		<li style="color:white;text-align:left;">Rooms</li>
		<li style="color:white;text-align:left;">suites</li>
		<li style="color:white;text-align:left;">Groups</li>
		<li style="color:white;text-align:left;">Specials & Packages</li>		
		</ul>
		</div>
	</div>
	</td>
	<td>
	<div class="t1">
	
		
		<div class="t111">
		<p style="padding-top:40px;color:white;font-size:30px">Have some queries? Or just want to say Hi. Feel free to contact us 24x7. We'll be happy to help.</p>
		</div>
	</div>
	</td>
	<td>
	<div class="t1"><a href="cart.htm">
		<div style="background-size:contain;height:130px;width:200px;"><h3 style="color:white;text-align:center;">CONTACT INFO</h3><hr>
		<div class="t111"><img src="images/logo.png" style="width:200px;height:70px"></div>
		</div>
		<div style="padding-top:">
		<p style="color:white;font-size:14px"><b>Asian Highway 43, Dodanduwa</b><br><br>Hot Line : 0112 279 358<br><br>Hot Line : 0112 277 047<br><br>fortalezahotel@gmail.com<br><br></p><p style="color:white;font-size:20px">Thank you</p>
		</div>
	</div>
	</td>
	</tr>
</table>
</div>
    </div>
</div>
    </body>
</html>