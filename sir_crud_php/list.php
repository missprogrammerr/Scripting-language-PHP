<?php
error_reporting(0);
try{
    $connection = mysqli_connect('localhost','root','','db_pascal_2078_sl');
    //query to create table
    $sql = "select * from tbl_products";
    $res = mysqli_query($connection,$sql);
    //check number of rows
    $products = [];
    if(mysqli_num_rows($res) > 0){
       while ($row  = mysqli_fetch_assoc($res)) {
        array_push($products,$row);
       }
    //    print_r($products);
    } else {
        echo 'Data not found';
    }
}catch(Exception $ex){
    die('Database Error:' . $ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Products</title>
</head>
<body>
    <h1>List Products</h1>
    <table border="1">
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <?php foreach ($products as $key => $product) { ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $product['name'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['quantity'] ?></td>
                <td>
                    <a href="12.update_product.php?id=<?php echo $product['id'] ?>" onclick="return confirm('Are you sure?')">Update</a>
                    <a href="12.delete_product.php?id=<?php echo $product['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

