<?php 

session_start();

require 'config.php';

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();

    header('Location: index.php');
    exit();
}



$query = "SELECT * FROM transaction";
$retrieve = \mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Vote</th>
            </tr>
        </thead>
        <tbody>
            <?php while($result = \mysqli_fetch_array($retrieve)): ?>
                <tr>
                    <td><?php echo $result['Name']; ?></td>
                    <td><?php echo $result['VoteCount']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <form action="status.php" method="POST">
        <button type="submit" name="logout">LOG OUT</button>
    </form>
</body>
</html>