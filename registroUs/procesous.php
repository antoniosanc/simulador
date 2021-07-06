<?php

    include("../conexion.php");

    foreach($_POST as $rownumber_name => $val) {

//remember to clean post values
        $rownumber = $rownumber_name;
        $val = $val;

        //from the fieldname:rownumber_id we need to get rownumber_id
        $split_data = explode(':', $rownumber);
        $rownumber_id = $split_data[1];
        $rownumber_name = $split_data[0];

        $sql_1 = "UPDATE usuario SET $rownumber_name = '$val' WHERE id = $rownumber_id";
        if ($conexion->query($sql_1)) {
        $last_id = $conexion->insert_id;
        //echo $sql_1;
        echo "Editando registro espere: <img src='img/loader.gif' height='15px'>";
        } else {
        printf("Errormessage: %s\n", $conexion->error);
        }

        }


 ?>