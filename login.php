<?php
session_start();
  $conn = new mysqli("sql103.ezyro.com","ezyro_28837284", "ssd123", "ezyro_28837284_db1");
  $conn3 = new mysqli("sql103.ezyro.com","ezyro_28837284", "ssd123", "ezyro_28837284_db1");
$status1=null;
$status2=null;
$checkreg=null;
$userdata=0;


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['repassword'])){
        
            $username=$_POST['username'];
            $name=$_POST['name'];
            $password=$_POST['password'];
            $role="user";
            if($_POST['repassword']==$password){
                $sql3="select * from users";
                $usersdata= $conn3->query($sql3);
				
             
				while($row = $usersdata->fetch_assoc()) {
                    if($row["username"]==$username){
                        $status1="Username already registerd " ;
                        $checkreg=0;
                        $status1="User Name already used";
                        break;
                    }
                     $checkreg=1;
                }
                if($checkreg==1){
                    $sql4 = "INSERT INTO  users (username,name,password,role) VALUES ('$username','$name', '$password','$role')";
                    $result = $conn3->query($sql4);
                    $status1="Done.Login now.";
                    unset($_POST);
              
                }
            }
            else{
            $status1="password must same";
            unset($_POST);
            }

    }
    if(isset($_POST['passwordl'])){
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
        if($row["username"]==$_POST["username"]){
            if($row["password"]==$_POST["passwordl"]){
                $_SESSION["username"] =$_POST["username"];
                $_SESSION["password"] =$_POST["passwordl"];
                $_SESSION["name"]=$row["name"];
                $_SESSION["role"]=$row["role"];

                

                if($row["role"]=="manager"){

                    header("Location:manager.php");
                }
                else{
                    header("Location:index.php");
                }
           
            }
        }
        
    }
    $status2="Worng Passwor or Username";

}
}

?>
<html>
    <head>        <link rel="stylesheet" type="text/css" href="css/login.css"></head>
    <body>
        <div class="home"><a href="index.php"><img style="Width:50px;height:50px;" src="images/home.png"></a></div>
        <div style="height:70px;"></div>
        <div class="form">
            <div class="loging">
            <br><br>
                <form method="post" action="login.php">
				<h1 style="color:white">Login</h1>
				  
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="passwordl" placeholder="Password" required>
                    <input type="submit" Value="Login">
                </form>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    echo $status2;
                    }   
                ?>
            </div>
            <div class="register">
				<br>
                
                <form method="post" action="login.php" >
				<h1 style="color:white">Registration</h1>
				<br><br>
                  <input type="text" name="username" placeholder="Username" required><br>
                   <input type="text" name="name" placeholder="Name" required><br>
                   <input type="password" name="password" placeholder="Password" required><br>
                    <input type="password" name="repassword" placeholder="RE-Password" required><br>
                    <input type="submit" value="Sign Up" style>
                </form>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    echo $status1;
                    }   
                ?>
            </div>
        </div>
    </body>
</html>