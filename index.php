<?php
session_start();
$sbmitfailemsg = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $conn = new mysqli("sql103.ezyro.com","ezyro_28837284", "ssd123", "ezyro_28837284_db1");
    
    $username = $_POST['name'];
    $comment  = $_POST['comment'];
    $sql2     = "INSERT INTO comments (username,comment) VALUES ('$username', '$comment')";
    $result   = $conn2->query($sql2);
    unset($_POST);
    header('Location:index.php');
    
}

function rolebutton(){
    if(!empty($_SESSION)){
        if($_SESSION["role"]=="manager"){   
            echo "<a href='Manager.php'>Manage</a>";
        }
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
function submitchecka()
{
    if (empty($_SESSION)) {
        echo "event.preventDefault();";
    }
}
function submitcheckb()
{
    if (empty($_SESSION)) {
        echo "alertsubmit();";
    }
}
?> 

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <script src="js/index.js"></script>
	
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
                    <a href="#about">About</a>
                    <?php login_button(); ?>
                </td>
				 <td>
                    <div class="lgname"><?php show_name();?></div>
                </td>
            </tr>
        </table>
    </div>
 <!--header-->

  <!--Welcome-->
  <div class="welcome_container">
        <div id="wp">Fortaleza</div>
        <p id="welcomep">Hotel & Restaurant<p>
    </div>
  <!--Welcome-->
  <!--About-->
  <div class="about"id="about">
      <div class="aboutText"><h2>ABOUT</h2>
      Overlooking the enchanting Galle face, the 5-star Fortaleza Hotel in Dodanduva is the perfect choice for a vacation immersed in the relaxing atmosphere of a warm and comfortable building, just ten minutes from the historic center.

The friendly family management and the convenient access to the private beach are just a few of the aspects that make the hotel a preferred destination for lovers of the sea, art and hiking trips on some of the most beautiful nature trails.

The reception staff at Foetalza Hotel, available from 7 am to 8.30 pm, can book guided tours, excursions and tickets to shows and events that make 
Lesher World one of the world’s most sought-after tourist destinations, every season.

A few meters from the thin strip of land that connects Galle Face with the mainland, the hotel offers a full-service Beach Club, a private beach with beach chairs, umbrellas, a snack bar and an excellent restaurant where you can enjoy the best Sri lankan seafood specialties.

Breakfast (7.30 – 10.00 am) is available on request and our guests will be able to enjoy it at bar next door at an extra cost of  700.00 Rs per day per person (the service can be booked directly in hotel). </div>
      <div class="imgc">
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
  </div>
  <!--About-->

  <!--feedback-->
  <div style="text-align:center;color:white;"><h2 style="font-size:50px;">Feedback<h2></div>
    <div class="coment"><form id="feedback_form" method="post" action="index.php" onsubmit="<?php submitchecka();submitcheckb() ?>">
    <?php echo $sbmitfailemsg ?>
    Name<br>
    <input type="text" name="name" value="<?php if(!empty($_SESSION)){echo $_SESSION["name"];}?>" required><br><br>
    Mobile Number<br>
    <input  type="text"  name="phone_no"  required><br><br>
    Feedback<br>
    <textarea rows=5 cols=20 name="comment" form="feedback_form"  required></textarea><br><br>
    <input type="submit" id="submitbtn" onclick="test_cmnt_condition();" style="font-weight:bolder;"value="DONE" >
    </form></div>
    <!--feedback-->
  <!--footer-->
  <div class="footer"id="footer">
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