<?php

function construct()
{
}
function login()
{
    $username = isset($_POST['Username']) ? $_POST['Username'] : null;
    $password = isset($_POST['Password']) ? $_POST['Password'] : null;

    if ($username && $password) {
        $hashed_password = md5($password);

        $user = db_fetch_row("SELECT * FROM `Admins` WHERE `Username` = '$username' AND `Password` = '$hashed_password'");

        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: ?controller=admin&action=index");
            exit;
        } else {
            echo "Lỗi: Tên người dùng hoặc mật khẩu không đúng.";
            load_view('admin/login','_layoutNone');
        }
    } else {
        echo "Lỗi: Vui lòng điền đầy đủ thông tin.";
        load_view('admin/login','_layoutNone');
    }
}


function logout()
{
    if(isset($_SESSION['user']))
    {
        unset($_SESSION['user']);
        header("Location: ?controller=home&action=index");
        exit;
    }
}
function Index()
{
    load_view('/admin/Index', '_layoutAdmin');
}
function CategoryProduct()
{
    load_view('/product/CategoryProduct', '_layoutAdmin');
}
function ListCategoryProduct()
{
    $sql = "SELECT * FROM `productcategory` WHERE 1";
    $listDm = db_fetch_array($sql);
    $data =  array(
        'listDm' => $listDm
    );
    load_view('/product/ListCategoryProduct', '_layoutAdmin', $data);
}
function AddCategoryProduct() {
    if(isset($_POST['them'])) {
        $name = isset($_POST['tendm']) ? $_POST['tendm'] : null;
        $img = isset($_FILES['img']) ? $_FILES['img']['name'] : null;
        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
        $arr = array(
            'Name' => $name,
            'Image' => $img,
            'Slug' => $slug,
        );
        db_insert('productcategory', $arr);
        header("Location: ?controller=admin&action=ListCategoryProduct");
    }
}

function UpdateCategoryProduct()
{   
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $sql = "SELECT * FROM `productcategory` WHERE Id = $id";
    $danhmuc = db_fetch_row($sql);
    $data =  array(
        'danhmuc' => $danhmuc
    );
    load_view('/product/UpdateCategoryProduct', '_layoutAdmin', $data);
}
function EditCategoryProduct() {
    if(isset($_POST['sua'])) {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $name = isset($_POST['tendm']) ? $_POST['tendm'] : null;
        $img = (isset($_FILES['img']) && $_FILES['img']['name'] != '') ? $_FILES['img']['name'] : $_POST['imgOld'];
        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
        $sql = "UPDATE `productcategory` SET `Name`='$name',`Image`='$img',`Slug`='$slug' WHERE Id = $id";
        db_query($sql);
        header("Location: ?controller=admin&action=ListCategoryProduct");
    }
}

function DeleteCategoryProduct() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    db_delete('productcategory', "Id = $id");
    header("Location: ?controller=admin&action=ListCategoryProduct");

}


// PRODUCT 

function ListProduct()
{   
    $sql = "SELECT sp.*, dm.Name  AS ten_danhmuc 
    FROM `product` sp 
    JOIN `productcategory` dm ON sp.ProductCategoryId  = dm.Id
    ";
    $listSp = db_query($sql);
    $data =  array(
        'listSp' => $listSp
    );
    load_view('/product/ListProduct', '_layoutAdmin', $data);
}
function Product()
{   
    $sql = "SELECT sp.*, dm.Name  AS ten_danhmuc 
    FROM `product` sp 
    JOIN `productcategory` dm ON sp.ProductCategoryId = dm.Id
    ";

    $sql2 = "SELECT * FROM `productcategory` WHERE 1";
    $listDm = db_query($sql2);
    $listSp = db_query($sql);
    $data =  array(
        'listSp' => $listSp,
        'listDm' => $listDm
    );
    load_view('/product/Product', '_layoutAdmin', $data);
}
function AddProduct() {
    if(isset($_POST['them'])) {
        $name = isset($_POST['ten']) ? $_POST['ten'] : null;
        $img = isset($_FILES['img']) ? $_FILES['img']['name'] : null;
        $gia = isset($_POST['gia']) ? $_POST['gia'] : null;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : null;
        $giasale = isset($_POST['giasale']) ? $_POST['giasale'] : null;
        $date = isset($_POST['date']) ? $_POST['date'] : null;
        $active = isset($_POST['active']) ? $_POST['active'] : null;
        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        $sql = "INSERT INTO `product`(`Name`, `Des`, `Image`, `Slug`, `Price`, `PriceSale`, `Active`, `CreatedAt`, `ProductCategoryId`) VALUES ('$name','$desc','$img','$slug',$gia,$giasale,$active,'$date',$dm)";
        db_query( $sql);
        header("Location: ?controller=admin&action=ListProduct");
    }
}

function UpdateProduct()
{   
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `product` WHERE Id = $id";
        $sql2 = "SELECT * FROM `productcategory` WHERE 1";
        $product = db_fetch_row($sql);
        $listDm = db_query($sql2);
        $data =  array(
            'product' => $product,
            'listDm' => $listDm
        );
        load_view('/product/UpdateProduct', '_layoutAdmin', $data);
    }
}
function EditProduct() {
    if(isset($_POST['sua'])) {
        $name = isset($_POST['ten']) ? $_POST['ten'] : null;
        $gia = isset($_POST['gia']) ? $_POST['gia'] : null;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : null;
        $giasale = isset($_POST['giasale']) ? $_POST['giasale'] : null;
        $date = isset($_POST['date']) ? $_POST['date'] : null;
        $active = isset($_POST['active']) ? $_POST['active'] : null;
        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $img = isset($_POST['img']) && ($_POST['img'] != '') ? $_POST['img'] : $_POST['imgOld'];
        $sql = "UPDATE `product` SET `Name`='$name',`Des`='$desc',`Image`='$img',`Slug`='$slug',`Price`='$gia',`PriceSale`='$giasale',`Active`='$active',`CreatedAt`='$date',`ProductCategoryId`='$dm' WHERE Id = $id";
        db_query($sql);
        header("Location: ?controller=admin&action=ListProduct");
    }
}

function DeleteProduct() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    db_delete('product', "Id = $id");
    header("Location: ?controller=admin&action=ListProduct");

}

function article()
{
    load_view('article/Article', '_layoutAdmin');
}function ListArticle()
{
    load_view('article/ListArticle', '_layoutAdmin');
}function UpdateArticle()
{
    load_view('article/UpdateArticle', '_layoutAdmin');
}
