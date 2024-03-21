<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Information Form</title>
</head>

<body>
    <h1>Donor Information Form</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['fullname'];
        $number = $_POST['mobileno'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $blood_group = $_POST['blood'];
        $address = $_POST['address'];

        $conn = mysqli_connect("localhost", "root", "", "blood_donation");

        if (!$conn) {
            die("Connection error: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO donor_details(donor_name, donor_number, donor_age, donor_gender, donor_blood, donor_address) 
                VALUES('$name', '$number', '$age', '$gender', '$blood_group', '$address')";

        if (mysqli_query($conn, $sql)) {
            echo "Record added successfully!";
            // Optionally, you can redirect the user after displaying the success message
            header("Location: http://localhost/BDMS/admin/donor_list.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required><br>

        <label for="mobileno">Mobile Number:</label>
        <input type="text" id="mobileno" name="mobileno" required><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br>

        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label><br>

        <label for="blood">Blood Group:</label>
        <input type="text" id="blood" name="blood" required><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>
