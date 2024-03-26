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
    $listSp = db_query($sql);
    $data =  array(
        'listSp' => $listSp
    );
    load_view('home/index', '_layout', $data);
}

function product()
{
    $product = "SELECT Product.* FROM `Product` JOIN `ProductCategory` ON product.ProductCategoryId  = productcategory.Id";
    $listProduct = db_query($product);
    $categoryProduct = db_query("SELECT * FROM `ProductCategory`");
    $model =  array(
        'listProduct' => $listProduct,
        'categoryProduct' => $categoryProduct
    );
    load_view('home/product', '_layout', $model);
}
function ProductDetail()
{
    load_view('home/ProductDetail');
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
    $sql = "SELECT * FROM product WHERE Name LIKE '%" . $keyword . "%'";
    $listProduct = db_query($sql);
    $categoryProduct = db_query("SELECT * FROM `ProductCategory`");
    
    $model =  array(
        'listProduct' => $listProduct,
        'categoryProduct' => $categoryProduct
    );
    load_view('home/Search' , '_layout', $model);
}

function ProductCategory() {
    $url = isset($_GET['url']) ? $_GET['url'] : '';
    
    $catQuery = "SELECT * FROM `productcategory` WHERE slug = '$url'";
    $catResult = db_fetch_assoc(db_query($catQuery)); 
    $categoryId = $catResult['id'];
    $productQuery = "SELECT * FROM `productcategory` WHERE ProductCategoryId = $categoryId";
    $productResult = db_query($productQuery);
    $categoryProductQuery = "SELECT * FROM `ProductCategory`";
    $categoryProductResult = db_query($categoryProductQuery);
    $model = array(
        'listProduct' => $productResult,
        'categoryProduct' => $categoryProductResult
    );
    load_view('home/ProductCategory', '_layout', $model);
}


    