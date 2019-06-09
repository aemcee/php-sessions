<?php 

session_start();

// create directory variable
$directory = 'products/';
$output = [
    'success' => false
];

// check if product-type is in URL query string, if so get value
if(!empty($_GET['product-type'])){
    $file_name = $_GET['product-type'];
}else{ // else assign default value of cupcakes
    $file_name = 'cupcakes';
}

// create a full path variable that will utilize the product type received from the URL query string
$full_path = $directory.$file_name.'.php';

// $file_name = 'cupcakes.php';
// $full_path = $directory.$file_name; // . is concat

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// exit;

// empty check if array has a value. need to use empty when using php
// always check data given from the front end and include error handling
if(!empty($_POST['name'])){
    $product_name = $_POST['name'];
}else{
    // echo '<h1>No product name provided</h1>';
    // exit;

    // push into an array on php
    $output['errors'][] = 'Can not create a new product without a name'; 
}

// check if cost exits and if it is a number
if(!empty($_POST['cost']) && is_numeric($_POST['cost'])){
    $product_cost = (int) $_POST['cost'];
}else{
    // echo '<h1>No valid product cost provided</h1>';
    // exit;

    // push into an array on php
    $output['errors'][] = 'No cost provided'; 
};

// at this point is the end of the checks, below is the do section that we implement if the data provided is correct

// if count is empty then do the below
if(empty($output['errors'])){

    // exit; 

    // Temp Dummy Data
    // $product_name = 'Test Cupcake';
    // $product_cost = 350;

    // Generating ID, not proper
    $product_id = time();

    // if(file_exists($directory)){
    //     echo "<h1>Found the $directory directory</h1>";
    // }else{
    //     echo "<h1>Directory not found, creating $directory</h1>";
    //     mkdir($directory);
    // };

    if(!file_exists($directory)){
        mkdir($directory);
    };

    $products = [];

    // see if products file exhists
    if(file_exists($full_path)){
        // Found File, read data from file
        // Set contents of file to $products
        // echo "<h1>Found existing products</h1>";

        // save file size
        $file_size = filesize($full_path);
        
        // if the file size isn't 0
        if($file_size){

            // just gives us pointer, open stream to read
            $product_file = fopen($full_path, 'r');

            // get content, read content
            $file_contents = fread($product_file, $file_size);

            // will decode into a class structure but we want an associative array, therefore 2nd argument, true
            $products = json_decode($file_contents, true);

            // echo "<pre>";
            // print_r($products);
            // echo "</pre>";
        };

    };

    // add product with product id and proudct name and product cost from URL query string
    $products[$product_id] = [
        'name' => $product_name,
        'cost' => $product_cost
    ];

    // open file
    $product_file = fopen($full_path, 'w');

    // write to file
    fwrite($product_file, json_encode($products)); 

    $output['success'] = true;
    $output['message'] = "Added new $file_name product: $product_name";
    // echo "<h1>New Product added successfully</h1>";

    //    $directory_exists = (int) file_exists($directory);
    //    echo "<h1>Directory Exists: $directory_exists</h1>"

    //    $products_file = fopen($full_path, 'r'); // 'r' open in read only mode

    //    $file_size = filesize($full_path);

    //    echo "<h1>File Size: $file_size</h1>"
};

if($output['success']){
    $_SESSION['message'] = $output['message'];
}else{
    $_SESSION['errors'] = $output['errors'];
};

header('location: index.php');
// print, if your output is not just json then weird things will happen 
// print json_encode($output);

?>