<?php

function construct()
{
}

function index()
{
    $sql = "SELECT sp.*, dm.Name  AS ten_danhmuc 
    FROM `product` sp 
    JOIN `productcategory` dm ON sp.ProductCategoryId  = dm.Id
    ";
    $categoryProduct = db_query("SELECT * FROM `ProductCategory`");
    $listSp = db_query($sql);
    $data =  array(
        'listSp' => $listSp,
        'categoryProduct' => $categoryProduct,
    );
    load_view('home/index', '_layout', $data);
}

function product()
{
    $product = "SELECT * FROM `Product`";
    $listProduct = db_query($product);
    $categoryProduct = db_query("SELECT * FROM `ProductCategory`");
    $sort = isset($_GET['Sort']) ? $_GET['Sort'] : '';
    if($sort != null){
        switch($sort){
            case 1:
                $listProduct = db_query("SELECT * FROM Product ORDER BY Name ASC");
                break;
            case 2:
                $listProduct = db_query("SELECT * FROM Product ORDER BY Name DESC");
                break;
            case 3:
                $listProduct = db_query("SELECT * FROM Product ORDER BY PriceSale ASC, Price ASC");
                    break;
            case 4:
                $listProduct = db_query("SELECT * FROM Product ORDER BY PriceSale DESC, Price DESC");
                break;
        }  
    } 
    $model =  array(
        'listProduct' => $listProduct,
        'categoryProduct' => $categoryProduct,
        'Sort' => $sort
    );
    load_view('home/product', '_layout', $model);
}
function ProductDetail()
{
    $id = isset($_GET['Id']) ? $_GET['Id'] : '';
    $sql = "SELECT * FROM product WHERE Id = '$id'";
    $productDetail = db_fetch_row($sql);
    $products = db_query("SELECT * FROM product WHERE ProductCategoryId = '$productDetail[ProductCategoryId]'");
    $categoryProduct = db_query("SELECT * FROM `ProductCategory`");
    $id = $_SESSION['user']['Id'] ?? null;
    if ($productDetail) {
        $model = array(
            'productDetail' => $productDetail,
            'products' => $products,
            'categoryProduct' => $categoryProduct,
            'userId' =>  $id
        );
        load_view('home/ProductDetail', '_layout', $model);
    } else {
        echo "Sản phẩm không tồn tại";
    }
}

function ProductCategory(){
    $id = isset($_GET['Id']) ? $_GET['Id'] : '';
    $sort = isset($_GET['Sort']) ? $_GET['Sort'] : '';
    $sql = db_fetch_row("SELECT * FROM productcategory WHERE Id = '$id'");
    $products = db_query("SELECT * FROM product WHERE ProductCategoryId = '$sql[Id]'");
    $categoryProduct = db_query("SELECT * FROM `ProductCategory`");
    if($sort != null){
        switch($sort){
            case 1:
                $products = db_query("SELECT * FROM product WHERE ProductCategoryId = '$sql[Id]' ORDER BY Name ASC");
                break;
            case 2:
                $products = db_query("SELECT * FROM product WHERE ProductCategoryId = '$sql[Id]' ORDER BY Name DESC");
                break;
            case 3:
                $products = db_query("SELECT * FROM product WHERE ProductCategoryId = '$sql[Id]' ORDER BY PriceSale ASC, Price ASC");
                    break;
            case 4:
                $products = db_query("SELECT * FROM product WHERE ProductCategoryId = '$sql[Id]' ORDER BY PriceSale DESC, Price DESC");
                break;
        }  
    } 
    $model = array(
        'products' => $products,
        'Category' => $sql,
        'categoryProduct' => $categoryProduct,
        'Sort' => $sort
    );
    load_view('home/ProductCategory', '_layout', $model);
}
function introduce()
{
    load_view('home/introduce');
}
function service()
{
    load_view('home/service');
}
function article()
{
    load_view('home/article');
}
function ArticleDetail()
{
    load_view('home/ArticleDetail');
}
function library()
{
    load_view('home/library');
}

function Search()
{
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    echo($keyword);
    $sql = "SELECT * FROM product WHERE Name LIKE '%" . $keyword . "%'";
    $listProduct = db_query($sql);
    $categoryProduct = db_query("SELECT * FROM `ProductCategory`");
    
    $model =  array(
        'listProduct' => $listProduct,
        'categoryProduct' => $categoryProduct
    );
    load_view('home/Search' , '_layout', $model);
}
function Comment(){
    $id = isset($_GET['userId']) ? $_GET['userId'] : '';
    $content = isset($_GET['content']) ? $_GET['content'] : '';

}