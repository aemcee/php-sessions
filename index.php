<?php
    session_start();

    function print_message($message, $is_error = false){
        $color = $is_error ? 'red' : 'green';
        echo "<p style=\"color: $color\">$message</p>";
    };

    function print_error_list($list){
        foreach($list as $message){
            print_message($message, true);
        };
    };
?>

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
    <h1>PHP Sessions</h1>
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

        <?php 
            if(isset($_SESSION['message'])){
                print_message($_SESSION['message']);
                unset($_SESSION['message']);
            }elseif(isset($_SESSION['errors'])){
                print_error_list($_SESSION['errors']);
                unset($_SESSION['errors']);
            }

            // session_destroy();
        ?>

        <!-- <?php if(!empty($_GET['msg'])): // if get msg is not empty ?>
            <p style="color: green"><?= $_GET['msg'] ?></p>
        <?php endif; ?>
        <?php if(!empty($_GET['error'])): // if get error is not empty ?>
            <p style="color: red"><?= $_GET['error'] ?></p>
        <?php endif; ?> -->

    </form>
</body>
</html>