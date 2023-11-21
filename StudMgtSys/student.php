<?php include 'inc/checklogged.php';?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>STUDENT DATA</title>
        <link rel="stylesheet" href="css/student.css">
        <script src="js/annoy.js"></script>
        <link rel="stylesheet" href="fontawesome/fontawesome-free-6.4.0-web/css/fontawesome.css">
        <link rel="stylesheet" href="fontawesome/fontawesome-free-6.4.0-web/css/solid.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Listen for course selection change event
                $("#course, #status").change(function() {
                    var selectedCourse = $(this).val();
                    var selectedstatus = $(this).val();
                    fetchFilteredRecords(selectedCourse, selectedstatus);
                });

                // Function to fetch filtered records using AJAX
                function fetchFilteredRecords(course, status) {
                    $.ajax({
                        url: "handler/student++.php",
                        type: "POST",
                        data: { course: course, status: status },
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
                        url: "handler/student++.php",
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
        <!-- include nav bar code -->
        <?php include 'inc/navbar.php'; ?>
        <!-- course filter form -->
        <div class="filter_form"><br>
            <div class="course">
                <label for="course">Filter by Course:</label>
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
            <!-- status filter form -->
            <div class="status">
                <label for="status">Filter by Status:</label>
                <select name="status" id="status">
                    <option value="">All</option>
                    <option value="Ongoing">Ongoing</option>
                    <option value="Completed">Completed</option>
                </select><br><br>
            </div>
            <div class="search">
                <form id="search-form">
                    <label for="searh-bar">Search : </label>
                    <input type="search" name="search" id="search-item" placeholder="Search Using Student ID" >
                    <input type="submit" value="GO " name="go" id="search" class="submit">
                </form>
            </div>
        </div>
        
        <div id="recordTable">
        <?php
        //Establish database connection
        include 'inc/database_conn.php';

        // Update the table using the edit button
        if(isset($_POST['update'])){
            $edit = $_POST['edit'];
            // get the input details
            include 'inc\student_detail_input.php';
            // query to update the row
            $sql1 ="UPDATE student SET student_id = '$st_id', firstname='$fname', lastname='$lname', tel_no='$tel', course='$course', date_enrolled='$d_enr_f', due_date='$d_date_f', amount='$amount', duration='$duration', statu='$status' WHERE student_id = '$edit'";
            if($conn->query($sql1)){
                echo "New Record created successfully";
            }
            else{
                echo "Error".$sql1.'<br>'.$conn->error;
            }
        }

        // Insert new values into the table
        if(isset($_POST['submit'])){
            // get the input details
            include 'inc\student_detail_input.php';
            //query to insert values
            $sql = "insert into student values ('$st_id','$fname','$lname','$tel','$course','$amount','$duration','$d_enr_f','$d_date_f','$status')";
            if($conn->query($sql)){
                echo "New Record created successfully";
            }
            else{
                echo "Error".$sql.'<br>'.$conn->error;
            }
        }

        ?>
        <div class = "table">
            <?php
            if (isset($_POST['delete'])) {
                $id = $_POST['delete'];
            
                // Execute the delete query
                $query = "DELETE FROM `student` WHERE `student`.`student_id` = '$id'";
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
            <table>
                <tr>
                    <th>S/N</th>
                    <th>Student_Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Telephone</th>
                    <th>Course</th>
                    <th>Fee</th>
                    <th>Duration</th>
                    <th>Date Enrolled</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
                
                <?php
                
                $sql ="SELECT student_id, firstname, lastname, tel_no, course, amount, duration, date_enrolled , due_date , statu FROM student";
                
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
                    <td><?php echo $row["amount"] ; ?></td>
                    <td><?php echo $row["duration"] ; ?></td>
                    <td><?php echo $row["date_enrolled"] ; ?></td>
                    <td><?php echo $row["due_date"] ; ?></td>
                    <td><?php echo $row["statu"] ; ?></td>
                    <td>
                    <form method="post" onsubmit="return confirm('Are you sure you want to delete the row with student Id <?php echo $row['student_id']; ?> ?');">
                        <input type="hidden" name="delete" value="<?php echo $row['student_id']; ?>">
                        <button type="submit">DELETE</button>
                    </form>
                    </td>
                    <td>
                    <form method="post" action="buttons.php" onsubmit="return confirm('Do you want to edit the values in this row with student Id <?php echo $row['student_id']; ?> ?');">
                        <input type="hidden" name="edit" value="<?php echo $row['student_id']; ?>">
                        <button type="submit">EDIT</button>
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
    </body>
</html>
