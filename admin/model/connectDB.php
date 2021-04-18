  
<?php

function connectDB()
{
    try {

        return new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET . ";port=" . DB_PORT, DB_USERNAME, DB_PWD,[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);

    } catch (PDOException $e) {

        $error = $e->getCode() . " : " . $e->getMessage();
        die($error);

    }
}
?>