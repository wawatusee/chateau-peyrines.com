<?php
// procedural mysqli connection
//Not used yet
function connectDB(){
    $connect = @mysqli_connect(DB_HOST,DB_USERNAME,DB_PWD,DB_NAME, DB_PORT);
    // if error
    if(mysqli_connect_errno()){
        return false;
    }
    // change charset
    mysqli_set_charset($connect,DB_CHARSET);

    return $connect;
}