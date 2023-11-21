

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAYMENT DATA</title>
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
    $course = $_POST['course'];
    $amount = $_POST['amount'];
    $pay = $_POST['pay'];
    $bal = $_POST['bal'];
    $pay_stat = $_POST['pay_stat'];
    $st_id = $course;
$sql = "insert into payment values ('$st_id','$course','$amount','$pay','$bal','$pay_stat')";
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
                <th>Student ID</th>
                <th>Course</th>
                <th>amount</th>
                <th>Payment</th>
                <th>Balance</th>
                <th>Payment Status</th>
            </tr>
            <?php
            $sql = "select student_id, course, amount, payment, balance, p_status from payment";
            $data = $conn->query($sql);
            if ($data){
                if ($data -> num_rows > 0){
                    $sn = 1;
                    while($row = $data->fetch_assoc()){
            ?>     
            <tr>
                <td><?php echo $sn ; ?></td>
                <td><?php echo $row["student_id"] ; ?></td>
                <td><?php echo $row["course"] ; ?></td>
                <td><?php echo $row["amount"] ; ?></td>
                <td><?php echo $row["payment"] ; ?></td>
                <td><?php echo $row["balance"] ; ?></td>
                <td><?php echo $row["p_status"] ; ?></td>
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

