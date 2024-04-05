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
    $listProduct = db_query("SELECT * FROM `Product`");
    $categoryProduct = db_query("SELECT * FROM `ProductCategory`");

    // Xử lý sắp xếp
    $sort = isset($_GET['Sort']) ? $_GET['Sort'] : '';
    if ($sort != null) {
        switch ($sort) {
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

    $model = array(
        'listProduct' => $listProduct,
        'categoryProduct' => $categoryProduct,
        'Sort' => $sort
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
    $categoryProductQuery = db_fetch_array("SELECT * FROM `ProductCategory` WHERE `ParentCategoryId` IS NULL");
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
    $id = isset($_GET['Id']) ? $_GET['Id'] : '';
    $sql = "SELECT * FROM product WHERE Id = '$id'";
    $productDetail = db_fetch_row($sql);
    $products = db_query("SELECT * FROM product WHERE ProductCategoryId = '$productDetail[ProductCategoryId]'");
    $categoryProduct = db_query("SELECT * FROM `ProductCategory`");
    $id = $_SESSION['auth']['member']['Id'] ?? null;
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
// function ProductCategory(){
//     $id = isset($_GET['Id']) ? $_GET['Id'] : '';
//     $sort = isset($_GET['Sort']) ? $_GET['Sort'] : '';
    
//     if ($id !== '') {
//         $sql = db_fetch_row("SELECT * FROM productcategory WHERE Id = ?", [$id]);
//         if ($sql) {
//             $products = db_query("SELECT * FROM product WHERE ProductCategoryId = ? ORDER BY Name ASC", [$sql['Id']]);
//             if ($sort != null) {
//                 switch ($sort) {
//                     case 1:
//                         $products = db_query("SELECT * FROM product WHERE ProductCategoryId = ? ORDER BY Name ASC", [$sql['Id']]);
//                         break;
//                     case 2:
//                         $products = db_query("SELECT * FROM product WHERE ProductCategoryId = ? ORDER BY Name DESC", [$sql['Id']]);
//                         break;
//                     case 3:
//                         $products = db_query("SELECT * FROM product WHERE ProductCategoryId = ? ORDER BY PriceSale ASC, Price ASC", [$sql['Id']]);
//                         break;
//                     case 4:
//                         $products = db_query("SELECT * FROM product WHERE ProductCategoryId = ? ORDER BY PriceSale DESC, Price DESC", [$sql['Id']]);
//                         break;
//                 }
//             } 
//             $categoryProduct = db_query("SELECT * FROM `ProductCategory`");
//             $model = array(
//                 'products' => $products,
//                 'Category' => $sql,
//                 'categoryProduct' => $categoryProduct,
//                 'Sort' => $sort
//             );
//             load_view('home/ProductCategory', '_layout', $model);
//         } else {
//             echo "Lỗi: Không tìm thấy danh mục sản phẩm.";
//         }
//     } else {
//         echo "Lỗi: Thiếu thông tin Id của danh mục sản phẩm.";
//     }
// }

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
    $categoryProduct = db_fetch_array("SELECT * FROM `ProductCategory` WHERE `ParentCategoryId` IS NULL");
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

function Comment(){
    $id = isset($_GET['userId']) ? $_GET['userId'] : '';
    $content = isset($_GET['content']) ? $_GET['content'] : '';

}
