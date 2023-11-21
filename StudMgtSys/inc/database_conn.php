<?php
 // create connection
 $conn = new mysqli('localhost', 'root', '', 'record');

 //check connection
 if($conn -> connect_error){
     die("connection failed".$conn->connect_error);
 }
 echo "";
