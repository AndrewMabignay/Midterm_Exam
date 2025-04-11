<?php 

require 'config.php';

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();

    header('Location: index.php');
    exit();
}

if (isset($_POST['vote'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $partyList = $_POST['partyList'];
    $voteCount = $_POST['voteCount'];

    $query = "UPDATE transaction SET VoteCount = '$voteCount' WHERE ID = '$id'";
    $result = \mysqli_query($conn, $query);
}

$query = "SELECT * FROM transaction";
$retrieve = \mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>POS</th>
                <th>Party</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($result = \mysqli_fetch_array($retrieve)): ?>
                <tr>
                    <td><?php echo $result['Name']; ?></td>
                    <td><?php echo $result['Position']; ?></td>
                    <td><?php echo $result['PartyList']; ?></td>
                    <td>
                        <form action="standard.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $result['ID']; ?> ">    
                            <input type="hidden" name="name" value="<?php echo $result['Name']; ?> ">    
                            <input type="hidden" name="position" value="<?php echo $result['Position']; ?> ">    
                            <input type="hidden" name="partyList" value="<?php echo $result['PartyList']; ?> ">    
                            <input type="hidden" name="voteCount" value="<?php echo '1' ?> ">    

                            <button type="submit" name="vote">Vote</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <form action="standard.php" method="POST">
        <button type="submit" name="logout">LOG OUT</button>
    </form>
</body>
</html>