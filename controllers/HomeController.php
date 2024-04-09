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
    $categoryProduct = db_fetch_array("SELECT * FROM `ProductCategory` WHERE `ParentCategoryId` IS NULL");

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
    foreach ($categoryProduct as $parent) {

        $ParentCategoryId = $parent['Id'];

        $categories[] = [
            "parent" => $parent,
            "children" => db_fetch_array("SELECT * FROM ProductCategory WHERE ParentCategoryId='$ParentCategoryId'")
        ];
    }
    $model = array(
        'listProduct' => $listProduct,
        'categories' => $categories,
        'Sort' => $sort
    );

    load_view('home/product', '_layout', $model);
}

function ProductDetail()
{
    $Userid = $_SESSION['auth']['member']['Id'] ?? 0;
    $id = isset($_GET['Id']) ? $_GET['Id'] : 0;
    $sql = "SELECT * FROM product WHERE Id = '$id'";
    $productDetail = db_fetch_row($sql);
    $cate_id = $productDetail['ProductCategoryId'];
    $checkorder = db_fetch_row("SELECT orders.id, orders.status, order_details.*
    FROM orders
    JOIN order_details ON orders.id = order_details.order_id
    WHERE orders.user_id = $Userid AND orders.status = 'completed' AND order_details.product_id = $id");
    $checkComment = db_num_rows("SELECT `Id` FROM `comments` WHERE `UserId` = $Userid AND `ProductId` = $id");
    $products = db_query("SELECT * FROM product WHERE ProductCategoryId = '$cate_id'");
    $commet =  db_query("SELECT comments.*, users.FullName as fullname FROM comments JOIN users ON comments.UserId = users.Id WHERE ProductId = '$id'");
    $categoryProduct = db_fetch_array("SELECT * FROM `ProductCategory` WHERE `ParentCategoryId` IS NULL");
    $id = $_SESSION['auth']['member']['Id'] ?? null;

    foreach ($categoryProduct as $parent) {

        $ParentCategoryId = $parent['Id'];

        $categories[] = [
            "parent" => $parent,
            "children" => db_fetch_array("SELECT * FROM ProductCategory WHERE ParentCategoryId='$ParentCategoryId'")
        ];
    }
    if ($productDetail) {
        $model = array(
            'productDetail' => $productDetail,
            'products' => $products,
            'categories' => $categories,
            'userId' =>  $Userid,
            'checkOrder' => $checkorder,
            'checkComment' => $checkComment,
            'comment'  => $commet
        );
        load_view('home/ProductDetail', '_layout', $model);
    } else {
        echo "Sản phẩm không tồn tại";
    }
}
function ProductCategory()
{
    $id = isset($_GET['Id']) ? $_GET['Id'] : '';
    $sort = isset($_GET['Sort']) ? $_GET['Sort'] : '';
    $sql = db_fetch_row("SELECT * FROM productcategory WHERE Id = '$id'");
    $products = db_query("SELECT * FROM product WHERE ProductCategoryId = '$sql[Id]'");
    $categoryProduct = db_fetch_array("SELECT * FROM `ProductCategory` WHERE `ParentCategoryId` IS NULL");
    if ($sort != null) {
        switch ($sort) {
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
    foreach ($categoryProduct as $parent) {

        $ParentCategoryId = $parent['Id'];

        $categories[] = [
            "parent" => $parent,
            "children" => db_fetch_array("SELECT * FROM ProductCategory WHERE ParentCategoryId='$ParentCategoryId'")
        ];
    }
    $model = array(
        'products' => $products,
        'Category' => $sql,
        'categories' => $categories,
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

function Comment()
{
    $id = isset($_POST['userId']) ? $_POST['userId'] : 0;
    $productId = isset($_POST['productId']) ? $_POST['productId'] : 0;

    $row = db_num_rows("SELECT `Id` FROM `comments` WHERE `UserId` = $id AND `ProductId` = $productId");

    if ($row == 0) {
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $createdAt = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `comments` 
            (`Content`, `UserId`, `ProductId`, `CreatedAt`) 
            VALUES ('$content', '$id' ,'$productId','$createdAt')";
        db_query($sql);

        header("Location: ?controller=Home&action=ProductDetail&Id=$productId");
        exit;
    }

    echo "Bạn đã hết lượt bình luận";
}


function edit_cmt()
{
    $id = $_GET['id'] ?? 0;
    $cmt = db_fetch_row("SELECT * FROM `comments` WHERE `Id` = $id");

    $data = array(
        'cmt' => $cmt
    );
    load_view('home/edit_cmt', '_layoutNone', $data);
}


function update_cmt()
{
    $id = $_POST['id'] ?? 0;
    $product_id = $_POST['product_id'] ?? 0;
    $content = $_POST['content'] ?? null;

    $data = array(
        'Content' => $content
    );

    db_update('comments', $data, "`Id` = $id");

    header("Location: ?controller=home&action=ProductDetail&Id=$product_id");
}

function delete_cmt()
{
    $id = $_GET['id'] ?? 0;
    $product_id = $_GET['product_id'] ?? 0;

    db_delete("comments", "`Id` = $id");

    header("Location: ?controller=home&action=ProductDetail&Id=$product_id");
}
