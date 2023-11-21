

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DATA</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="nav">
        <a href="home.html">HOME</a>
        <a href="enquiry.php">ENQUIRY</a>
        <a href="student.php">STUDENT</a>
        <a href="payment.php">PAYMENT RECORD</a>
    </div>
    <div>
        <p>FILTER</p> 
        <form action="student.php">
        <select name="fil_course" id="option">
            <option value="">All</option>
            <option value="">Data Science</option>
            <option value="">Data Analysis</option>
            <option value="">Software Development</option>
            <option value="">Desktop Publishing</option>
            <option value="">Graphics Design</option>
            <option value="">Product Management</option>
            <option value="">Digital Marketing</option>
        </select><br><br><br><br>
        <select name="fil_status" id="option">
            <option value="">Ongoing</option>
            <option value="">Completed</option>
            <option value="">All</option>
        </select><br><br><br><br>  
        </form>
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

$filt_course = $filt_course
$fsql = 'select * from stu'

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $st_id = $fname;
    $tel = $_POST['tel'];
    $course = $_POST['course'];
    $duration = $_POST['duration'];
    $d_enr = $_POST['d_enr'];
    $d_date = $_POST['d_date'];
    $status = 'Completed';

$sql = "insert into student values ('$st_id','$fname','$lname','$tel','$course','$duration','$d_enr','$d_date','$status')";
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
                <th>Student_Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Telephone</th>
                <th>Course</th>
                <th>Duration</th>
                <th>Date Enrolled</th>
                <th>Due Date</th>
                <th>Status</th>
            </tr>
            <?php
            $sql = "select student_id, firstname, lastname, tel_no, course, duration, date_enrolled, due_date, statu from student";
            $data = $conn->query($sql);
            if ($data){
                if ($data -> num_rows > 0){
                    $sn = 1;
                    while($row = $data->fetch_assoc()){
            ?>     
            <tr>
                <td><?php echo $sn ; ?></td>
                <td><?php echo $row["student_id"] ; ?></td>
                <td><?php echo $row["firstname"] ; ?></td>
                <td><?php echo $row["lastname"] ; ?></td>
                <td><?php echo $row["tel_no"] ; ?></td>
                <td><?php echo $row["course"] ; ?></td>
                <td><?php echo $row["duration"] ; ?></td>
                <td><?php echo $row["date_enrolled"] ; ?></td>
                <td><?php echo $row["due_date"] ; ?></td>
                <td><?php echo $row["statu"] ; ?></td>
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

