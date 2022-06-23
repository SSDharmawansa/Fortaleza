<?php
session_start();

function show_name(){
    
if(!empty($_SESSION)){
    echo $_SESSION["name"];
 }
}


function rolebutton(){
    if(!empty($_SESSION)){
        if($_SESSION["role"]=="manager"){   
            echo "<a href='Manage.php'>Managers</a>";
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        

        if(isset($_POST['username'])){
  $conn4 = new mysqli("sql103.ezyro.com","ezyro_28837284", "ssd123", "ezyro_28837284_db1");
           
            $username=$_POST['username'];
            $mobileno=$_POST['mobileno'];
            $meal=$_POST['meal'];
            $drink=$_POST['drink'];
            $desert=$_POST['desert'];
            $additional=$_POST['additr'];;
            $tableno=$_POST['tableno'];
            $ordersql="INSERT INTO mealorders (username,mobileno,meal,drinks,desert,additional,tableno) VALUES ('$username','$mobileno','$meal','$drink','$desert','$additional','$tableno')";
            $result= $conn4->query($ordersql);
            $conn4->close();
            unset($_POST);
  
        }
        
      if(isset($_POST['usernamew'])){
  $conn4 = new mysqli("sql103.ezyro.com","ezyro_28837284", "ssd123", "ezyro_28837284_db1");
            $username=$_POST['usernamew'];
            $time=time();
            $tablenow=$_POST['tablenow'];
            $waiter="INSERT INTO waiter (username,tableno,time,confirm) VALUES ('$username','$tablenow','$time','0')";
            $result2  = $conn4->query($waiter);
            unset($_POST);
            $conn4->close();
            header('Location:restaurent.php');

        }
        if(isset($_POST['usernamer'])){
  $conn5 = new mysqli("sql103.ezyro.com","ezyro_28837284", "ssd123", "ezyro_28837284_db1");
            $username=$_POST['usernamer'];
            $time=$_POST['timer'];
            $date=$_POST['dater'];
            $cmmnt=$_POST['addit'];
            $treservation="INSERT INTO treservation (username,date,time,additional) VALUES ('$username','$date','$time','$cmmnt')";
            $result3  = $conn5->query($treservation);
            $conn5->close();
            unset($_POST); 
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
    <link rel="stylesheet" type="text/css" href="css/restaurent.css">
    <script src="js/restaurent.js"></script>
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

    .btn-group .button {
    background-color: #4CAF50; /* Green */
    border: 1px solid blue;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    width: 150px;
    display: block;
	}

	.btn-group .button:not(:last-child) {
	  border-bottom: none; /* Prevent double borders */
	}

	.btn-group .button:hover {
	  background-color: #3e8e41;
	}

	.bgimg{
		background-image: url("images/bgp.jpg");
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

    <div id="empty"></div>
    <!--slideshow-->
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
     <!--slideshow-->
    <!--button-->
	<div class="order_button" style="padding-right: 25px;border-radius: 1000px / 300px;background-color:rgba(5, 1, 15, 0.8);width:200px;height:300px;right:25px;bottom:195px">
    <div class="order_button" id="order_button1">
    <img id="order_button" onclick="order()" src="images/restaurent/resto.png">
    <div id="ordertext">Order Meals &nbsp&nbsp</div>  
</div>

<div class="order_button" id="order_button2">
<img id="order_button" onclick="waiter()" src="images/restaurent/resto.png">
<div id="ordertext">Call a Waiter &nbsp&nbsp</div>  
</div>

<div class="order_button" id="order_button3">
<img id="order_button" onclick="reservation()" src="images/restaurent/resto.png">
<div id="ordertext">Table Reservation &nbsp&nbsp</div>  
</div></div>

    <!--button-->
     <!--order model-->
<div id="order_model" class="order_model">
<div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Order Meals</div>
  <div class="order_modal_content">

    <form id="mealsfrm" method="post"  action="restaurent.php" >
        
        <table>
    <input type="text" name="username" placeholder="Username" required>  <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="mobileno" placeholder=" Mobile Number" required><br>
    <br>
     <input type="number" name="tableno" placeholder="Table Number"  required size="60" max="20" min="0"><br><br>
        <input type="text" name="meal" placeholder="Foods" size="40">  <br><br>
        <input type="text" name="drink" placeholder="Drinks" size="40" ><br><br>
        <input type="text" name="desert" placeholder="Deserts" size="40"><br><br>
        <textarea name="additr" form="mealsfrm" placeholder="Aditionals" rows=5 cols=30></textarea><br><br>
        <input type="submit" value="Order Meals">
        </table>
    </form>
  </div>
</div>

<div id="request_waiter_model" class="order_model">
<div  id="model_title"><div class="close" onclick="close_model()">&times;</div>Call A Waiter</div>
  <div class="order_modal_content">
    <form method="post" action="restaurent.php" onsubmit="<?php submitchecka(); submitcheckb(); ?>">
        <input type="text" name="usernamew" placeholder="Username" value="<?php if(!empty($_SESSION)){echo $_SESSION["name"];}?>" required><br>
    <input type="number" name="tablenow" placeholder="Table Numer" required max="20" min="0"><br>
        <input type="submit" value="Call">
    </form>
  </div>
</div>
<div id="reservation" class="order_model">
<div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Table Reservation</div>
  <div class="order_modal_content">
    <form action="restaurent.php" id="reserve" method="post"  onsubmit="<?php submitchecka(); submitcheckb(); ?>">
        <input type="text" placeholder="Username" name="usernamer" value="<?php if(!empty($_SESSION)){echo $_SESSION["name"];}?>" required>
        <td><input type="date" placeholder="Date" name="dater" required><br><br>
         <td><input type="time" name="timer" placeholder="TIme" required><br><br>
         <textarea name="addit"  form="reserve" placeholder="Additionals"></textarea><br><br>
    <input type="submit" value="Reserve">
    </form>
  </div>
</div>
<div class="bgimg">
<table>
<tr>
<td>
  <div class="btn-group">
  <button class="button"id="tb1" onclick="tabclick('tab1','tb1')">BREAKFAST</button>
  <button class="button"id="tb2" onclick="tabclick('tab2','tb2')">LUNCH</button>
  <button class="button"id="tb3" onclick="tabclick('tab3','tb3')">DINNER</button>
  <button class="button"id="tb4" onclick="tabclick('tab4','tb4')">DESSERT</button>
  <button class="button"id="tb5" onclick="tabclick('tab5','tb5')">DRINKS</button>
  </div>
</td>
<td>
    <div class="tab" id="tab1">
	<table>
	<tr>
	<td class="xxx">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\a.jpg" class="mealsimage">
            <div class="text1">Rs60/=</div>
            <div class="mealbottom">Hoppers</div>
        </div>
	</td>
    <td class="xxx">	
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\b.jpg" class="mealsimage">
            <div class="text1">Rs50/=</div>
            <div class="mealbottom">String-hoppers</div>
        </div>
	</td>
    <td class="xxx">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\c.jpg" class="mealsimage">
            <div class="text1">Rs60/=</div>
            <div class="mealbottom" >Bread</div>
        </div>
	</td>
    <td class="xxx">	
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\d.jpg" class="mealsimage">
            <div class="text1">Rs40/=</div>
            <div class="mealbottom">Sandvich</div>
        </div>
	</td>	
		</tr>
	</table>
    </div>
    <div class="tab" id="tab2">
        <table>
	<tr>
	<td class="xxx">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\e.jpg" class="mealsimage">
            <div class="text1">Rs300/=</div>
            <div class="mealbottom">Fride rice</div>
        </div>
	</td>
    <td class="xxx">	
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\f.jpg" class="mealsimage">
            <div class="text1">Rs350/=</div>
            <div class="mealbottom">Nasiguran</div>
        </div>
	</td>
    <td class="xxx">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\g.jpg" class="mealsimage">
            <div class="text1">Rs280/=</div>
            <div class="mealbottom">Biriyani</div>
        </div>
	</td>
    <td class="xxx">	
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\h.jpg" class="mealsimage">
            <div class="text1">Rs150/=</div>
            <div class="mealbottom">Normal Rice</div>
        </div>
	</td>	
		</tr>
	</table>
    </div>
    <div class="tab" id="tab3">
        <table>
	<tr>
	<td class="xxx">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\i.jpg" class="mealsimage">
            <div class="text1">Rs250/=</div>
            <div class="mealbottom">Pasta</div>
        </div>
	</td>
    <td class="xxx">	
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\j.jpg" class="mealsimage">
            <div class="text1">Rs250/=</div>
            <div class="mealbottom">Noodles</div>
        </div>
	</td>
<td class="xxx">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\k.jpg" class="mealsimage">
            <div class="text1">Rs300/=</div>
            <div class="mealbottom">Fride Rice</div>
        </div>
	</td>
    <td class="xxx">	
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\l.jpg" class="mealsimage">
            <div class="text1">Rs120/=</div>
            <div class="mealbottom">Massala dose</div>
        </div>
	</td>	
		</tr>
	</table>
    </div>
    <div class="tab" id="tab4">
        <table>
	<tr>
	<td class="xxx">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\q.jpg" class="mealsimage">
            <div class="text1">Rs60/=</div>
            <div class="mealbottom">Fruit salad</div>
        </div>
	</td>
    <td class="xxx">	
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\r.jpg" class="mealsimage">
            <div class="text1">Rs80/=</div>
            <div class="mealbottom">Ice-cream</div>
        </div>
	</td>
<td class="xxx">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\s.jpg" class="mealsimage">
            <div class="text1">Rs100/=</div>
            <div class="mealbottom">Chocolate mousse</div>
        </div>
	</td>
    <td class="xxx">	
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\t.jpg" class="mealsimage">
            <div class="text1">Rs100/=</div>
            <div class="mealbottom">Falooda</div>
        </div>
	</td>	
		</tr>
	</table>
    </div>
    <div class="tab" id="tab5">
          <table>
	<tr>
	<td class="xxx">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\m.jpg" class="mealsimage">
            <div class="text1">Rs20/=</div>
            <div class="mealbottom">Mango</div>
        </div>
	</td>
    <td class="xxx">	
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\n.jpg" class="mealsimage">
            <div class="text1">Rs35/=</div>
            <div class="mealbottom">Apple</div>
        </div>
	</td>
<td class="xxx">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\o.jpg" class="mealsimage">
            <div class="text1">Rs20/=</div>
            <div class="mealbottom">Orange</div>
        </div>
	</td>
    <td class="xxx">	
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\p.jpg" class="mealsimage">
            <div class="text1">Rs35/=</div>
            <div class="mealbottom">Cool drinks</div>
        </div>
	</td>	
		</tr>
	</table>
    </div>
	</td>
	</tr>
</table>
 </div>
<!--tab-->
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
		<p style="color:white;font-size:15px,text-align: left;"><b>CityVillage</b>    610,000LKR<br><br></p><p style="color:white;font-size:12px">This apartments,set at the seaside getaway to CityVillage,offer... </p>
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

</body>
</html>