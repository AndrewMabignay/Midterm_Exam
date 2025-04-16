<?php

if (isset($_POST['vote'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $partyList = $_POST['partyList'];
    $voteCount = $_POST['voteCount'];

    $query = "UPDATE transaction SET VoteCount = '$voteCount' WHERE ID = '$id'";
    $result = \mysqli_query($conn, $query);
}

?>