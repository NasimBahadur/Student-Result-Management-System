<?php
    session_start();
    session_unset();
    session_destroy();
    if(isset($_COOKIE['studentId']) and isset($_COOKIE['password'])){
        $studentId=$_COOKIE['studentId'];
        $password=$_COOKIE['password'];
        setcookie('studentId',$studentId,time()-1);
        setcookie('password',$password,time()-1);
    }
    echo "<script>alert('Logout successfully.');</script>";
    include ('sign_in.php');
?>