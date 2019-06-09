<?php

$directory = 'products/';

// good habit to make output with success key. 
$output = [
    'success' => false
];

if(empty($_GET['product-type'])){
    $file_name = 'cupcakes';
}else{
    $file_name = $_GET['product-type'];
};

// $file_name = 'cupcakes.php';
$full_path = $directory.$file_name.'.php';

// commented out to use fetch
// echo "<h1>The full path: $full_path</h1>";

if(file_exists($full_path)){
    // commented out to use fetch
    // echo '<h1>Product file exists</h1>';
    $product_file = fopen($full_path, 'r');
    $file_contents = fread($product_file, filesize($full_path));
    $products = json_decode($file_contents, true);
   
    $output['products'] = $products;
    $output['success'] = true;

    // commented out to use fetch
    // echo '<pre>';
    // print_r($products);
    // echo '</pre>';
}else{
    $output['error'] = "No products of type $file_name found";
    // commented out to use fetch
    // echo "<h1>No products of type $file_name found</h1>";
};


print(json_encode($output));

// commented out to use fetch
// echo '<h1>Get all products</h1>';