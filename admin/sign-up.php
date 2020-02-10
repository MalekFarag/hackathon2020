<?php 
//incldue other files
require_once '../load.php';


if(isset($_POST['signUp'])){
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $password = trim($_POST['user_password']);
    $email = trim($_POST['user_email']);
    $country = trim($_POST['user_country']);
    $date = date('Y-m-d H:i:s');

    if(!empty($firstName) && !empty($lastName) && !empty($password) && !empty($email) && !empty($country)){
        //Log user in
        $message_signUp = signUp($firstName, $lastName, $password, $email, $country, $date);
    }else{
        $message_signUp = 'Please fill out the required field';
    }
}

if(isset($_POST['login'])){
    $password = trim($_POST['user_password']);
    $email = trim($_POST['user_email']);

    if(!empty($password) && !empty($email)){
        //Log user in
        $message_login = login($email, $password);
    }else{
        $message_login = 'Please fill out the required field';
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
            <input type="text" name="first_name" id="first_name" value="" placeholder='first-name'>
            <input type="text" name="last_name" id="last_name" value="" placeholder='last-name'>

            <input type="email" name="user_email" id="user_email" value="" placeholder='email'>

            <input type="text" name="user_country" id="user_country" value="" placeholder='country'>

            <input type="password" name="user_password" id="user_password" value="" placeholder='password'>

            <button name="signUp">Sign me up!</button>
        </form>
    </div>
    

    <div class="login">
        <h1>Login</h1>
        <?php echo !empty($message_login)? $message_login: ''; ?>
        <form action="sign-up.php" method="post">
            <input type="text" name="user_email" id="user_email" value="" placeholder='email'>

            <input type="password" name="user_password" id="user_password" value="" placeholder='password'>

            <button name="login">Login</button>
        </form>
    </div>
    
</body>
</html>