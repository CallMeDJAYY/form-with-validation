<?php
// Student Information Form with client-side and server-side validation


//Wrapper function to clean input data
// User-defined function: removes extra spaces from submitted text
function clean_input($data) {
    return trim($data);
}

// Variables to hold submitted values
//declared on one line to save space

$name = $program = $year = $email = "";

/*same as
$name = "";
$program = "";
$year = "";
$email = "";
*/


//Variables to hold error messages
$nameErr = $programErr = $yearErr = $emailErr = "";
$success = false;


// Run the checks only when the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name    = clean_input($_POST["name"] ?? "");
    $program = clean_input($_POST["program"] ?? "");
    $year    = clean_input($_POST["year"] ?? "");
    $email   = clean_input($_POST["email"] ?? "");

    // Name: required, at least 2 characters, letters/spaces/hyphens/apostrophes only
    if (empty($name)) {
        $nameErr = "Please enter your name.";
    } elseif (strlen($name) < 2) {
        $nameErr = "Your name must have at least 2 characters.";
    } elseif (!ctype_alpha(str_replace([" ", "-", "'"], "", $name))) {
        $nameErr = "Your name may contain only letters, spaces, hyphens and apostrophes.";
    }

    // Program: required and must be one of the listed programs
    if (empty($program)) {
        $programErr = "Please select your program of study.";
    } elseif (!in_array($program, ["Computer Systems Technology", "Information Technology", "Electronics Technology"])) {
        $programErr = "Please choose a program from the list.";
    }

    // Year: must be a whole number from 2021 to 2025
    if (filter_var($year, FILTER_VALIDATE_INT, ["options" => ["min_range" => 2021, "max_range" => 2025]]) === false) {
        $yearErr = "Year of study must be a whole number from 2021 to 2025.";
    }

    // Email: required and correctly formatted
    if (empty($email)) {
        $emailErr = "Please enter your email address.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Please enter a valid email address, e.g. name@example.com.";
    }

    // Success only when every error message is still empty
    if ($nameErr === "" && $programErr === "" && $yearErr === "" && $emailErr === "") {
        $success = true;
    }

    
}
?>