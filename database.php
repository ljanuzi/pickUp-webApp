
    <?php

	function db_connect(){
    $servername = "localhost";
    $username = "learta";
    $password = "123";
	$dbname = "cwtest1";
	
	$conn = mysqli_connect($servername, $username,$password,$dbname);
	 
	confirm_db_connect();
		return $conn;
	}

	function db_disconnect($connection){
		if(isset($connection)){
			mysqli_close($connection);
		}
	}


  function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
  }

	function confirm_db_connect(){
		if(mysqli_connect_errno()){
			$msql = "Database failed connection ";
			$msql.= mysqli_connect_error();
     		$msg .= " (" . mysqli_connect_errno() . ")";
     		exit($msg);

		}
	}

	function confirm_result_set($result_set){
		if(!$result_set){
			exit("Database query failed.");
		}

	}


?>