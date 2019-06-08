<?php

$directory = 'products/';
$output = [
    'success' => false
];

// verify correct GET data is received
$product_type = $_GET['product-type'];
$product_id = $_GET['product-id'];

if(empty($product_type)){
    $file_type = 'cupcakes';
}else{
    $file_type = $product_type;
};

if(empty($product_id)){
    $file_id = '1234';
}else{
    $file_id = $product_id;
};

// build the filepath
$full_path = $directory.$file_type.'.php';

// echo "<h1>The full path: $full_path</h1>";

// check if the file exits
if(file_exists($full_path)){
    $product_file = fopen($full_path, 'r');
    $file_contents = fread($product_file, filesize($full_path));   
    $product = json_decode($file_contents, true);
    // echo '<pre>';
    // print_r($product[$file_id]);
    // echo '</pre>';

    $output['product'] = $product[$file_id];
    $output['success'] = true;

}else{
    // echo '<h1>No product found or invalid product id</h1>';
    $output['error'] = "No products of type $file_type found";
};

print(json_encode($output));

// if file exists read data and convert to an associative array
// use $product_id to find specific product
// if product found print it
// if no product found print invalid product id

// if no file then print no file found