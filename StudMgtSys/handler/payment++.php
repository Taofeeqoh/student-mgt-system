

<?php

// create connection
$conn = new mysqli('localhost', 'root', '', 'record');

//check connection
if($conn -> connect_error){
    die("connection failed".$conn->connect_error);
}
echo "";


// Filter by Course and search through
$selectedCourse = isset($_POST['course']) ? $_POST['course'] : '';
$search = isset($_POST['search']) ? $_POST['search'] : '';


    echo '<table>';
    echo '<tr>';
    echo '<th>S/N</th>';
    echo '<th>Student ID</th>';
    echo '<th>Course</th>';
    echo '<th>Amount</th>';
    echo '<th>Payment</th>';
    echo '<th>Telephone</th>';
    echo '<th>Date</th>';
    echo '<th> </th>';
    echo '</tr>';
   

// Initial display of records

$sql = "SELECT student_id, course, amount, payment, p_tel, p_date FROM payment";
if (!empty($selectedCourse) || !empty($search)) {
    $sql .= " WHERE course = '$selectedCourse' OR student_id = '$search'";
    
}


$data = $conn->query($sql);

if ($data && $data->num_rows > 0) {
    
    $sn = 1;
    while ($row = $data->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.$sn.'</td>';
        echo '<td>'.$row["student_id"].'</td>';
        echo '<td>'.$row["course"].'</td>';
        echo '<td>'.$row["amount"].'</td>';
        echo '<td>'.$row["payment"].'</td>';
        echo '<td>'.$row["p_tel"].'</td>';
        echo '<td>'.$row["p_date"].'</td>';
        echo '<td>
            <form method="post" onsubmit="return confirm(\'Are you sure you want to delete the row with student Id '.$row['student_id'].'?\')">
                <input type="hidden" name="delete" value="'.$sn.'">
                <button type="submit">Delete</button>
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
