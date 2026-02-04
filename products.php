<?php
header(’Content-Type: application/json’);
header(’Access-Control-Allow-Origin: *’);
require once ‘../db_connect.php’;
check_api_key($env);

$method =$_SERVER[REQUEST_METHOD’];

if ($method == ’GET’) :

$query = ‘SELECT p.id, p.name, p.base_proce FROM products p’;
if(isset($_GET [’category’])) {

$category = $connection →real_escape_string ($_GET[’category’]);

$query . =. “JOIN product_categories pc ON [p.id](http://p.id) = pc.product_id

JOIN categories c ON [pc.category.id](http://pc.category.id) = c.id

WHERE [c.name](http://c.name) = ‘$category’

“;

}

$result =. $connection→query($query);

$products = [];

while ($row = $result→fetch_assoc()){

$products[] = $row;

}

echo json_encode (['success’ ⇒true, ‘data’ ⇒$products]);

elseif ($method ==='POST’);

$data = json_decode(file_get_contents('php://input’), true);

if (!isset($data['name’]) || !isset ($data[’base_price’]))(

echo:json_encode (['error ⇒ Bad Request’, ‘details’ ⇒ ‘Missing required fields’]);

exit;

}

#name = $connection →real 

$price = floatval($data [base_price])
}
>