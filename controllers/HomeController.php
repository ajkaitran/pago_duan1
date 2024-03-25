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

