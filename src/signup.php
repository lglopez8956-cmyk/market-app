<?php
    //Stop1.Get database accesss
    require('../config/database.php');
    
    //step2.Get form-data
    $f_name = $_POST['fname']
    $l_name = $_POST['lname']
    $m_number = $_POST['mnumber']
    $id_number = $_POST['idnumber']
    $e_mail = $_POST['email']
    $P_wd = $_POST['passwd']
    
    //step3 -> CREATE QUERY TO INSERT INTO
    $query = "
           INSERT INTO USERS (
           firstname,
           lastname,
           mobile_number,
           ide_number,
           email,
           password
           
        ) VALUES (
        '$f_name',
        '$l_name', 
        '$m_number', 
        '$id_number',
        '$e_mail',
        '$p_wd'
        )
";
        //step4 execute query
        $res = pg_query($conn,$query);

        //step 5 validate result
        if($res) {
            echo"User has been created successfully !!! ";
             }else{ 
                echo "something wrong!"

        


        }