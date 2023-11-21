<?php include 'inc/checklogged.php';?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ENQUIRY DATA</title>
        <link rel="stylesheet" href="css/enquiry.css">
        <script src="js/annoy.js"></script>
        <link rel="stylesheet" href="fontawesome/fontawesome-free-6.4.0-web/css/fontawesome.css">
        <link rel="stylesheet" href="fontawesome/fontawesome-free-6.4.0-web/css/solid.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Listen for course selection change event
                $("#date").change(function() {
                    var selectedorder = $(this).val();
                    fetchFilteredRecords(selectedorder);
                });

                // Function to fetch filtered records using AJAX
                function fetchFilteredRecords(date) {
                    $.ajax({
                        url: "handler/enquiry++.php",
                        type: "POST",
                        data: { date:date},
                        success: function(response) {
                            $("#recordTable").html(response);
                        },
                        error: function(xhr, status, error) {
                            console.log("AJAX request error:", error);
                        }
                    });
                }
            });
        </script>
    </head>
    <body>
        <?php include 'inc/navbar.php'; ?>

        <div class="date">
            <label for="date">Sort by date modified:</label>
            <select name="date" id="date">
                <option value="ASC">Ascending</option>
                <option value="DESC">Descending</option>
            </select><br><br>
        </div>
        <div id="recordTable">
            <?php
            include 'inc/database_conn.php';

            if(isset($_POST['submit'])){
                $fname = trim(ucfirst($_POST['fname']));
                $lname = trim(ucfirst($_POST['lname']));
                $phone = $_POST['tel'];
                $tel = str_replace(" ","",$phone);
                $dat = new DateTime();
                $date = $dat->format("Y-m-d");
            $sql = "insert into enquiry values ('$fname','$lname','$tel', '$date')";
            if($conn->query($sql)){
                echo "New Record created successfully";
            }
            else{
                echo "Error".$sql.'<br>'.$conn->error;
            }
            }
                        
            ?>
            <div class = "table">
                <table>
                    <tr>
                        <th>S/N</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Telephone</th>
                        <th>Enquiry Date</th>
                        <th></th>
                    </tr>
                    <?php
                    $sql = "SELECT firstname, lastname, tel_no, enq_date FROM enquiry";
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
                        <td><?php echo $row["enq_date"] ; ?></td>
                    </tr>
                    <?php
                    $sn++;
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

