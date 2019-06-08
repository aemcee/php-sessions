<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP | File Operations and Endpoints</title>
    <script src="assests/main.js"></script>
</head>
<body>
    <h1>PHP File Operations and Endpoints</h1>
    <form action="add_product.php" method="post">
        <h3>Add New Product</h3>
        <div>
            <label for="name">Product Name</label>
            <input type="text" name="name">
            <!-- name needs to match server name -->
        </div>
        <div>
            <label for="cost">Product Cost</label>
            <input type="number" name="cost">
        </div>
        <button>Add Item</button>
        <?php if(!empty($_GET['msg'])): // if get msg is not empty ?>
            <p type="color: green"><?= $_GET['msg'] ?></p>
        <?php endif; ?>
        <?php if(!empty($_GET['error'])): // if get error is not empty ?>
            <p type="color: red"><?= $_GET['error'] ?></p>
        <?php endif; ?>
    </form>
</body>
</html>