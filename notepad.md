// DELETE PROGRAM
if (isset($_POST['delete'])) {
    $deleteID = $_POST['id'];  
    $query = "DELETE FROM product WHERE ID = $deleteID";
    $result = mysqli_query($conn, $query);
}


// UPDATE PROGRAM
if (isset($_POST['edit'])) {
    $taskID = $_POST['id'];
    $query = "SELECT * FROM product WHERE ID = $taskID";
    $productQueryResult = mysqli_query($conn, $query);   
    $productResult = mysqli_fetch_assoc($productQueryResult); 
}

if (isset($_POST['update'])) {
    $updateID = $_POST['id']; // ID
    $updateProductName = $_POST['productName']; // Product Name
    $updateQuantity = $_POST['quantity']; // Quantity
    $updatePrice = $_POST['price']; // Price
    $updateNet = ($updatePrice - ($updatePrice * 0.05));
    $updateNet = $updateNet + ($updateNet * 0.12); // Net/Unit
    $updateTotalValue = $updateNet * $updateQuantity; // Total Value 

    $query = "UPDATE product SET ProductName = ?, Quantity = ?, Price = ?, Net = ?, TotalValue = ? WHERE ID = ?";
    $statement = mysqli_prepare($conn, $query);

    if ($statement) {
        mysqli_stmt_bind_param($statement, 'sidddi', $updateProductName, $updateQuantity, $updatePrice, $updateNet, $updateTotalValue, $updateID);

        if (mysqli_stmt_execute($statement)) {
            // echo 'Hello World Successfully!';
        }
    }
}

<!-- ADD -->
if (isset($_POST['add'])) {
        $userID = $_POST['userID'];
        $product = $_POST['product'];        
        $stock = $_POST['stock'];        
        $price = $_POST['price'];        
        $discount = $_POST['discount'];        

        $query = "SELECT * FROM products_pos WHERE ProductName = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $product);
        $stmt->execute();
        $search = $stmt->get_result();

        if ($search->num_rows > 0) {
            $duplicateProduct = 'Duplicate Product Invalid!';
            echo $duplicateProduct;
        } else {
            $subTotal = $price * $stock;
            $subTotal = $subTotal - (($discount / 100) * $subTotal);
            $query = "INSERT INTO products_pos(User_ID, ProductName, Price, Stock, Discount, SubTotal) VALUES ('$userID', '$product', '$stock', '$price', '$discount', $subTotal)";
            $insertFields = \mysqli_query($conn, $query);
            echo $insertFields === true ? 'Successfully Inserted!' : 'Not Successfully Inserted!';
        }

    }