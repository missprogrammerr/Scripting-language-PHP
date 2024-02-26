<?php
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
            $sql = "insert into tbl_products
             (name,price,quantity) values ('$name',$price,$quantity)";
            mysqli_query($connection,$sql);
            echo "Product created";
        }catch(Exception $ex){
            die('Database Error:' . $ex->getMessage());
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
</head>
<body>
    <h1>Insert Product</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter name">
        <?php echo isset($err['Name'])?$err['Name']:''; ?>
        <br>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" placeholder="Enter price">
        <?php echo isset($err['Price'])?$err['Price']:''; ?>
        <br>
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" id="quantity" placeholder="Enter quantity">
        <?php echo isset($err['Quantity'])?$err['Quantity']:''; ?>
        <br>
        <input type="submit" name="btnSave" value="Save Product" />
    </form>
</body>
</html>

