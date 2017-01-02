
<?php 
$name = $_POST["name"]; 
$usn = $_POST["usn"]; 
$sex = $_POST["sex"];
$age = $_POST["age"];  
$stream = $_POST["stream"];  
if($name == null || $usn == null)
	{
		die("Please enter the details");
	}
$servername = "localhost";
$username = "ninja";
$password = "root";

$conn = new mysqli($servername, $username, $password);
	
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

$sql = "CREATE TABLE Students (
name varchar, usn VARCHAR(30)PRIMARY KEY NOT NULL ,
gender varchar(6) NOT NULL,
age int,stream varchar(30))";
if ($conn->query($sql) === TRUE) {
    echo "Table Students created successfully";
} 
else
{
    echo "Error creating table: " . $conn->error;
}
$newsql = "INSERT INTO Students (name, usn, gender, age, stream)
VALUES ($name,$usn,$sex,$age,$stream)";
if($conn->query($newsql) === TRUE)
 {
    echo "New record created successfully";
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$selectsql = "SELECT * FROM Students";
$result = $conn->query($selectsql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        echo " Name: " . $row["name"]. " " . $row["usn"]." " . $row["gender"]. " " . $row["age"]." " . $row["stream"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>