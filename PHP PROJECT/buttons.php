
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    if(isset($_POST['enq'])){
        echo <<<GFG
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
                    <input type="submit" name="submit" value="submit" class="input">
                </form>
            </fieldset>
        </div>
        GFG;
    }
    elseif(isset($_POST['stu'])){
        echo <<<GFG
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
                            <option value="">Data Science</option>
                            <option value="">Data Analysis</option>
                            <option value="">Software Development</option>
                            <option value="">Desktop Publishing</option>
                            <option value="">Graphics Design</option>
                            <option value="">Product Management</option>
                            <option value="">Digital Marketing</option>
                    </select><br><br><br><br>
                    <label for="">DURATION :</label>
                    <input type="text" name="duration" class="input" required><br><br>
                    <label for="">DATE ENROLLED :</label>
                    <input type="date" name="d_enr" class="input" required><br><br>
                    <label for="">DUE DATE :</label>
                    <input type="date" name="d_date" class="input" required><br><br>
                    <label for="">STATUS :</label>
                    <input type="text" name="status" class="input" required><br><br>
                    <input type="submit" name="submit" value="submit" class="input">
                </form>
            </fieldset>
        </div>
        GFG;
        }
        elseif(isset($_POST['pay'])){
            echo <<<GFG
            <div>
                <fieldset class="field">
                    <legend>PAYMENT RECORD</legend>
                    <form action="payment.php" method="post" class="form">
                        <label for="">COURSE : </label>
                        <select name="course" id="option">
                            <option value="">Data Science</option>
                            <option value="">Data Analysis</option>
                            <option value="">Software Development</option>
                            <option value="">Desktop Publishing</option>
                            <option value="">Graphics Design</option>
                            <option value="">Product Management</option>
                            <option value="">Digital Marketing</option>
                        </select><br><br>
                        <label for="">AMOUNT : </label>
                        <input type="text" name="amount"  class="input" required><br><br>
                        <label for="">PAYMENT :</label>
                        <input type="text" name="pay" class="input" required><br><br>
                        <label for="">BALANCE : </label>
                        <input type="text" name="bal"  class="input" required><br><br>
                        <label for="">PAYMENT STATUS : </label>
                        <input type="text" name="pay_stat"  class="input" required><br><br>
                        <input type="submit" name="submit" value="submit" class="input">
                    </form>
                </fieldset>
            </div>
            GFG;
            }
    ?>
</body>
</html>