<?php
        //Connection between PHP and Database

        function connection(){
            $servername = "localhost";
            $username = "root";// default username for localhost
            $password = "root" ;// mac user--> 'root' password
            $database = "minimart_catalog";

            //connection string ~~ passes the 4 values to the database

            //create connection

            $conn = new mysqli($servername, $username, $password, $database);
            //$conn : it's an object
            // new mysqli() : it's a class

            //check connection
            if($conn->connect_error){
                die("Connection Failed: " .$conn->connect_error);
            }else{
                //echo "connected successfully";
                return $conn;
            }
        }

        //connection();


?>