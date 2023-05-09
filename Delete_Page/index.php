<!DOCTYPE html>
<html>

<head>
    <title>PHP Delete Data</title>
    <link href="./style.css" rel="stylesheet">

</head>

<body class="body">
    <h1>Delete Data</h1>
    <form method="post" action="">

        <div>
            <label for="ID">Employee ID: </label>
            <input type="text" name="employee_id">

        </div>

        <div style="padding-top: 50px;"><button type="submit" name="register" class="btn_create">Delete</button></div>

        <?php
        if (isset($_POST["register"])) {

            /**
             * PHP MySQL Update data demo
             */
            class DeleteData
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

                public function delete($id)
                {

                    $sql = 'DELETE FROM web_employee WHERE employee_id = :employee_id';

                    $q = $this->pdo->prepare($sql);

                    return $q->execute([':employee_id' => $id]);
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

            $obj = new DeleteData();

            $obj->delete($employee_id);
        }

        ?>
    </form>

</body>

</html>