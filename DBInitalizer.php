<?php
	/* Database credentials*/
	$servername= "localhost";
	$dbUsername= "root";
	$dbPassword="";
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
	VALUES (?, ?, ?, ?, ?)";
	$stmt = mysqli_prepare($conn, $insertStaffSql);
	mysqli_stmt_bind_param($stmt, "sssss", $param_staffId, $param_staffName, $param_email, $param_pwd, $param_type);
	$param_staffId='AM001';
	$param_staffName='admin';
	$param_email='admin@mail.com';
	$param_pwd = password_hash('admin1000', PASSWORD_DEFAULT); // Creates a password hash
	$param_type='Admin';
	mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES (?, ?, ?, ?,?)";
	$stmt = mysqli_prepare($conn, $insertStaffSql);
	mysqli_stmt_bind_param($stmt, "sssss", $param_staffId, $param_staffName, $param_email, $param_pwd, $param_type);
	$param_staffId='AM002';
	$param_staffName='Bob Manley';
	$param_email='bobmanley@mail.com';
	$param_pwd = password_hash('admin1111', PASSWORD_DEFAULT); // Creates a password hash
	$param_type='Admin';
	mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES (?, ?, ?, ?,?)";
	$stmt = mysqli_prepare($conn, $insertStaffSql);
	mysqli_stmt_bind_param($stmt, "sssss", $param_staffId, $param_staffName, $param_email, $param_pwd, $param_type);
	$param_staffId='NUR001';
	$param_staffName='Ashley Moore';
	$param_email='ashleymoore@gmail.com';
	$param_pwd = password_hash('ashley2020', PASSWORD_DEFAULT); // Creates a password hash
	$param_type='Nurse';
	mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES (?, ?, ?, ?,?)";
	$stmt = mysqli_prepare($conn, $insertStaffSql);
	mysqli_stmt_bind_param($stmt, "sssss", $param_staffId, $param_staffName, $param_email, $param_pwd, $param_type);
	$param_staffId='NUR002';
	$param_staffName='Samantha Issacs';
	$param_email='sammy7887@gmail.com';
	$param_pwd = password_hash('sam7887', PASSWORD_DEFAULT); // Creates a password hash
	$param_type='Nurse';
	mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES (?, ?, ?, ?,?)";
	$stmt = mysqli_prepare($conn, $insertStaffSql);
	mysqli_stmt_bind_param($stmt, "sssss", $param_staffId, $param_staffName, $param_email, $param_pwd, $param_type);
	$param_staffId='NUR003';
	$param_staffName='Kimberly Hilton';
	$param_email='kimhilton@gmail.com';
	$param_pwd = password_hash('kimmypass10', PASSWORD_DEFAULT); // Creates a password hash
	$param_type='Nurse';
	mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES (?, ?, ?, ?,?)";
	$stmt = mysqli_prepare($conn, $insertStaffSql);
	mysqli_stmt_bind_param($stmt, "sssss", $param_staffId, $param_staffName, $param_email, $param_pwd, $param_type);
	$param_staffId='DOC001';
	$param_staffName='John Lee';
	$param_email='johnlee10@gmail.com';
	$param_pwd = password_hash('johnchina77', PASSWORD_DEFAULT); // Creates a password hash
	$param_type='Doctor';
	mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

	$insertStaffSql = "INSERT INTO avocadoMC_DB.Staff (StaffID, Name, Email, Password, Type)
	VALUES (?, ?, ?, ?,?)";
	$stmt = mysqli_prepare($conn, $insertStaffSql);
	mysqli_stmt_bind_param($stmt, "sssss", $param_staffId, $param_staffName, $param_email, $param_pwd, $param_type);
	$param_staffId='DOC002';
	$param_staffName='Matthew Black';
	$param_email='matthewblack07@gmail.com';
	$param_pwd = password_hash('black007', PASSWORD_DEFAULT); // Creates a password hash
	$param_type='Doctor';
	mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

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
		VALUES ('133444221', 'Mr','John', 'Mitchell', '2000-10-10', 'East Rd 15, Westwood', '876-900-1122', 'johnmitch@gmail.com')";
		mysqli_query($conn, $insertPatientSql);

		$insertPatientSql = "INSERT INTO avocadoMC_DB.Patient (PatientTRN, Title, FirstName, LastName, DateOfBirth, Address, TelNo, Email)
		VALUES ('890134567', 'Ms','Moesha', 'Gaye','1987-06-11','Kings Street 33, Hampton', '876-900-7216', 'moeshagaye10@gmail.com')";
		mysqli_query($conn, $insertPatientSql);

		$insertPatientSql = "INSERT INTO avocadoMC_DB.Patient (PatientTRN, Title, FirstName, LastName, DateOfBirth, Address, TelNo, Email)
		VALUES ('777812331', 'Ms','Abbygale', 'Green','1999-08-03','Redwood Drive 17, Greenland', '876-288-9182', 'abbygreen18@gmail.com')";
		mysqli_query($conn, $insertPatientSql);

		$insertPatientSql = "INSERT INTO avocadoMC_DB.Patient (PatientTRN, Title, FirstName, LastName, DateOfBirth, Address, TelNo, Email)
		VALUES ('447880323', 'Ms','Gabby', 'McIntosh','1997-02-07','Bluehouse 18, Tribit', '876-466-8822', 'gabbymc78@gmail.com')";
		mysqli_query($conn, $insertPatientSql);

		$insertPatientSql = "INSERT INTO avocadoMC_DB.Patient (PatientTRN, Title, FirstName, LastName, DateOfBirth, Address, TelNo, Email)
		VALUES ('675555111', 'Ms','Donald', 'Reid','1992-02-09','Llandilo 17, London', '876-278-0001', 'donaldreid@hotmail.com')";
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
		$query1 = "SELECT PatientTRN FROM avocadoMC_DB.Appointment WHERE PatientTRN ='133444221' AND Date = '2020-11-02'";
		$result = mysqli_query($conn, $query1);
		if($result){
			if(mysqli_num_rows($result) == 0){
			$insertAppointmentSql = "INSERT INTO avocadoMC_DB.Appointment (id, PatientTRN, StaffID, Date, ReasonForVisit, Status)
			VALUES (NULL, '133444221','DOC001','2020-11-02', 'Headache','Pending')";
			mysqli_query($conn, $insertAppointmentSql);

			$insertAppointmentSql = "INSERT INTO avocadoMC_DB.Appointment (id, PatientTRN, StaffID, Date, ReasonForVisit, Status)
			VALUES (NULL, '890134567', 'DOC001', '2020-11-10', 'Back pains', 'Cancelled')";
			mysqli_query($conn, $insertAppointmentSql);

			$insertAppointmentSql = "INSERT INTO avocadoMC_DB.Appointment (id, PatientTRN, StaffID, Date, ReasonForVisit, Status)
			VALUES (NULL, '447880323', 'DOC002', '2020-11-12', 'Check-up', 'Complete')";
			mysqli_query($conn, $insertAppointmentSql);
			}

		}


	} else {
		//echo "\nAppointment table NOT created";
	}


	mysqli_close($conn);
?>
