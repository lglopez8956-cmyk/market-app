<?php
    //get database acces
    require('../config/database.php');
    //get form data
    $f_name = trim ($_POST['fname']);
    $l_name = trim ($_POST['lname']);
    $m_number = trim ($_POST['mnumber']);
    $ide_number = trim ($_POST['idenumber']);
    $e_mail = trim ($_POST['email']);
    $p_wd = trim ($_POST['passwd']);

    //$ec_pass = password_hash($p_wd, PASSWORD_BCRYPT);
    $ec_pass = md5($p_wd);
    
    $check_email="
    SELECT
       u.email
    FROM
       users u
    WHERE
       email = '$e_mail' or 
       ide_number = '$ide_number'
    LIMIT 1
    ";


$res_check =pg_query($conn_supa, $check_email);
    if(pg_num_rows($res_check) >0){
        echo "<script>alert('sucess !!! go to login')</script>";+
        header('refresh:0;url=signup.html');
    }else{  
    
    }
    //create query to insert into
    $query = "
    INSERT INTO users (
        firstname,
        lastname,
        mobile_number, 
        ide_number,
        email,
        password

    ) VALUES (
        '$f_name', '$l_name', '$m_number', '$ide_number', '$e_mail', '$ec_pass'
    )
    ";
    //execute query
    $res = pg_query($conn_supa, $query);
    //validate result
    if($res){
        //echo "Users has been created sucessfully!!!";
        echo "<script>alert('sucess !!! go to login')</script>";
        header('refresh:0;url=signin.html');
    } else {
        echo "Something wrong!";
    }
?>

