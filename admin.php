<?php 
    require 'config.php';

    $id = '';
    $name = '';
    $position = '';
    $partylist = '';
    $voteCount = '';

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();

        header('Location: index.php');
        exit();
    }

    if (isset($_POST['insert'])) {
        $name = $_POST['name'];
        $position = $_POST['position'];
        $partylist = $_POST['partylist'];
        $voteCount = $_POST['voteCount'];

        echo $name;
        echo $position;
        echo $partylist;
        echo $voteCount;

        $query = "INSERT INTO transaction(Name, Position, PartyList, VoteCount) VALUES ('$name', '$position', '$partylist', '$voteCount')";
        $insertFields = \mysqli_query($conn, $query);
        echo $insertFields === true ? 'Successfully Inserted!' : 'Not Successfully Inserted!';

        // $name = '';
        // $position = '';
        // $partylist = '';
        // $voteCount = '';
    }

    if (isset($_POST['search'])) {
        $name = $_POST['name'];

        $query = "SELECT * FROM transaction WHERE Name = '$name'";
        $retrieve = \mysqli_query($conn, $query);

        while($result = \mysqli_fetch_array($retrieve)) {
            $id = $result['ID'];
            $position = $result['Position'];
            $partylist = $result['PartyList'];
            $voteCount = $result['VoteCount'];

            echo $id;
            echo $name;
            echo $position;
            echo $partylist;
            echo $voteCount;
        }
    }

    if (isset($_POST['delete'])) {
        $deleteID = $_POST['id'];
        echo $deleteID;  
        $query = "DELETE FROM transaction WHERE ID = $deleteID";
        $result = mysqli_query($conn, $query);

        $name = '';
        $position = '';
        $partylist = '';
        $voteCount = '';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="admin.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id == '' ? '' :  $id ?>">

        <div class="input-container">
            <label for="">Name</label>
            <input type="text" name="name" value="<?php echo $name == '' ? '' :  $name ?>">
        </div>

        <div class="input-container">
            <label for="">Position</label>
            <input type="text" name="position" value="<?php echo $position == '' ? '' :  $position ?>">
        </div>

        <div class="input-container">
            <label for="">Party List</label>
            <input type="text" name="partylist" value="<?php echo $partylist == '' ? '' :  $partylist ?>">
        </div>

        <input type="hidden" value="0" name="voteCount" value="<?php echo $voteCount == '' ? '' :  $voteCount ?>">

        <div class="button-container">
            <button type="submit" name="search">SEARCH</button>
            <button type="submit" name="insert">SAVE</button>
            <button type="submit" name="delete">DELETE</button>
            <a href="status.php">Status</a>
            <button type="submit" name="logout">LOG OUT</button>
        </div>
    </form>
</body>
</html>