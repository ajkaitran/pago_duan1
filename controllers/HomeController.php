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
    $categoryProduct = db_fetch_array("SELECT * FROM `ProductCategory` WHERE `ParentCategoryId` = 0");

    $categories = [];

    foreach ($categoryProduct as $parent) {

        $ParentCategoryId = $parent['Id'];

        $categories[] = [
            "parent" => $parent,
            "children" => db_fetch_array("SELECT * FROM ProductCategory WHERE ParentCategoryId='$ParentCategoryId'")
        ];
    }

    $model =  array(
        'listProduct' => $listProduct,
        'categories' => $categories
    );
    load_view('home/product', '_layout', $model);
}
function ProductCategory()
{
    $url = isset($_GET['url']) ? $_GET['url'] : '';

    $catQuery = "SELECT * FROM `productcategory` WHERE slug = '$url'";
    $catResult = db_fetch_array(db_query($catQuery));
    $categoryId = $catResult['id'];
    $productQuery = "SELECT * FROM `productcategory` WHERE ProductCategoryId = $categoryId";
    $productResult = db_query($productQuery);
    $categoryProductQuery = db_fetch_array("SELECT * FROM `ProductCategory` WHERE `ParentCategoryId` = 0");
    $categoryProductResult = db_query($categoryProductQuery);
    foreach ($categoryProductQuery as $parent) {

        $ParentCategoryId = $parent['Id'];

        $categories[] = [
            "parent" => $parent,
            "children" => db_fetch_array("SELECT * FROM ProductCategory WHERE ParentCategoryId='$ParentCategoryId'")
        ];
    }
    $model = array(
        'listProduct' => $productResult,
        'categoryProduct' => $categoryProductResult,
        'categories' => $categories
    );
    load_view('home/ProductCategory', '_layout', $model);
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
    $categoryProduct = db_fetch_array("SELECT * FROM `ProductCategory` WHERE `ParentCategoryId` = 0");
    foreach ($categoryProduct as $parent) {

        $ParentCategoryId = $parent['Id'];

        $categories[] = [
            "parent" => $parent,
            "children" => db_fetch_array("SELECT * FROM ProductCategory WHERE ParentCategoryId='$ParentCategoryId'")
        ];
    }
    $model =  array(
        'listProduct' => $listProduct,
        'categoryProduct' => $categoryProduct,
        'categories' => $categories
    );
    load_view('home/Search', '_layout', $model);
}


