<?php
    session_start();
    function show_name()
    {
        if (!empty($_SESSION)) {
            echo $_SESSION["name"];
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
    function rolebutton(){
        if(!empty($_SESSION)){
            if($_SESSION["role"]=="manager"){   
                echo "<a href='manager.php'>Manage</a>";
            }
         }
        
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $conn = new mysqli("sql103.ezyro.com","ezyro_28837284", "ssd123", "ezyro_28837284_db1");

            $username=$_POST['username'];
            $mobileno=$_POST['mobileno'];
            $hallid=$_POST['hallid'];
            $date=$_POST['date'];
            $additional=$_POST['additional'];
            $hallbooking="INSERT INTO hallboking(name,username, mno, hallid, additional,seen) VALUES ('','$username','$mobileno','$hallid','$additional','0')";
            $result = $conn->query($hallbooking);
            unset($_POST);
            $conn->close();
    }

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/banquet.css">
        <script src="js/banquet.js"></script>
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
                            <a href="#gallery">Gallery</a>                        
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
                    <a href="index.php">About</a>
                    <?php login_button(); ?>
                </td>
                <td>
                    <div><?php show_name();?></div>
                </td>
            </tr>
        </table>
    </div>
 <!--header-->

 <!--slidshow-->
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
    <!--slidshow-->
    <div class="gallery">
        <div style="text-align:center;padding:20px;"><h2 id="gallery">Gallery</h2></div>
        <img src="images/sideshow/a.jpg">
        <img src="images/sideshow/b.jpg">
        <img src="images/sideshow/c.jpg">
        <img src="images/sideshow/d.jpg">
        <img src="images/sideshow/e.jpg">
        <img src="images/sideshow/f.jpg">
        <img src="images/sideshow/g.jpg">
        <img src="images/sideshow/h.jpg">
        <img src="images/sideshow/i.jpeg">
        <img src="images/sideshow/j.jpg">
        <img src="images/sideshow/k.jpg">
        <img src="images/sideshow/l.jpg">

    </div>
    <!--button--><div class="order_button" style="padding-right: 25px;border-radius: 1000px / 300px;background-color:rgba(5, 1, 15, 0.8);width:200px;height:110px;right:25px;bottom:290px">
    <div class="order_button" id="order_button1">
        <img id="order_button" onclick=" bookinghall()" src="images/restaurent/resto.png">
        <div id="ordertext">Booking Hall &nbsp;&nbsp;</div>  
    </div></div>
<!--button-->
   <!--order model-->
   <div id="bookingHall" class="order_model">
    <div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Booking Hall</div>
        <div class="order_modal_content">
            <form method="post" action="banquet.php" id="banquet">
            <table>
                <input type="text" name="username" placeholder="Username" required > <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="mobileno" placeholder=" Mobile Number" required><br>
                <br>
                <input type="number" name="hallid" placeholder="Hall Id" size="40"max="3" min="0">  <br><br>
                <input type="date" name="date" placeholder="Date" size="40" ><br><br>
                <textarea name="additional" form="banquet" placeholder="Aditionals" rows=5 cols=30></textarea><br><br>
                <input type="submit" value="Book Now">
            </table>
            </form>
        </div>
    </div>
 <!--order model-->
  <!--footer-->
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
<!--footer-->

    </body>

</html>