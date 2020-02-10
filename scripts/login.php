<?php 

function login( $email, $password, $date){
    //Debug
    // $message = sprintf('You are trying to login with username %s and password %s', $username, $password);

    $pdo = Database::getInstance()->getConnection();
    $message_login = '';
    //timezone config
    date_default_timezone_set('America/Toronto');
    $date = date('Y/m/d H:i:s');

    // check user existance
    $check_exist_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_email= "'.$email.'"'; 
    $user_set = $pdo->prepare($check_exist_query);


    if($user_set->fetchColumn()>0){
        //user exist
        $get_user_query = 'SELECT * FROM tbl_user WHERE user_email = "'.$email.'"';
        $get_user_query .= ' AND user_password = "'.$password.'"';
        $user_check = $pdo->prepare($get_user_query);

    while($found_user = $user_check->fetch(PDO::FETCH_ASSOC)){
        $email = $found_user['user_email'];

        // login successful
        $message_login = 'Login Successful!';
        // updating database
        $update_query = 'UPDATE tbl_user SET sub_start = "'.$date.'" WHERE email is null;
                         UPDATE tbl_user SET last_updated = "'.$date.'" WHERE email = "'.$email.'"';
        $update_set = $pdo->prepare($update_query);
    }

    if(isset($id)){
        redirect_to('../index.php');
    }

    }else{
        //user doesn't exit
        $message_login = 'user doesnt exist';
    }

    return $message_login;
}