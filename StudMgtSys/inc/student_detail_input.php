<?php
 $fname = ucfirst($_POST['fname']);
 $lname = ucfirst($_POST['lname']);
 $phone = $_POST['tel'];
 $tel = str_replace(" ","",$phone);
 $course = $_POST['course'];
 $enr = strtotime($_POST['d_enr']);
 $date = strtotime($_POST['d_date']);
 $amount = '';
 if ($course=='Data Science') {
     $amount= 150000;
 }elseif ($course=='Data Analysis') {
     $amount= 100000;
 }elseif ($course=='Software Development') {
     $amount= 120000;
 }elseif ($course=='Desktop Publishing') {
     $amount= 50000;
 }elseif ($course=='Graphics Design') {
     $amount= 40000;
 }elseif ($course=='Product Management') {
     $amount= 100000;
 }elseif ($course=='Digital Marketing') {
     $amount= 50000;
 }
 $d_enr = new DateTime(date("Y-m-d", $enr));
 $d_date = new DateTime(date("Y-m-d", $date));

 $st_id = date('y', $enr) .'/'.substr($fname, -2).'-'.substr($tel, 4,-3).substr($lname,-2).'/'.substr($course,-2);
 $interval = $d_enr->diff($d_date);
 $durasion = $interval->m;
 $now = new DateTime(date("Y-m-d"));
 $status = '';
 if ($now->diff($d_date) ->m < $durasion && $now->diff($d_date) ->m > 0) {
     $status ="Ongoing";
 }elseif ($now->diff($d_date) ->m <= 0) {
     $status = "Completed";
 }
 $duration = $durasion."month(s)";
 $d_enr_f = $d_enr->format("Y-m-d");
 $d_date_f = $d_date->format("Y-m-d");

?>