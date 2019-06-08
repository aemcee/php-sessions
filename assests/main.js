console.log('Main JS Loaded');

// fetch('http://localhost/php/file_operations/get_all_products.php').then(resp => {
//     // using two .then because .json() returns a promise as well
//     return resp.json();
// }).then(resp => {
//     console.log('Server Response: ', resp); 
// })

// alternatively 
// also fetch is slimmed down because on the same server
async function getAllProducts(){
    const resp = await fetch('get_all_products.php');
    const products = await resp.json();
    console.log('All the products', products); 
};

async function addProduct(name, cost, type="cupcakes",){

    // this was needed to doing fetch
    const postData = new URLSearchParams();

    postData.append('name', name);
    postData.append('cost', cost);

    const config = {
        method: 'POST',
        body: postData,
    };

    const resp = await fetch(`add_product.php?product-type=${type}`, config);
    const result = await resp.json();
    console.log('Add Product Result: ', result);
};

async function getProduct(productId, type='cupcakes'){
    // remember when using GET its sent via the query string
    // const getData = new URLSearchParams();
    // getData.append('productId', productId);

    const config = {
        method: 'GET',
    };

    const resp = await fetch(`get_product.php?product-type=${type}&product-id=${productId}`, config);
    const product = await resp.json();
    console.log('Found Product: ', product);
};

getProduct('1559875980');
// getAllProducts();
// addProduct('Test Fetch', 1200);