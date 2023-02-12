<?php

$email=$_POST['email'];
$psd=$_POST['password'];


$db_hostname="127.0.0.1:3308";
$db_username="root";
$db_password="python trial";
$db_name="pglife";

$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$conn){
    echo 'connection failed'.mysqli_connect_error();
}

$sql="select * from users";

$result = mysqli_query($conn,$sql);
if(!$result){
    echo "error:".mysqli_error($conn);
    exit;
}


while($row=mysqli_fetch_assoc($result)){
    if($row["email"]==$email){
        $abc=1;
        if($row["psd"]==$psd){
            echo "login successfully";
    $_SESSION['user_id']=$row['id'];
    $_SESSION['email']=$row['email'];
            
    // setcookie("user_id",$row['ID'],time()+3600);
    // setcookie('name',$row['Name'],time()+3600);
        }
        else{
            echo "wrong password";
        }
    break;
    }
    else{
        $abc=0;
    }
}

if($abc==0){
    echo "please register first";
}

?>
<a href="index.php"> </br>home page</a>