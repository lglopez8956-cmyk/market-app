<?php
//get database acces
    require('../config/database.php');
//step1. get database connection
$e_mail = $_POST['email'];
$p_wd = $_POST['passwd'];

//Step 3. query to validate data
$sql_check_user = "
select 
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

if(pg_num_rows($res_check)> 0){
   echo "<scrip>alert('Go to main page !!')</script>";
}else{
    echo "verify data";
}

  