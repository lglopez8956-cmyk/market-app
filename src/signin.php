<?php
//get database acces
    require('../config/database.php');
    //start or create session
    session_start();

	if(isset($_SESSION('session_user_id'))){
		header ('refresh:0;url=main.php');
	}



//step1. get database connection
$e_mail = $_POST['email'];
$p_wd = $_POST['passwd'];

//Step 3. query to validate data
$sql_check_user = "
select 
    u.id
	u.firstname || '' || u.lastname as fullname,
 	u.email,
 	u.password
from 
	users u 
where	
	u.email = '$e_mail' and 
	u.password = '$p_wd'
limit 1	

";

//step 4. execute query
$res_check = pg_query($conn_supa, $sql_check_user);
$row = pg_frtch_assoc($res_check);
$_SESSION['session_user_id']= $row ['id'];
$_SESSION['session_user_fullname']= $row ['fullname'];

if(pg_num_rows($res_check)> 0){
   echo "<scrip>alert('Go to main page !!')</script>";
}else{
    echo "verify data";
}

  