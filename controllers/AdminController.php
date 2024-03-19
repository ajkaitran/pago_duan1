<?php

function construct()
{
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
    $sql = "SELECT * FROM `danhmuc` WHERE 1";
    $listDm = db_fetch_array($sql);
    $data =  array(
        'listDm' => $listDm
    );
    load_view('/product/ListCategoryProduct', '_layoutAdmin', $data);
}
function AddCategoryProduct() {
    if(isset($_POST['them'])) {
        $name = isset($_POST['tendm']) ? $_POST['tendm'] : null;
        $img = isset($_POST['img']) ? $_POST['img'] : null;
        $arr = array(
            'ten_dm' => $name,
            'img' => $img,
        );

        db_insert('danhmuc', $arr);
        header("Location: ?controller=admin&action=ListCategoryProduct");
    }
}

function UpdateCategoryProduct()
{   
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $sql = "SELECT * FROM `danhmuc` WHERE id_dm = $id";
    $danhmuc = db_fetch_row($sql);
    $data =  array(
        'danhmuc' => $danhmuc
    );
    load_view('/product/UpdateCategoryProduct', '_layoutAdmin', $data);
}
function EditCategoryProduct() {
    if(isset($_POST['sua'])) {
        $id = isset($_POST['ma']) ? $_POST['ma'] : null;
        $name = isset($_POST['tendm']) ? $_POST['tendm'] : null;
        $img = isset($_POST['img']) && ($_POST['img'] != '') ? $_POST['img'] : $_POST['imgOld'];
        $sql = "UPDATE `danhmuc` SET`ten_dm`='$name',`img`='$img' WHERE id_dm = $id";
        db_query($sql);
        header("Location: ?controller=admin&action=ListCategoryProduct");
    }
}

function DeleteCategoryProduct() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    db_delete('danhmuc', "id_dm = $id");
    header("Location: ?controller=admin&action=ListCategoryProduct");

}

function ListProduct()
{   
    $sql = "SELECT sp.*, dm.ten_dm  AS ten_danhmuc 
    FROM `sanpham` sp 
    JOIN `danhmuc` dm ON sp.id_dm = dm.id_dm
    ";
    $listSp = db_query($sql);
    $data =  array(
        'listSp' => $listSp
    );
    load_view('/product/ListProduct', '_layoutAdmin', $data);
}
function Product()
{   
    $sql = "SELECT sp.*, dm.ten_dm  AS ten_danhmuc 
    FROM `sanpham` sp 
    JOIN `danhmuc` dm ON sp.id_dm = dm.id_dm
    ";

    $sql2 = "SELECT * FROM `danhmuc` WHERE 1";
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
        $img = isset($_POST['img']) ? $_POST['img'] : null;
        $gia = isset($_POST['gia']) ? $_POST['gia'] : null;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : null;
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        $sql = "INSERT INTO `sanpham`(`name_sp`, `img`, `gia_sp`, `mota_sp`, `id_dm`) VALUES ('$name','$img',$gia,'$desc',$dm)";
        db_query( $sql);
        header("Location: ?controller=admin&action=ListProduct");
    }
}

function UpdateProduct()
{   
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `sanpham` WHERE id_sp = $id";
        $sql2 = "SELECT * FROM `danhmuc` WHERE 1";
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
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $ten = isset($_POST['ten']) ? $_POST['ten'] : null;
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        $gia = isset($_POST['gia']) ? $_POST['gia'] : null;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : null;
        $img = isset($_POST['img']) && ($_POST['img'] != '') ? $_POST['img'] : $_POST['imgOld'];
        $sql = "UPDATE `sanpham` SET `name_sp`='$ten',`img`='$img',`gia_sp`= $gia ,`mota_sp`='$desc',`id_dm`=$dm WHERE id_sp = $id";
        db_query($sql);
        header("Location: ?controller=admin&action=ListProduct");
    }
}

function DeleteProduct() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    db_delete('sanpham', "id_sp = $id");
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
