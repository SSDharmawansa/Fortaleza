<?php 
    session_start();
    $status1=null;
  $conn = new mysqli("sql103.ezyro.com","ezyro_28837284", "ssd123", "ezyro_28837284_db1");

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['repassword'])){
            
                $username=$_POST['username'];
                $name=$_POST['name'];
                $password=$_POST['password'];
                $role=$_POST['role'];
                if($_POST['repassword']==$password){
                    $sql3="select * from users";
                    $usersdata= $conn->query($sql3);
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
                        $result = $conn->query($sql4);
                        $status1="Done.Login now.";
                        unset($_POST);
                  
                    }
                }
                else{
                $status1="password must same";
                unset($_POST);
                }
    
        }
    }




?> 

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/manager.css"></head>
        <script src="js/manager.js"></script>
    </head>
    <body>
        <div class="sidepanel">
            <div style="height:200px;"></div>
                <a class="button" href="index.php">Home</a><br><br>
            <a class="button" href="javascript:button('reg');">Register</a><br><br>
            <a class="button" href="javascript:button('alljob');">All jobs</a>
      
        </div>
        <div class="content" id="reg" >
            <h1 style="color:red;">Register Users</h1>
            <form method="post" action="manager.php" >
                  <input type="text" name="username" placeholder="Username" required><br>
                   <input type="text" name="name" placeholder="Name" required><br>
                   <input type="password" name="password" placeholder="Password" required><br>
                    <input type="password" name="repassword" placeholder="RE-Password" required><br>
                    <select name="role">
                        <option value="Choose your Role"  disabled selected>Choose Your Role</option>
                        <option value="user" >Admin</option>
                        <option value="admin">Manager</option>
                        <option value="manager">Chef</option>
                    </select> <br>
                    <input type="submit" value="Sign Up Now">
            </form>
            <?php echo $status1;?>
        </div>
        <div class="content" id="alljob" >
            <div class="jbtable">
                <?php 
                    $sql3="select * from comments";
                    $result=$conn->query($sql3);
                    echo "Comments";
                    echo"<table>";
                    while($row=$result->fetch_assoc()) {
                        echo "<tr><td> ". $row["username"]. "</td><td>". $row["comment"] . "</td></tr>";
                     }
                    echo"</table>";
                ?>
            </div>
            <div class="jbtable">
                <?php 
                    $sql3="SELECT * FROM mealorders";
                    $result=$conn->query($sql3);
                    echo "Meal Orders";
                    echo"<table>";
                    while($row=$result->fetch_assoc()) {
                        echo "<tr><td> ". $row["username"]. "</td><td>". $row["mobileno"]. "</td><td>". $row["meal"]. "</td><td>". $row["drinks"]."</td><td>". $row["desert"]."</td><td>". $row["additional"] . "</td></tr>";
                     }
                    echo"</table>";
                ?>
            </div>
			<div class="jbtable">
                <?php 
                    $sql3="SELECT * FROM ordermealstoroom";
                    $result=$conn->query($sql3);
                    echo "Order Meals To Rooom";
                    echo"<table>";
                    while($row=$result->fetch_assoc()) {
                        echo "<tr><td> ". $row["name"]. "</td><td>". $row["username"]. "</td><td>". $row["roomno"]. "</td><td>". $row["mobileno"]."</td><td>". $row["meals"]."</td><td>". $row["drink"] . "</td></tr>". $row["drink"] . "</td></tr>". $row["desert"] . "</td></tr>". $row["additional"] . "</td></tr>";
                     }
                    echo"</table>";
                ?>
            </div>
			<div class="jbtable">
                <?php 
                    $sql3="SELECT * FROM users";
                    $result=$conn->query($sql3);
                    echo "All Users Table";
                    echo"<table>";
                    while($row=$result->fetch_assoc()) {
                        echo "<tr><td> ". $row["username"]. "</td><td>". $row["password"]. "</td><td>". $row["name"]. "</td><td>". $row["role"]."</td></tr>";
                     }
                    echo"</table>";
                ?>
            </div>
      
            <div class="jbtable">
                <?php 
                    $sql3="SELECT * FROM hallboking";
                    $result=$conn->query($sql3);
                    echo "Hall Booking Requests";
                    echo"<table>";
                    while($row=$result->fetch_assoc()) {
                        echo "<tr><td> ". $row["username"]. "</td><td>". $row["mno"]. "</td><td>". $row["hallid"]. "</td><td>". $row["additional"] . "</td></tr>";
                     }
                    echo"</table>";	
                ?>
            </div>
        </div>
        <div class="content" id="unjob" >
        <div class="jbtable">
                <?php 
                    $sql3="SELECT * FROM hallboking WHERE seen=0 ";
                    $result=$conn->query($sql3);
                    echo "Hall Booking Requests";
                    echo"<table>";
                    while($row=$result->fetch_assoc()) {
                        echo "<tr><td> ". $row["username"]. "</td><td>". $row["mno"]. "</td><td>". $row["hallid"]. "</td><td>". $row["additional"] . "</td></tr>";
                     }
                    echo"</table>";	
                ?>
            </div>
        </div>
    </body>
</html>