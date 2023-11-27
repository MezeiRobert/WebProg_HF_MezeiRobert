<?php

$errors = [];
$firstname = $lastname = $email = $terms = "";
$attend = $tshirts = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $firstname = $_POST["firstName"];
    $lastname = $_POST["lastName"];
    $email = $_POST["email"];
    $attend = $_POST["attend"] ?? [];
    $tshirts = $_POST["tshirt"];

    if (empty($firstname)) {
        $errors[] = "You need to add a First Name!";
    }

    if (empty($lastname)) {
        $errors[] = "You need to add a Last Name!";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address";
    }

    if (empty($attend)) {
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

    if (!isset($_POST["terms"])) {
        $errors[] = "You must accept the terms & conditions!";
    }
}

?>


<h3>Online conference registration</h3>

<form method="post" action="" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName" value="<?php echo $firstname; ?>">
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName" value="<?php echo $lastname; ?>">
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email" value="<?php echo $email; ?>">
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1" <?php if (in_array("Event1", $attend)) echo "checked"; ?>>Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2" <?php if (in_array("Event2", $attend)) echo "checked"; ?>>Event 2<br>
        <input type="checkbox" name="attend[]" value="Event3" <?php if (in_array("Event3", $attend)) echo "checked"; ?>>Event 3<br>
        <input type="checkbox" name="attend[]" value="Event4" <?php if (in_array("Event4", $attend)) echo "checked"; ?>>Event 4<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P" <?php if ($tshirts == "P") echo "selected"; ?>>Please select</option>
            <option value="S" <?php if ($tshirts == "S") echo "selected"; ?>>S</option>
            <option value="M" <?php if ($tshirts == "M") echo "selected"; ?>>M</option>
            <option value="L" <?php if ($tshirts == "L") echo "selected"; ?>>L</option>
            <option value="XL" <?php if ($tshirts == "XL") echo "selected"; ?>>XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="accepted" <?php if ($terms === "accepted") echo "checked"; ?>>I agree to terms & conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) {
    echo "<p>Registration is successful!</p>";
    echo "<p>First name: $firstname</p>";
    echo "<p>Last name: $lastname</p>";
    echo "<p>Email address: $email</p>";

    if (!empty($attend)) {
        echo "<p>Attending events:</p>";
        echo "<ul>";
        foreach ($attend as $event) {
            echo "<li>$event</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No events selected</p>";
    }

    echo "<p>T-shirt size: $tshirts</p>";
}

if (!empty($errors)) {
    echo "<p>Errors:</p>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
}
?>
