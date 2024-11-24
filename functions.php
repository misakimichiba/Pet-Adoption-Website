<?php 
session_start();
$db = mysqli_connect('localhost', 'root', '', 'hpusers');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	$uidExists = uidExists($db, $username);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

    if ($uidExists !== false) {
		array_push($errors, "The username is taken");
        exit();
    }

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users2 (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: login.php');
		}else{
			$query = "INSERT INTO users2 (username, email, user_type, password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: user/main.php');
		}
	}
}

function uidExists($db, $username) {
    $sql = "SELECT * FROM users2 WHERE username = ?;";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users2 WHERE usersId=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// call the login() function if login_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users2 WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/main.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: user/main.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

if (isset($_POST['editUsername'])) {
	updateUsername();
}

function updateUsername()
{
	global $db;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$newUsername    =  e($_POST['newUsername']);
	$userID = $_SESSION['user']['id'];

	$uidExists = uidExists($db, $newUsername);

	if ($uidExists === false) {
		$query = "UPDATE users2 SET username = '$newUsername' WHERE id = '$userID'";
		mysqli_query($db, $query);
		$_SESSION['user']['username'] = $newUsername;
		header('location: profile.php');
    }
	else {
		header('location: profile.php');
	}
}

if (isset($_POST['editEmail'])) {
	updateEmail();
}

function updateEmail()
{
	global $db;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$newEmail       =  e($_POST['newEmail']);
	$userID = $_SESSION['user']['id'];
	
	$query = "UPDATE users2 SET email = '$newEmail' WHERE id = '$userID'";
	mysqli_query($db, $query);
	$_SESSION['user']['email'] = $newEmail;
	header('location: profile.php');

}

if (isset($_POST['editPassword'])) {
	updatePassword();
}

function updatePassword()
{
	global $db;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$newPassword  =  e($_POST['newPassword']);
	$userID = $_SESSION['user']['id'];

	$hashedNewPassword = md5($newPassword);//encrypt the password before saving in the database
	$query = "UPDATE users2 SET password = '$hashedNewPassword' WHERE id = '$userID'";
	mysqli_query($db, $query);
	$_SESSION['user']['password'] = $hashedNewPassword;
	header('location: profile.php');

}

if (isset($_POST['submitAnimalProfile'])) {
    createProfile();
}

function createProfile(){
	global $db, $errors;

    $animalName    =  e($_POST['animalName']);
	$animalType      =  e($_POST['animalType']);
	$gender  =  e($_POST['gender']);
	$age  =  e($_POST['age']);
	$colour    =  e($_POST['colour']);
	$vaccinated       =  e($_POST['vaccinated']);
	$dewormed  =  e($_POST['dewormed']);
	$neutered  =  e($_POST['neutered']);
	$animalCondition  =  e($_POST['animalCondition']);

	// form validation: ensure that the form is correctly filled
	if (empty($animalName)) { 
		array_push($errors, "Name is required"); 
	}
	if (empty($animalType)) { 
		array_push($errors, "Animal type is required"); 
	}
	if (empty($gender)) { 
		array_push($errors, "Animal gender is required"); 
	}

	if ($animalType === 'Animal Type') {
		array_push($errors, "Animal type is required"); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {

			$file = $_FILES['file'];

			$fileName = $_FILES['file']['name'];
			$fileTmpName = $_FILES['file']['tmp_name'];
			$fileSize = $_FILES['file']['size'];
			$fileError = $_FILES['file']['error'];
			$fileType = $_FILES['file']['type'];

			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg', 'jpeg', 'png');

			if (in_array($fileActualExt, $allowed)) {
				if ($fileError === 0) {
					if ($fileSize < 1000000) {
						$fileNameNew = $animalName . "." . $fileActualExt;
						$fileDestination = 'assets/img/animals/' . $fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);

						$query = "INSERT INTO animal (animalName, animalType, gender, age, colour, vaccinated, dewormed, neutered, animalCondition, imgType) 
					  	VALUES('$animalName', '$animalType', '$gender', '$age', '$colour', '$vaccinated', '$dewormed', '$neutered', '$animalCondition', '$fileActualExt')";
						mysqli_query($db, $query);

						header ("Location: admin/adoptionListing.php?uploadsuccess");
					}
					else {
						echo "Your file is too big!";
					}
				}
				else {
					echo"There was an error uploading your file :(";
				}
			}
			else {
				echo"You cannot upload files of this type :(";
			}
	}
}

if (isset($_POST['submitAdoptionForm'])) {
    createForm();
}

function createForm(){

			global $db;

			$animalName    =  e($_POST['animalName']);
			$animalID      =  e($_POST['animalID']);
			$username = $_SESSION['user']['username'];
			$userID = $_SESSION['user']['id'];

			$file = $_FILES['file'];

			$fileName = $_FILES['file']['name'];
			$fileTmpName = $_FILES['file']['tmp_name'];
			$fileSize = $_FILES['file']['size'];
			$fileError = $_FILES['file']['error'];
			$fileType = $_FILES['file']['type'];

			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('docx', 'doc');

			if (in_array($fileActualExt, $allowed)) {
				if ($fileError === 0) {
					if ($fileSize < 1000000) {
						$fileNameNew = $username . $animalName . "." . $fileActualExt;
						$fileDestination = 'assets/form/' . $fileNameNew;
						move_uploaded_file($fileTmpName, $fileDestination);

						$query = "INSERT INTO adoptionForm (username, animalName, formStatus, animalID, userID) 
					  	VALUES('$username', '$animalName', 'Pending', '$animalID', '$userID')";
						mysqli_query($db, $query);

						header ("Location: user/adoptionListing.php?uploadsuccess");
					}
					else {
						echo "Your file is too big!";
					}
				}
				else {
					echo"There was an error uploading your file :(";
				}
			}
			else {
				echo"You cannot upload files of this type :(";
			}
}

if (isset($_POST['editStatus'])) {
	updateStatus();
}

function updateStatus()
{
	global $db;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values

	$newStatus    =  e($_POST['formStatus']);
	$formID = e($_POST['formID']);

	$query = "UPDATE adoptionform SET formStatus = '$newStatus' WHERE formID = '$formID'";
	mysqli_query($db, $query);
	header('location: adoptionSubmission.php');
}

if (isset($_POST['editAnimalProfile'])) {
	updateAnimalProfile();
}

function updateAnimalProfile()
{
	global $db;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$animalID = e($_POST['animalID']);
	$newName    =  e($_POST['newAnimalName']);
	$newType    =  e($_POST['newAnimalType']);
	$newGender    =  e($_POST['newGender']);
	$newAge    =  e($_POST['newAge']);
	$newColour    =  e($_POST['newColour']);
	$newVaccinated    =  e($_POST['newVaccinated']);
	$newDewormed    =  e($_POST['newDewormed']);
	$newNeutered    =  e($_POST['newNeutered']);
	$newAnimalCondition    =  e($_POST['newAnimalCondition']);
	
	$query = "UPDATE animal SET animalName = '$newName', animalType = '$newType', gender = '$newGender'
	, age = '$newAge', colour = '$newColour', vaccinated = '$newVaccinated'
	, dewormed = '$newDewormed', neutered = '$newNeutered', animalCondition = '$newAnimalCondition' 
	 WHERE id = '$animalID'";
	mysqli_query($db, $query);
	header('Location: adoptionListing.php');
}

if (isset($_POST['editUser'])) {
	updateUser();
}

function updateUser()
{
	global $db;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$userID = e($_POST['userID']);
	$newUsername    =  e($_POST['newUsername']);
	$newEmail    =  e($_POST['newEmail']);
	
	$uidExists = uidExists($db, $newUsername);

	if ($uidExists === false) {
		$query = "UPDATE users2 SET username = '$newUsername', email = '$newEmail' WHERE id = '$userID'";
		mysqli_query($db, $query);
		header('location: users.php');
    }
	else {
		header('location: users.php');
	}
}
