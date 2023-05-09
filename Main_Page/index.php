<?php
require_once 'dbconfig.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $sql = 'SELECT * FROM web_employee';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Query Data Demo</title>
        <link href="./style.css" rel="stylesheet">
    </head>
    <body class="body">
            <h1>Employees</h1>
            <table align="center">
                <thead>
                    <tr>
                        <th>employee_id</th>
                        <th>employee_name</th>
                        <th>employee_gender</th>
                        <th>employee_role</th>
                        <th>employee_age</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['employee_id']) ?></td>
                            <td><?php echo htmlspecialchars($row['employee_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['employee_gender']); ?></td>
                            <td><?php echo htmlspecialchars($row['employee_role']); ?></td>
                            <td><?php echo htmlspecialchars($row['employee_age']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div style="padding-top: 30px;">
                <a target="_blank" class="btn_create" href="../Create_Page/index.php">Create</a>
                <a target="_blank" class="btn_update" href="../Update_Page/index.php">Update</a>
                <a target="_blank" class="btn_delete" href="https://example.com">Delete</a>
            </div>
    </body>
</html>