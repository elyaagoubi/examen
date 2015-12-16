<?php
include_once 'connect.php';

switch ($_GET["table"]) {
	
	case "colis":
		readColis($_GET);
		break;

	
	case "personne":
		readPersonne($_GET);
		break;
		
		
	case "document":
		readDocument($_GET);
		break;		
	default:
		;
	break;
}


function readColis($data){
	global $conn;
	
	$sql = "SELECT * FROM colis where id_personne=".$data["id_personne"];
	//echo $sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo json_encode($row);
			return;
		}
		
	} else {
		return http_response_code(500);
	}	
	
}




function readPersonne($data){
	global $conn;
	
	$sql = "SELECT * FROM personne";
	$result = $conn->query($sql);
	//echo $sql;
	$lists= array();
	if ($result->num_rows > 0) {
    // output data of each row
		
	    while($row = $result->fetch_assoc()) {
	          $lists[] = $row;
	    }
	    echo json_encode($lists);
	} else {
    	echo "0 results";
	}	
}




$conn->close();
