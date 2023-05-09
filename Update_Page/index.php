<!DOCTYPE html>
<html>

<head>
    <title>PHP Update Data</title>
    <link href="./style.css" rel="stylesheet">

</head>

<body class="body">
    <h1>Update Data</h1>
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

        <div style="padding-top: 50px;"><button type="submit" name="register" class="btn_create">Update</button></div>

        <?php
        if (isset($_POST["register"])) {

            /**
             * PHP MySQL Update data demo
             */
            class UpdateData
            {

                const DB_HOST = 'localhost';
                const DB_NAME = 'uts';
                const DB_USER = 'root';
                const DB_PASSWORD = '';

                /**
                 * PDO instance
                 * @var PDO
                 */
                private $pdo = null;

                /**
                 * Open the database connection
                 */
                public function __construct()
                {
                    // open database connection
                    $connStr = sprintf("mysql:host=%s;dbname=%s", self::DB_HOST, self::DB_NAME);
                    try {
                        $this->pdo = new PDO($connStr, self::DB_USER, self::DB_PASSWORD);
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }
                }
                
                public function update($id, $name, $gender, $role, $age, $comment)
                {
                    $task = [
                        ':employee_id' => $id,
                        ':employee_name' => $name,
                        ':employee_gender' => $gender,
                        ':employee_role' => $role,
                        ':employee_age' => $age,
                        ':comment' => $comment
                    ];


                    $sql = 'UPDATE web_employee
                    SET employee_name      = :employee_name,
                    employee_gender  = :employee_gender,
                    employee_role    = :employee_role,
                    employee_age = :employee_age,
                    comment = :comment
                  WHERE employee_id = :employee_id';

                    $q = $this->pdo->prepare($sql);

                    return $q->execute($task);
                }

                /**
                 * close the database connection
                 */
                public function __destruct()
                {
                    // close the database connection
                    $this->pdo = null;
                }
            }
            $employee_id = $_POST['employee_id'];
            $employee_name = $_POST['employee_name'];
            $employee_gender = $_POST['employee_gender'];
            $employee_role = $_POST['employee_role'];
            $employee_age = $_POST['employee_age'];
            $comment = $_POST['comment'];

            $obj = new UpdateData();

            if ($obj->update($employee_id, $employee_name, $employee_gender, $employee_role, $employee_age, $comment) !== false)
                echo 'The task has been updated successfully';
            else
                echo 'Error updated the task';
        }

        ?>
    </form>

</body>

</html>