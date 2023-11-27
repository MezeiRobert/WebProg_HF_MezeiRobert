<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];
    $firstname = $_POST["firstName"];
    $lastname = $_POST["lastName"];
    $email = $_POST["email"];
    $attend = $_POST["attend"] ?? [];
    $terms = $_POST["terms"] ?? "";
    $tshirts = $_POST["tshirt"];

    if (empty($firstname)){
        $errors[] = "You need to add a First Name!";
    }

    if (empty($lastname)){
        $errors[] = "You need to add a Last Name!";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address";
    }

    if (empty($attend)){
        $errors[] = "Select at least one event!";
    }

    if (isset($_FILES["abstract"]) && $_FILES["abstract"]["error"] === UPLOAD_ERR_OK) {
        $fileType = pathinfo($_FILES["abstract"]["name"], PATHINFO_EXTENSION);
        $fileSize = $_FILES["abstract"]["size"];

        if ($fileType !== "pdf") {
            $errors[] = "Only PDF files are allowed!";
        }
        if ($fileSize > 3 * 1024 * 1024) {
            $errors[] = "File size is too big!";
        }
    }
}

    if ($terms !== "accepted") {
        $errors[] = "You must accept the terms & conditions!";
    }

    if (empty($errors)){
        echo "Registration is succesful!"."<br>";
        echo "First name: ". $firstname. "<br>";
        echo "Last name: ". $lastname."<br>";
        echo "Email adress: ". $email."<br>";
        echo "Attending events: ". "<br>";
        foreach ($attend as $event){
            echo $event. "<br>";
        }
        echo "T-shirt size: ";
        echo $tshirts;
    } else {
        foreach ($errors as $error){
            echo $error ."<br>";
        }

}

?>