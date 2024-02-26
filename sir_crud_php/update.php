<?php
error_reporting(0);
$id = $_GET['id'];
$name = $price = $quantity =  '';
$err = [];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])){
        $name = trim($_POST['name']);
    } else {
        $err['Name'] =  'Enter name';
    }

    if(isset($_POST['price']) && !empty($_POST['price']) && trim($_POST['price'])){
        $price = trim($_POST['price']);
        if(!preg_match('/^[0-9]+$/',$price)){
            $err['Price'] = 'Price must be in valid format';
        }
    } else {
        $err['Price'] =  'Enter price';
    }

    if(isset($_POST['quantity']) && !empty($_POST['quantity']) && trim($_POST['quantity'])){
        $quantity = trim($_POST['quantity']);
        if(!preg_match('/^[0-9]+$/',$quantity)){
            $err['Quantity'] = 'Quantity must be in valid format';
        }
    } else {
        $err['Quantity'] =  'Enter quantity';
    }

    if(count($err) == 0){
        try{
            $connection = mysqli_connect('localhost','root','','db_pascal_2078_sl');
            //query to create table
            $sql = "update tbl_products set name='$name',price=$price,quantity=$quantity where id=$id";
            mysqli_query($connection,$sql);
            // echo "Product updated";
            header('location:12.list_products.php');
        }catch(Exception $ex){
            die('Database Error:' . $ex->getMessage());
        }
    }

}
try{
    $connection = mysqli_connect('localhost','root','','db_pascal_2078_sl');
    //query to create table
    $sql = "select * from tbl_products where id=$id";
    $res = mysqli_query($connection,$sql);
    //check number of rows
    $products = [];
    if(mysqli_num_rows($res) > 0){
        $row  = mysqli_fetch_assoc($res);
    } else {
        die('Data not found');
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
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $id ?>" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>" placeholder="Enter name">
        <?php echo isset($err['Name'])?$err['Name']:''; ?>
        <br>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="<?php echo $row['price'] ?>" placeholder="Enter price">
        <?php echo isset($err['Price'])?$err['Price']:''; ?>
        <br>
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" id="quantity" value="<?php echo $row['quantity'] ?>" placeholder="Enter quantity">
        <?php echo isset($err['Quantity'])?$err['Quantity']:''; ?>
        <br>
        <input type="submit" name="btnUpdate" value="Update Product" />
    </form>
</body>
</html>

