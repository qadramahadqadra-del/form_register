
<?php

$nameError = "";
$emailError = "";
$success = false;

if (isset($_POST["submit"])) {

    if (empty($_POST["fullname"])) {
        $nameError = "<font color='red'>Please fill the name</font>";
    }

    if (empty($_POST["email"])) {
        $emailError = "<font color='red'>Please fill the email</font>";
    }

    if ($nameError == "" && $emailError == "") {
        $success = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
</head>

<body>

<form method="post" action="">

    <h1>Student Registration Form</h1>

    <fieldset>
        <legend>Personal Info</legend>

        <label>Fullname:</label>
        <input type="text" name="fullname"
        value="<?php
        if (isset($_POST['submit']) && !$success)
            echo $_POST['fullname'];
        ?>">
        <br>

        <?php
        if (isset($_POST["submit"])) {
            echo $nameError;
        }
        ?>

        <br><br>

        <label>Email:</label>
        <input type="text" name="email"
        value="<?php
        if (isset($_POST['submit']) && !$success)
            echo $_POST['email'];
        ?>">
        <br>

        <?php
        if (isset($_POST["submit"])) {
            echo $emailError;
        }
        ?>

        <br><br>

        <label>Place of Birth:</label>
        <input type="text" name="pob"
        value="<?php
        if (isset($_POST['submit']) && !$success)
            echo $_POST['pob'];
        ?>">
        <br><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <br><br>

        <label>Faculty:</label>
        <select name="faculty">
            <option value="computer">Computer and IT</option>
            <option value="medicine">Medicine and Health Science</option>
            <option value="engineering">Engineering</option>
            <option value="ecom">Business</option>
            <option value="commerce">Commerce</option>
        </select>
        <br><br>

        <label>Languages:</label>
        <input type="checkbox" name="languages[]" value="Somali"> Somali
        <input type="checkbox" name="languages[]" value="English"> English
        <input type="checkbox" name="languages[]" value="Arabic"> Arabic
        <input type="checkbox" name="languages[]" value="Chinese"> Chinese
        <br><br>

        <label>Comment:</label>
        <textarea name="comment" rows="4" cols="30"><?php
        if (isset($_POST['submit']) && !$success)
            echo $_POST['comment'];
        ?></textarea>
        <br><br>

        <input type="submit" name="submit" value="Register">
        <input type="reset" name="clear" value="Clear">

    </fieldset>

</form>

<?php

if ($success) {

    echo "<h2>Student Information</h2>";

    echo "Fullname: " . $_POST["fullname"] . "<br>";
    echo "Email: " . $_POST["email"] . "<br>";
    echo "Place of Birth: " . $_POST["pob"] . "<br>";

    if (isset($_POST["gender"])) {
        echo "Gender: " . $_POST["gender"] . "<br>";
    }

    echo "Faculty: " . $_POST["faculty"] . "<br>";

    echo "Languages: ";

    if (isset($_POST["languages"])) {
        foreach ($_POST["languages"] as $value) {
            echo $value . ", ";
        }
    }

    echo "<br>";
    echo "Comment: " . $_POST["comment"] . "<br>";
}

?>

</body>
</html>
