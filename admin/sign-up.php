<?php 
//incldue other files
include_once '../load.php';

if(isset($_POST['submit'])){
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $country = trim($_POST['country']);

    if(!empty($firstName) && !empty($lastName) && !empty($password) && !empty($email) && !empty($country)){
        //Log user in
        //$message = signUp($firstName, $lastName, $password, $email, $country, $date);
    }else{
        // $attempts++;
        $message = 'Please fill out the required field';
    }
}






?>



<!-- SIGN UP PAGE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>
<body>

    <div class="signUp">
        <h1>Sign Up</h1>
        <?php echo !empty($message_signUp)? $message_signUp: ''; ?>
        <form action="sign-up.php" method="post">
            <input type="text" name="first-name" id="first-name" value="" placeholder='first-name'>
            <input type="text" name="last-name" id="last-name" value="" placeholder='last-name'>

            <input type="user_email" name="user_email" id="user_email" value="" placeholder='email'>

            <input type="text" name="user_country" id="user_country" value="" placeholder='country'>

            <input type="password" name="user_password" id="user_password" value="" placeholder='password'>

            <button name="submit">Sign me up!</button>
        </form>
    </div>
    

    <div class="login">
        <h1>Login</h1>
        <form action="login.php" method="post">
        <?php echo !empty($message_login)? $message_login: ''; ?>
            <input type="text" name="email" id="email" value="" placeholder='email'>

            <input type="password" name="password" id="password" value="" placeholder='password'>

            <button name="submit">Login</button>
        </form>
    </div>
    
</body>
</html>