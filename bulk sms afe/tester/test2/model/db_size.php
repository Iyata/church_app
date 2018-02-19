<?php

//connect to server
$server = new mysqli("localhost","root","", 'bulksms');
mysqli_connect("localhost","root","", 'bulksms'); 

 $namadb='bulksms'; //put db name here

 $sql="SELECT table_schema 'db_name', SUM( data_length + index_length) / 1024 / 1024 'db_size_in_mb' FROM information_schema.TABLES WHERE table_schema='$namadb' GROUP BY table_schema ;";
 $query=mysqli_query($server, $sql);
 $data=mysqli_fetch_array($query); 
 print $data['db_size_in_mb'];


 ?>