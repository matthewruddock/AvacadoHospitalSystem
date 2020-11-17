<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "avocadoMC_DB";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    // sql to create users table
    $sql = "CREATE TABLE users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Email VARCHAR(50) NOT NULL UNIQUE,
        StaffID VARCHAR(10) NOT NULL UNIQUE,
        Password VARCHAR(100) NOT NULL,
        Role VARCHAR(10) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table users created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    // sql to create appointment table
    $sql = "CREATE TABLE appointment (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        PatientTRN VARCHAR(10) NOT NULL,
        StaffID VARCHAR(10) NOT NULL,
        Date DATE NOT NULL,
        ReasonForVisit VARCHAR(100) NULL,
        Status VARCHAR(12) NOT NULL
        )";
        
    if (mysqli_query($conn, $sql)) {
        echo "Table appointment created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    // sql to create patient table
    $sql = "CREATE TABLE patient (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        PatientTRN VARCHAR(10) NOT NULL UNIQUE,
        Title VARCHAR(5) NOT NULL,
        FirstName VARCHAR(50) NOT NULL,
        LastName VARCHAR(50) NOT NULL,
        DateOfBirth DATE NOT NULL,
        Address VARCHAR(100) NOT NULL,
        TelNo. VARCHAR(12) NOT NULL,
        Email VARCHAR(50) NOT NULL
        )";
        
    if (mysqli_query($conn, $sql)) {
        echo "Table appointment created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    // sql to create staff table
    $sql = "CREATE TABLE patient (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        StaffID VARCHAR(10) NOT NULL UNIQUE,
        Name VARCHAR(100) NOT NULL,
        Email VARCHAR(50) NOT NULL,
        Password VARCHAR(100) NOT NULL,
        Type VARCHAR(10) NOT NULL
        )";
        
    if (mysqli_query($conn, $sql)) {
        echo "Table appointment created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>