
<?php
// create connection
$conn = new mysqli('localhost', 'root', '', 'record');

//check connection
if($conn -> connect_error){
    die("connection failed".$conn->connect_error);
}
echo "";

// Filter by Course and status
$selectedCourse = isset($_POST['course']) ? $_POST['course'] : '';
$selectedstatus = isset($_POST['status']) ? $_POST['status'] : '';
$search = isset($_POST['search']) ? $_POST['search'] : '';

    echo '<table>';
    echo '<tr>';
    echo '<th>S/N</th>';
    echo '<th>Student_Id</th>';
    echo '<th>Firstname</th>';
    echo '<th>Lastname</th>';
    echo '<th>Telephone</th>';
    echo '<th>Course</th>';
    echo '<th>Fee</th>';
    echo '<th>Duration</th>';
    echo '<th>Date Enrolled</th>';
    echo '<th>Due Date</th>';
    echo '<th>Status</th>';
    echo '<th></th>';
    echo '<th></th>';
    echo '</tr>';



$sql = "SELECT student_id, firstname, lastname, tel_no, course, amount, duration, date_enrolled, due_date, statu FROM student";

if (!empty($selectedCourse) || !empty($selectedstatus) || !empty($search)) {
    $sql .= " WHERE ";
    $conditions = [];
    if (!empty($selectedCourse)) {
        $conditions[] = "course = '$selectedCourse'";
    }
    if (!empty($selectedstatus)) {
        $conditions[] = "statu = '$selectedstatus'";
    }
    if (!empty($search)) {
        $conditions[] = "student_id = '$search'";
    }
    $sql .= implode(" OR ", $conditions);
}

$data = $conn->query($sql);

if ($data && $data->num_rows > 0) {
    
    $sn = 1;
    while ($row = $data->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.$sn.'</td>';
        echo '<td>'.$row["student_id"].'</td>';
        echo '<td>'.$row["firstname"].'</td>';
        echo '<td>'.$row["lastname"].'</td>';
        echo '<td>'.$row["tel_no"].'</td>';
        echo '<td>'.$row["course"].'</td>';
        echo '<td>'.$row["amount"].'</td>';
        echo '<td>'.$row["duration"].'</td>';
        echo '<td>'.$row["date_enrolled"].'</td>';
        echo '<td>'.$row["due_date"].'</td>';
        echo '<td>'.$row["statu"].'</td>';
        echo '<td>
            <form method="post" onsubmit="return confirm(\'Are you sure you want to delete the row with student Id '.$row['student_id'].'?\')">
                <input type="hidden" name="delete" value="'.$row['student_id'].'">
                <button type="submit">Delete</button>
            </form>
        </td>';
        echo '<td>
            <form method="post" action="buttons.php" onsubmit="return confirm(\'Do you want to edit the values in this row with student Id '.$row['student_id'].'?\')">
                <input type="hidden" name="edit" value="'.$row['student_id'].'">
                <button type="submit">EDIT</button>
            </form>
        </td>';
        echo '</tr>';
        $sn++;
    }

    echo '</table>';
} else {
    echo 'No records found.';
}

$conn->close();
?>
