<?php
// session_start();

function connectdb(){
	$mysql_server = "localhost";
	$mysql_user = "root";
	$mysql_password = "";
	$mysql_db = "newhotel";

	$connect = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db);

	if($connect->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
    // echo "Connected successfully";
	$connect->set_charset("utf8");

	return $connect;
}

// DATABASE INSERT DELETE UPDATE

function insert($table, $data){
	$connect = connectdb();
	$keys = implode(', ', array_keys($data));
	$values = implode("', '", $data);
	$sql = "INSERT INTO $table ($keys) VALUES ('$values')";
	$query = mysqli_query($connect, $sql);
	if ($query) {
		$last_id = $connect->insert_id;
        $_SESSION['reservation'] = $last_id;
        var_dump($last_id );
        var_dump($_SESSION['reservation']);
    	return true;
	} else {
	    return false;
	}
}

function update($table, $id, $data){
	$connect = connectdb();
	$values = "";
	$i = 0;
	foreach($data as $key => $value){
		if($i == 0){
			$values = "$key = '$value'";
		}else{
			$values .= ", $key = '$value'";
		}
		$i++;
	}
	$sql = "UPDATE $table SET $values WHERE id = '$id'";

	$query = mysqli_query($connect, $sql);

	if ($query) {
    	return true;
	} else {
	    return false;
	}
}

function delete($table, $id){
	$connect = connectdb();
	$sql = "DELETE FROM $table WHERE id = '$id'";
	return mysqli_query($connect, $sql);
}

function getdata($table, $id){
	$connect = connectdb();
	$sql= mysqli_query($connect, "SELECT * FROM $table WHERE id = '$id'") or die(mysql_error());
	$row= mysqli_fetch_assoc($sql);
	return $row;
}

?>