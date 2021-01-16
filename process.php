<?php

		$username="root";
		$server="localhost";
		$dbname="ecommerce";
		$pass="";

					$connect = mysqli_connect($server,$username,$pass,$dbname);
					mysqli_set_charset($connect,'utf8');
?>