<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

<?php

	 if( empty($_GET["shop"]) ) { 
	echo "<div>Please select some option!</div>"; 
	}
   else { 
	$shop=$_GET["shop"];
	}

	if (isset($_GET['terms'])) {

   // Checkbox is selected
 

	$servername = "localhost";
	$username = "root";
	$pass = "";
	$db = "skills";

// Create connection
$conn = new mysqli($servername, $username, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql =" CREATE TABLE shop (
			id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
			newyork INT(30) default 0,
			bershka INT(20) default 0,
			zara INT(30) default 0,
			hm INT(30) default 0,
			gate INT(30) default 0 
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Skills created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}

 if ($shop=="vNy") {
 	$string="update shop set newyork = newyork+1;";
 }
 else if ($shop=="vB") {
 	$string="update shop set bershka = bershka+1;";
 }
 else if ($shop=="vZ") {
 	$string="update shop set zara = zara+1;";
 }
 else if ($shop=="vHM") {
 	$string="update shop set hm = hm+1;";
 }
 else if ($shop=="vG") {
 	$string="update shop set gate = gate+1;";
 }

   if ($conn->query($string) === TRUE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
  $sql="select newyork, bershka, zara, hm, gate from shop;";
        $result = $conn->query($sql);

   if ($result->num_rows > 0) {
            
         
        

   while($row = $result->fetch_assoc()) {
                                    $res = $row["newyork"]+$row["bershka"]+$row["zara"]+$row["hm"]+$row["gate"];
                                    $new = number_format($row["newyork"]/$res, 3)*100;
                                    $ber = number_format($row["bershka"]/$res, 3)*100;
                                    $zar = number_format($row["zara"]/$res, 3)*100;
                                    $hmko = number_format($row["hm"]/$res, 3)*100;
                                    $gat = number_format($row["gate"]/$res, 3)*100;
                                    echo "<div style='border: ridge;'>
                                    <div>
                                    <span style='width:100%;'>New Yorker:</span>
                                    <div style='width:".$new."%;height:10px;background:tomato; display:block; border-radius:5px'></div> ".$new."%
                                    </div>
                                    <div>
                                    <span style='width:100%;'>Bershka:</span>
                                    <div style='width:".$ber."%;height:10px;background:dodgerblue; display:block; border-radius:5px'></div> ".$ber."%
                                    </div>
                                    <div>
                                    <span style='width:100%;'>Zara:</span>
                                    <div style='width:".$zar."%;height:10px;background:violet; display:block; border-radius:5px'></div> ".$zar."%
                                    </divzar                                    <div>
                                    <span style='width:100%;'>HM:</span>
                                    <div style='width:".$hmko."%;height:10px;background:orange; display:block; border-radius:5px'></div> ".$hmko."%
                                    </div>
                                    <div>
                                    <span style='width:100%;'>Gate:</span>
                                    <div style='width:".$gat."%;height:10px;background:green; display:block; border-radius:5px'></div> ".$gat."%
                                    </div>"
                                    ."</div>";
                                }
                                 } else {
                                 	echo "No results";
                                 }
                          }else{
                          	echo "<div>Please agree with the Terms and Conditions</div>";
                          }

?>

</body>
</html>