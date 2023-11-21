<?php include 'inc/checklogged.php';?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PAYMENT DATA</title>
        <link rel="stylesheet" href="css/payment.css">
        <script src="js/annoy.js"></script>
        <link rel="stylesheet" href="fontawesome/fontawesome-free-6.4.0-web/css/fontawesome.css">
        <link rel="stylesheet" href="fontawesome/fontawesome-free-6.4.0-web/css/solid.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Listen for course selection change event
                $("#course").change(function() {
                    var selectedCourse = $(this).val();
                    fetchFilteredRecords(selectedCourse);
                });

                // Function to fetch filtered records using AJAX
                function fetchFilteredRecords(course) {
                    $.ajax({
                        url: "handler/payment++.php",
                        type: "POST",
                        data: { course: course },
                        success: function(response) {
                            $("#recordTable").html(response);
                        },
                        error: function(xhr, status, error) {
                            console.log("AJAX request error:", error);
                        }
                    });
                }

                $("#search-form").submit(function(e) {
                    e.preventDefault(); // Prevent form submission
                    var search = $("#search-item").val(); // Get the search value

                    $.ajax({
                        url: "handler/payment++.php",
                        type: "POST",
                        data: { search: search },
                        success: function(response) {
                            $("#recordTable").html(response); // Display the response in the searchResult div
                        },
                        error: function(xhr, status, error) {
                            console.log("AJAX request error:", error);
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <?php include 'inc/navbar.php'; ?>
        <div class="filter_form"><br>
            <div class="course">
                <label for="course">Filter by Course : </label>
                <select name="course" id="course">
                    <option value="">All Courses</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Data Analysis">Data Analysis</option>
                    <option value="Software Development">Software Development</option>
                    <option value="Desktop Publishing">Desktop Publishing</option>
                    <option value="Graphics Design">Graphics Design</option>
                    <option value="Product Management">Product Management</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                </select>
            </div>
            <div class="search">
                <form action="" method="post" id="search-form">
                    <label for="search-bar">Search : </label>
                    <input type="search" name="search" id="search-item" placeholder="Search Using Student ID" >
                    <input type="submit" value="GO " name="go" class="submit" id="search">
                </form>
            </div>
            
        </div>
    
        <div id="recordTable">
            <?php
            //Establish database connection
            include 'inc/database_conn.php';
            
            if(isset($_POST['submit'])){
                $course = $_POST['course'];
                $pay = $_POST['pay'];
                $st_id = str_replace(" ","",$_POST['st_id']);
                $amount = $_POST['amount'];
                $phone = $_POST['tel'];
                $tel = str_replace(" ","",$phone);
                $dat = new DateTime();
                $date = $dat->format("Y-m-d");
                $sql = "insert into payment values ('$st_id','$course','$amount','$pay','$tel','$date')";
            
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
                        <th>Student ID</th>
                        <th>Course</th>
                        <th>Amount</th>
                        <th>Payment</th>
                        <th>Telephone</th>
                        <th>Date</th>
                        <th> </th>
                    </tr>
                    <?php
                    if (isset($_POST['delete'])) {
                        $id = $_POST['delete'];
                    
                        // Execute the delete query
                        $query = "DELETE FROM `payment` WHERE `payment`.`student_id` = '$id'";
                        $result = mysqli_query($conn, $query);

                    
                        if ($result) {
                            echo "Row deleted successfully.";
                        } else {
                            echo "Error deleting row.";
                        }
                    }
                    $sql = "SELECT * FROM student";
                    $result = $conn->query($sql);
                    ?>
                    <?php
                    
                    $sql = "SELECT student_id, course, amount, payment, p_tel, p_date FROM payment";
                    
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
                        <td><?php echo $row["p_tel"] ; ?></td>
                        <td><?php echo $row["p_date"] ; ?></td>
                        <td>
                    <form method="post" onsubmit="return confirm('Are you sure you want to delete the row with student Id <?php echo $row['student_id']; ?> ?');">
                        <input type="hidden" name="delete" value="<?php echo $row['student_id']; ?>">
                        <button type="submit">DELETE</button>
                    </form>
                    </td>
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
