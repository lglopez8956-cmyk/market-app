<?php
    //get database acces
    require('../config/database.php');

    //get form data
    $name = trim($_POST['name']);
    $abbrev = trim($_POST['abbrev']);
    $code = trim($_POST['code']);

    $query = "
        INSERT INTO countries (
            name, 
            abbrev, 
            code
        ) VALUES (
            '$name', '$abbrev', '$code'
        )
        ";
        //execute query
        $res = pg_query($conn_supa, $query);
        //validate result
        if($res){
            //echo "Users has been created sucessfully!!!";
             echo "<center><h3 style='color:green;'> Country registered success!!!</h3></center>";
        } else {
            echo "Something wrong!";
        }
?>