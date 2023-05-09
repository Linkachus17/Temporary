<!DOCTYPE html>
<html>

<head>
    <title>PHP Create Data</title>
    <link href="./style.css" rel="stylesheet">

</head>

<body class="body">
    <h1>Insert Data</h1>
    <form method="post" action="">

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
            <br>
            <br>

            <Label for="Comment">Comments: </Label>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        </div>

        <div style="padding-top: 50px;"><button type="submit" name="register" class="btn_create">Create</button></div>

        <?php
        if (isset($_POST["register"])) {
            class InsertData
            {

                const DB_HOST = 'localhost';
                const DB_NAME = 'uts';
                const DB_USER = 'root';
                const DB_PASSWORD = '';

                private $pdo = null;

                /**
                 * Open the database connection
                 */
                public function __construct()
                {
                    // open database connection
                    $conStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
                    try {
                        $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
                    } catch (PDOException $pe) {
                        die($pe->getMessage());
                    }
                    //     require_once 'dbconfig.php';

                    //     try {
                    //         $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                    //         echo "Connected to $dbname at $host successfully.";
                    //     } catch (PDOException $pe) {
                    //         die("Could not connect to the database $dbname :" . $pe->getMessage());
                    //     }
                }

                public function insert()
                {
                    $employee_id = $_POST['employee_id'];
                    $employee_name = $_POST['employee_name'];
                    $employee_gender = $_POST['employee_gender'];
                    $employee_role = $_POST['employee_role'];
                    $employee_age = $_POST['employee_age'];
                    $comment = $_POST['comment'];


                    $sql = "INSERT INTO `web_employee` VALUES ('$employee_id', '$employee_name', '$employee_gender', '$employee_role', '$employee_age', '$comment') ";

                    return $this->pdo->exec($sql);
                }
            }

            $obj = new InsertData();
            $obj->insert();
        }

        ?>
    </form>

</body>

</html>