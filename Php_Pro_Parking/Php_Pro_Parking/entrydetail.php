<html>

<head>
    <style>
        body {
            background-image: url("parking3.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>


    <body>
        <h1 STYLE="COLOR:black;TEXT-ALIGN:CENTER;">DATABASE <br>AND<br> EMAIL STATUS</H1>


        <?php

$vname=$_REQUEST['vname'];
$name=$_REQUEST['name'];
$num=$_REQUEST['num'];
$email=$_REQUEST['email'];
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'parking';

$rand=rand(00000000,99999999);


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());}
$sql = "CREATE TABLE MyGuests1 (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
phoneno integer NOT NULL,
vname VARCHAR(50),email varchar(50) not null,Otp varchar(50),vehicle_no varchar(50)

)";
if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully<br>";
}/* else {
    echo "table already exist<br><br>";
}*/


	$sql1 = "INSERT INTO MyGuests1 (name, phoneno, vname,email,OTP,vehicle_no)
VALUES ('$name', '$num', '$vname','$email','$rand')";

if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully<BR><BR>";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
mysqli_close($conn);
header("refresh:40;url=entryexit.html");
$to = "$email";
$subject = "My subject";
$txt = "name:".$name."\n"."phoneno:".$num."\n"."visitor_name:".$vname."\n"."your otp is:".$rand;
$headers = "From:michigan.8900@gmail.com" . "\r\n" ;
//"CC: michigan.8900@gmail.com";

if (mail($to,$subject,$txt,$headers))
echo "mail sent";
else
	echo "mail not sent";
?>

    </BODY>

</HTML>
