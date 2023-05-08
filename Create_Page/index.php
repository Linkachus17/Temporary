<!DOCTYPE html>
<html>

<head>
    <title>PHP MySQL Query Data Demo</title>
    <link href="./style.css" rel="stylesheet">

</head>

<body class="body">
    <h1>Insert Data</h1>

    <div>
        <label for="ID">Employee ID: </label>
        <input type="text" name="employee_id">

        <br>
        <br>
        <label for="Name">Employee Name: </label>
        <input type="text" name="employee_name">

        <br>
        <br>
        <legend>Select Gender</legend>
        <div><input type="radio" name="employee_gender" id="gender" value="Male">Male</div>
        <div><input type="radio" name="employee_gender" id="gender" value="Female">Female</div>
        <br>
        <br>

        <label for="Role">Role</label>
        <select name="employee_role" id="role_select">
            <option value="Backend">Backend</option>
            <option value="Frontend">Frontend</option>
        </select>
        <br>
        <br>

        <label for="Age">Employee Age: </label>
        <input type="number" name="employee_age">
    </div>

    <?php

    if (isset($_POST["register"])) {


        $conn = mysqli_connect("localhost", "root", "", "uts");

        $result = mysqli_query($conn, "INSERT INTO `web_employee` (`employee_id`, `employee_name`, `employee_gender`, `employee_role`, `employee_age`) VALUES ('$employee_id', '$employee_name', '$employee_gender', '$employee_role', '$employee_age') ");

        if ($result) {
            echo "register berhasil, silakan <a href='halaman_login.php'>klik disini</a> untuk login.";
        } else {
            echo "register anda tidak berhasil.";
        }
    }
    ?>



    <div style="padding-top: 50px;"><button type="submit" name="register" class="btn_create">Register!</button></div>





</body>

</html>