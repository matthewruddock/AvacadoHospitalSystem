<?php 
	/* Database credentials*/
	$servername= "localhost";
	$dbUsername= "root";
	$dbPassword="root";
	//$dbPassword="";
	$dbName ="avocadoMC_DB";

	//Attempt to connect to MySQL database
	$conn = mysqli_connect ($servername,$dbUsername,$dbPassword);

	// Check connection
	if (!$conn){
		die("Connection failed: " .mysqli_connect_error());
	}

	//Create Database
	$sql = "CREATE DATABASE avocadoMC_DB";
	if(mysqli_query($conn,$sql)){
	//	echo "\nDatabase created successfully";
	} else {
	//	echo "\nError creating database: ".mysqli_error($conn);
	}

	//Code to see if Table Exists

	//Create Staff Table if doesn't exist
	$tbl_Staff = "CREATE TABLE IF NOT EXISTS avocadoMC_DB.Staff (
		StaffID VARCHAR(10) NOT NULL,
		Name VARCHAR(50) NOT NULL,
		Email VARCHAR(255) NOT NULL,
		Password VARCHAR(100) NOT NULL,
		Type VARCHAR(16) NOT NULL,
		PRIMARY KEY (StaffID),
		UNIQUE KEY Email (Email)
	)";
	$query = mysqli_query($conn, $tbl_Staff);
	if ($query === TRUE) {
	//	echo "\nStaff table created";
	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES ('doc111','John','john@example.com', 'hello0000', 'Admin' )";
	mysqli_query($conn, $insertStaffSql);

	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES ('doc882','John','ewe88@example.com', 'hello0000', 'Admin' )";
	mysqli_query($conn, $insertStaffSql);

	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES ('doc111','John','john@example.com', 'hello0000', 'Nurse' )";
	mysqli_query($conn, $insertStaffSql);

	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES ('doc882','John','ewe88@example.com', 'hello0000', 'Nurse' )";
	mysqli_query($conn, $insertStaffSql);

	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES ('doc882','John','ewe88@example.com', 'hello0000', 'Nurse' )";
	mysqli_query($conn, $insertStaffSql);

	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES ('doc111','John','john@example.com', 'hello0000', 'Doctor' )";
	mysqli_query($conn, $insertStaffSql);

	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES ('doc882','John','ewe88@example.com', 'hello0000', 'Doctor' )";
	mysqli_query($conn, $insertStaffSql);

	} else {
		//echo "\nStaff table NOT created"; 
	}

	//Create Patient Table if doesn't exist
	$tbl_Patient = "CREATE TABLE IF NOT EXISTS avocadoMC_DB.Patient (
		PatientTRN VARCHAR(10) NOT NULL,
		Title VARCHAR(5) NOT NULL,
		FirstName VARCHAR(50) NOT NULL,
		LastName VARCHAR(50) NOT NULL,
		DateOfBirth DATE NOT NULL,
		Address VARCHAR(255) NOT NULL,
		TelNo VARCHAR(16) DEFAULT '876-000-0000',
		Email VARCHAR(255) NOT NULL,
		PRIMARY KEY (PatientTRN),
		UNIQUE KEY Email (Email)
	)";
	$query = mysqli_query($conn, $tbl_Patient);
	if ($query === TRUE) {
		$insertPatientSql = "INSERT INTO avocadoMC_DB.Patient (PatientTRN, Title, FirstName, LastName, DateOfBirth, Address, TelNo, Email)
		VALUES ('7723232', 'Mr','John', 'Rudd', '2010-10-10', 'Hatfield, JA', '876-900-1122', 'john@example.com')";
		mysqli_query($conn, $insertPatientSql);

		$insertPatientSql = "INSERT INTO avocadoMC_DB.Patient (PatientTRN, Title, FirstName, LastName, DateOfBirth, Address, TelNo, Email)
		VALUES ('53222177', 'Ms','Moe', 'Rudd','2010-10-10','Hatfield, JA', '876-900-7216', 'jsak@example.com')";
		mysqli_query($conn, $insertPatientSql);

		$insertPatientSql = "INSERT INTO avocadoMC_DB.Patient (PatientTRN, Title, FirstName, LastName, DateOfBirth, Address, TelNo, Email)
		VALUES ('53222177', 'Ms','Moe', 'Rudd','2010-10-10','Hatfield, JA', '876-900-7216', 'jsak@example.com')";
		mysqli_query($conn, $insertPatientSql);

		$insertPatientSql = "INSERT INTO avocadoMC_DB.Patient (PatientTRN, Title, FirstName, LastName, DateOfBirth, Address, TelNo, Email)
		VALUES ('53222177', 'Ms','Moe', 'Rudd','2010-10-10','Hatfield, JA', '876-900-7216', 'jsak@example.com')";
		mysqli_query($conn, $insertPatientSql);

		$insertPatientSql = "INSERT INTO avocadoMC_DB.Patient (PatientTRN, Title, FirstName, LastName, DateOfBirth, Address, TelNo, Email)
		VALUES ('53222177', 'Ms','Moe', 'Rudd','2010-10-10','Hatfield, JA', '876-900-7216', 'jsak@example.com')";
		mysqli_query($conn, $insertPatientSql);
	

	} else {
		//echo "\nPatient table NOT created"; 
	}

	//Create Appointment Table if doesn't exist
	$tbl_Appointment = "CREATE TABLE IF NOT EXISTS avocadoMC_DB.Appointment (
        id INT(11) NOT NULL AUTO_INCREMENT,
		PatientTRN VARCHAR(10) NOT NULL,
		StaffID VARCHAR(10) NOT NULL,
		Date DATE NOT NULL,
		ReasonForVisit VARCHAR(255) DEFAULT'',
		Status VARCHAR(15) DEFAULT 'Pending',
		PRIMARY KEY (id)
	)";
	$query = mysqli_query($conn, $tbl_Appointment);
	if ($query === TRUE) {
		//echo "\nAppointment table created"; 
		$insertAppointmentSql = "INSERT INTO avocadoMC_DB.Appointment (id, PatientTRN, StaffID, Date, ReasonForVisit, Status)
		VALUES (NULL, '7728832','doc1000','2020-02-02', 'headache','Pending')";
		mysqli_query($conn, $insertAppointmentSql);

		$insertAppointmentSql = "INSERT INTO avocadoMC_DB.Appointment (id, PatientTRN, StaffID, Date, ReasonForVisit, Status)
		VALUES (NULL, '9232333', 'doc199', '2020-09-10', 'headache', 'Cancelled')";
		mysqli_query($conn, $insertAppointmentSql);

		$insertAppointmentSql = "INSERT INTO avocadoMC_DB.Appointment (id, PatientTRN, StaffID, Date, ReasonForVisit, Status)
		VALUES (NULL, '9232333', 'doc199', '2020-09-10', 'headache', 'Complete')";
		mysqli_query($conn, $insertAppointmentSql);

	} else {
		//echo "\nAppointment table NOT created"; 
	}


	mysqli_close($conn);
?>

