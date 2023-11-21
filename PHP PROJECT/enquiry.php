

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENQUIRY DATA</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="nav">
        <a href="home.html">HOME</a>
        <a href="enquiry.php">ENQUIRY</a>
        <a href="student.php">STUDENT</a>
        <a href="payment.php">PAYMENT RECORD</a>
    </div>
    <?php
$localhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'record';

// create connection
$conn = new mysqli($localhost, $username, $password, $dbname);

//check connection
if($conn -> connect_error){
    die("connection failed".$conn->connect_error);
}
echo "connected successfully";

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tel = $_POST['tel'];
$sql = "insert into enquiry values ('$fname','$lname','$tel')";
if($conn->query($sql)){
    echo "New Record created successfully";
}
else{
    echo "Error".$sql.'<br>'.$conn->error;
}
}
            
?>
    <div>
        <table>
            <tr>
                <th>S/N</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Telephone</th>
            </tr>
            <?php
            $sql = "select firstname, lastname, tel_no from enquiry";
            $data = $conn->query($sql);
            if ($data){
                if ($data -> num_rows > 0){
                    $sn = 1;
                    while($row = $data->fetch_assoc()){
            ?>     
            <tr>
                <td><?php echo $sn ; ?></td>
                <td><?php echo $row["firstname"] ; ?></td>
                <td><?php echo $row["lastname"] ; ?></td>
                <td><?php echo $row["tel_no"] ; ?></td>
            </tr>
            <?php
            $sn++;
                    }
                }
            }
            ?>
        </table>
    </div>
</body>
</html>

