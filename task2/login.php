<?php 


$host = "localhost";
$dataname="login";
$user = "root";
$password = "kimfar0730";
$dataport = "3307";

$conn=new mysqli($host,$user,$password,$dataname,$dataport);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password'];

    $qry=$conn->prepare("SELECT * FROM users WHERE username=?");
    $qry->bind_param("s",$username);
    $qry->execute();
    $result=$qry->get_result();
    if($result->num_rows>0){
        echo $result->num_rows;
        echo "Email already exists!";
        exit();
    }

    // if ($password === $confirm_password) {
    //     $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //     // $hashed_password=md5($password);
    //     $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    //     $stmt->bind_param("ss", $username, $hashed_password);
    //     $stmt->execute();
    //     $stmt->close();
    //     echo "login successful!";
    // } else {
    //     echo "Passwords do not match!";
    // }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

   

<style>
    body{
    
        background-color: #0756f6;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
     .login-container{
        background-color: #09090900;
        padding: 40px;
        border-radius: 5px;
        border: 4px solid #0c0c0c;
        width: 350px;
        color: white;
     }   
     h1{
        font-size: 48px;
        margin-top: 0;
        margin-bottom: 20px;
        font-weight: bold;
     }
     .input-group{
        margin-bottom: 20px;
     }
     label{
        display: block;
        font-size: 18px;
        margin-bottom: 5px;
     }

     input[type="email"],
     input[type="password"]{
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }
     button {
            background-color: #0ef630;
            color: white;
            border: 1px solid #0f0e0e;
            padding: 5px 15px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 15px;
        }

        button:hover {
            background-color: #181717;
        }
</style>
</head>

<body>

<div class="box">
    
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">click me to register</a></p>
</div>
</body>
</html>
