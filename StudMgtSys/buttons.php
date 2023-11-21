<?php include 'inc/checklogged.php';?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/home.css">
        <script src = "js/annoy.js"></script>
        <link rel="stylesheet" href="fontawesome/fontawesome-free-6.4.0-web/css/fontawesome.css">
        <link rel="stylesheet" href="fontawesome/fontawesome-free-6.4.0-web/css/solid.css">
    </head>
    <body>
        <div id="menu">
            <form action="buttons.php" method="post">
                <br><input type="submit" value="Enter New Enquiry Information" name="enq" ><br>
                <br><input type="submit" value="Enter New Student Record" name="stu" ><br>
                <br><input type="submit" value="Enter New Payment Record" name="pay" ><br>
            </form>
        </div>
        <div class="main">
            <div class="nav">
                <div class="top">
                    <div id="menubtn"><i class="fa-solid fa-bars fa-2xl" style="margin-top:9px"></i></div>
                    <div class="logout"><a href="logout.php">LOGOUT</a></div>
                </div>
                <div class="nav2">
                    <a href="home.php">HOME</a>
                    <a href="enquiry.php">ENQUIRY</a>
                    <a href="student.php">STUDENT</a>
                    <a href="payment.php">PAYMENT RECORD</a>
                </div>
            </div>
        </div>

        <div class="button">
            <?php  
            include 'inc/database_conn.php';

            if(isset($_POST['edit'])){
                $student_id = $_POST['edit'];
                $sql ="SELECT * FROM student WHERE student_id = '$student_id'";
                $data = $conn->query($sql);
                if ($data){
                    if ($data -> num_rows > 0){
                        
                        while($row = $data->fetch_assoc()){
            ?>

            <div>
                <fieldset class="field">
                    <legend>STUDENT RECORD</legend>
                    <form action="student.php" method="post" class="form">
                        <label for="">FIRSTNAME : </label>
                        <input type="text" name="fname" value="<?php echo $row["firstname"] ; ?>" class="input" required><br><br>
                        <label for="">LASTNAME : </label>
                        <input type="text" name="lname" value="<?php echo $row["lastname"] ; ?>" class="input" required><br><br>
                        <label for="">PHONE NO :</label>
                        <input type="tel" name="tel" value="<?php echo $row["tel_no"] ; ?>" class="input" required><br><br>
                        <label for="">COURSE :</label>
                        <select name="course" id="option">
                                <option value="Data Science">Data Science</option>
                                <option value="Data Analysis">Data Analysis</option>
                                <option value="Software Development">Software Development</option>
                                <option value="Desktop Publishing">Desktop Publishing</option>
                                <option value="Graphics Design">Graphics Design</option>
                                <option value="Product Management">Product Management</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                        </select><br><br>
                        <label for="">DATE ENROLLED :</label>
                        <input type="date" name="d_enr" value="<?php echo $row["date_enrolled"] ; ?>" class="input" required><br><br>
                        <label for="">DUE DATE :</label>
                        <input type="date" name="d_date" value="<?php echo $row["due_date"] ; ?>" class="input" required><br><br>
                        <input type="hidden" name="edit" value="<?php echo $student_id ?>">
                        <input type="submit" name="update" value="EDIT" class="submit">
                    </form>
                </fieldset>

            </div>
            <?php
            }
                }
                    }
                        } elseif(isset($_POST['enq'])){?>
            <div>
                <fieldset class="field">
                    <legend>ENQUIRY INFO</legend>
                    <form action="enquiry.php" method="post" class="form">
                        <label for="">FIRSTNAME : </label>
                        <input type="text" name="fname"  class="input" required><br><br>
                        <label for="">LASTNAME : </label>
                        <input type="text" name="lname"  class="input" required><br><br>
                        <label for="">PHONE NO :</label>
                        <input type="tel" name="tel" class="input" required><br><br>
                        <input type="submit" name="submit" value="submit" class="submit">
                    </form>
                </fieldset>
            </div>
            <?php } elseif(isset($_POST['stu'])){ ?>
            <div>
                <fieldset class="field">
                    <legend>STUDENT RECORD</legend>
                    <form action="student.php" method="post" class="form">
                        <label for="">FIRSTNAME : </label>
                        <input type="text" name="fname"  class="input" required><br><br>
                        <label for="">LASTNAME : </label>
                        <input type="text" name="lname"  class="input" required><br><br>
                        <label for="">PHONE NO :</label>
                        <input type="tel" name="tel" class="input" required><br><br>
                        <label for="">COURSE :</label>
                        <select name="course" id="option">
                                <option value="Data Science">Data Science</option>
                                <option value="Data Analysis">Data Analysis</option>
                                <option value="Software Development">Software Development</option>
                                <option value="Desktop Publishing">Desktop Publishing</option>
                                <option value="Graphics Design">Graphics Design</option>
                                <option value="Product Management">Product Management</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                        </select><br><br>
                        <label for="">DATE ENROLLED :</label>
                        <input type="date" name="d_enr" class="input" required><br><br>
                        <label for="">DUE DATE :</label>
                        <input type="date" name="d_date" class="input" required><br><br>
                        <input type="submit" name="submit" value="submit" class="submit">
                    </form>
                </fieldset>
            </div>
        
            <?php }  else{?>
            <div >
                <fieldset class="field">
                    <legend>PAYMENT RECORD</legend>
                    <form action="payment.php" method="post" class="form">
                        <label for="">STUDENT ID : </label>
                        <input type="text" name="st_id"  class="input" required><br><br>
                        <label for="">COURSE : </label>
                        <select name="course" id="option">
                            <option value="Data Science">Data Science</option>
                            <option value="Data Analysis">Data Analysis</option>
                            <option value="Software Development">Software Development</option>
                            <option value="Desktop Publishing">Desktop Publishing</option>
                            <option value="Graphics Design">Graphics Design</option>
                            <option value="Product Management">Product Management</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                        </select><br><br>
                        <label for="">Telephone : </label>
                        <input type="tel" name="tel" class="input" required><br><br>
                        <label for="">AMOUNT : </label>
                        <input type="number" name="amount"  class="input" required><br><br>
                        <label for="">PAYMENT :</label>
                        <input type="number" name="pay" class="input" required><br><br>
                        <input type="submit" name="submit" value="submit" class="submit">
                    </form>
                </fieldset>
            </div>
            
            <?php } ?>
        </div>
    </body>
</html>