<?php include 'inc/checklogged.php';?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME PAGE</title>
        <link rel="stylesheet" href="css/home.css">
        <script src="js/annoy.js"></script>
        <link rel="stylesheet" href="fontawesome/fontawesome-free-6.4.0-web/css/fontawesome.css">
        <link rel="stylesheet" href="fontawesome/fontawesome-free-6.4.0-web/css/solid.css">
    </head>
    <body>
        <?php include 'inc/navbar.php'; ?> 
        
        <?php include 'inc/database_conn.php'; ?>
        <div class="summary">
            <div class='stu_summary'>
                <P>SHOW STUDENT DETAILS</P>
                <form action="" method="post">
                    <label for="">ENTER STUDENT ID</label><br><br>
                    <input type="text" name="student_id" value="" class="input" required><br><br>
                    <input type="submit" value="ENTER" name="enter" class= "submit"><br><br>
                </form>
                
                <?php
                if(isset($_POST['enter'])){
                    $student_id = $_POST['student_id'];
                
                $sql = "SELECT s.student_id, s.firstname, s.lastname, s.tel_no, s.course, s.amount, s.duration, s.date_enrolled, s.due_date, s.statu, p.payment, SUM(p.payment) as total_amount_paid, p.p_date FROM payment as p, student as s 
                WHERE s.student_id=p.student_id AND s.student_id ='$student_id'";
                if (!empty($student_id)) {
                    $sql;
                }
                $data = $conn->query($sql);
                if ($data){
                    if ($data -> num_rows > 0){
                        $sn = 1;
                        while($row = $data->fetch_assoc()){
                ?>     
                <p id="head"> STUDENT DETAILS</p>
                <p>STUDENT ID : <?php echo $row["student_id"]?></p>
                <p>FIRSTNAME : <?php echo $row["firstname"]?></p>
                <p>LASTNAME : <?php echo $row["lastname"]?></p>
                <p>TELEPHONE : <?php echo $row["tel_no"]?></p>
                <p>COURSE : <?php echo $row["course"]?></p>
                <p>COURSE FEE : <?php echo $row["amount"]?></p>
                <p>DURATION : <?php echo $row["duration"]?></p>
                <p>DATE ENROLLED : <?php echo $row["date_enrolled"]?></p>
                <p>DUE DATE : <?php echo $row["due_date"]?></p>
                <p>TOTAL AMOUNT PAID : <?php echo $row["total_amount_paid"]?></p>
                <p>STUDENT STATUS : <?php echo $row["statu"]?></p>
            </div>
        </div>
            
                <?php
                        }
                    }
                }
                }
                ?>
    </body>
</html>