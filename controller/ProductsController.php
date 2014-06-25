<?php
session_start();
require_once('../model/db.mysql.php');
require_once('../model/Product.php');

if (isset($_POST['category'])) {
    $category = $_POST['category'];
} else if (isset($_GET['category'])) {
    $category = $_GET['category'];
} else {
    $category = 'no_category';
}

$category = strtolower($category);

switch ($category) {
	case 'no_category':
		header('Location: ../index.php');
		break;

	case 'brand':
		$title = str_replace("_"," ",$_GET['title']);
		$array = get_product_by_brand($title);
		$_SESSION['result'] = $array;
		$_SESSION['product_count'] = count($array);
		$_SESSION['category_title'] = $title." Shoes";
		header('Location: ../product.php');
		break;

	case 'style':
		$title = str_replace("_"," ",$_GET['title']);
		$array = get_product_by_style($title);
		$_SESSION['result'] = $array;
		$_SESSION['product_count'] = count($array);
		$_SESSION['category_title'] = $title." Shoes";
		header('Location: ../product.php');
		break;

	case 'sale':
		$title = str_replace("_"," ",$_GET['title']);
		$array = get_product_by_sale($title);
		$_SESSION['result'] = $array;
		$_SESSION['product_count'] = count($array);
		$_SESSION['category_title'] = $title." Sale";
		header('Location: ../product.php');
		break;

	case 'new_arrivals':
		$title = str_replace("_"," ",$_GET['title']);
		$array = get_product_by_new_arrivals();
		$_SESSION['result'] = $array;
		$_SESSION['product_count'] = count($array);
		$_SESSION['category_title'] ="New Arrivals";
		header('Location: ../product.php');
		break;

	case 'details':
		$pid = $_GET['pid'];
		$array = get_product_details($pid);
		$_SESSION['details'] = $array;
		header('Location: ../product_details.php');
		break;

	/* For searching product in the main page */
	case 'product_search':
		$keyword = $_POST['search'];
		if(!empty($keyword)) {
			$results = get_search_results($keyword);
			$_SESSION['result'] = $results;
			$_SESSION['product_count'] = count($results);
			$_SESSION['category_title'] = "Search Results of \"".$keyword."\"";
			header('Location: ../product.php');		
			exit;	
		} else {
			header('Location: ../index.php');  // Input is empty then redirect to main page
			exit;
		}
		break;
}



?>