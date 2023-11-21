


<?php

// create connection
$conn = new mysqli('localhost', 'root', '', 'record');

//check connection
if($conn -> connect_error){
    die("connection failed".$conn->connect_error);
}
echo "";


// Filter by Course and Payment Status
$selectedorder = isset($_POST['date']) ? $_POST['date'] : '';


    echo '<table>';
    echo '<tr>';
    echo '<th>S/N</th>';
    echo '<th>Firstname</th>';
    echo '<th>Lastname</th>';
    echo '<th>Telephone</th>';
    echo '<th>Enquiry Date</th>';
    echo '<th></th>';
    echo '</tr>';
   

// Initial display of records
$sql = "SELECT firstname, lastname, tel_no, enq_date FROM enquiry";

if (!empty($selectedorder) ) {
    $sql .= " ORDER BY enq_date $selectedorder ";
}

$data = $conn->query($sql);

if ($data && $data->num_rows > 0) {
    
    $sn = 1;
    while ($row = $data->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.$sn.'</td>';
        echo '<td>'.$row["firstname"].'</td>';
        echo '<td>'.$row["lastname"].'</td>';
        echo '<td>'.$row["tel_no"].'</td>';
        echo '<td>'.$row["enq_date"].'</td>';
        
        echo '</tr>';
        $sn++;
    }
    
    echo '</table>';
} else {
    echo 'No records found.';
}

$conn->close();
?>
