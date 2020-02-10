<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account is now Verified!</title>
</head>
<body>


    <?php
    require_once 'load.php';
    

    $message = 'not updated';

    if(isset($_GET['user_email']) && !empty($_GET['user_email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        $email = $pdo->prepare($_GET['email']); // Set email variable
        $hash = $pdo->prepare($_GET['hash']); // Set hash variable

        // Verifying data
        $verify_query = "SELECT Count(user_email, hash, verified) AS num FROM tbl_user WHERE user_email = :email AND hash = :hash AND verified = '0'";
        $verifying_user = $pdo->prepare($verify_query);
        $verifying_user->execute(
            array(
                ':email'=>$email,
                ':hash'=>$hash
            )
        );

        $num = $verifying_user->fetch(PDO::FETCH_ASSOC);
        if($num['num'] > 0){
            //updating columns
            $update_user_query = "UPDATE tbl_user SET verified = '1' WHERE user_email = :email AND hash = :hash AND verified = '0' ";
            $update_user = $pdo->prepare($update_user_query);
            $update_user->execute(
                array(
                    ':email'=>$email,
                    ':hash'=>$hash
                )
            );

            $message = 'Your account has been verified!';
        }else{
            $message = 'Account has already been activated, happy exploring!';
        }

    }else{
        // Invalid approach
        $message = $email.$hash;
    }

    echo $message;

    ?>
</body>
</html>


