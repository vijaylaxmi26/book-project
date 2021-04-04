<?php 

function invalidUid($username) 
{
    $result = false;
    if(!preg_match("/^[a-zA-Z]+$/",$username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidPhone($phone) {
    $result = false;
    if(!preg_match("/^[6-9][0-9]{9}$/",$phone)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password,$cpassword) {
    if($password !== $cpassword) {
        return true;
    }
    return false;
}

function emailExists($conn,$email) {
    $emailcheck ="SELECT *  FROM usersignup WHERE email = ? ;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $emailcheck)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row;
    }
    else {
        mysqli_stmt_close($stmt);
        return false;
    }    
}













?>