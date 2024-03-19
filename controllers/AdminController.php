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
    // $sql = "SELECT * FROM `danhmuc` WHERE 1";
    // $listDm = db_fetch_array($sql);
    // $data =  array(
    //     'listDm' => $listDm
    // );
    // load_view('/product/ListCategoryProduct', '_layoutAdmin', $data);
    load_view('/product/ListCategoryProduct', '_layoutAdmin');
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
    load_view('/product/ListProduct', '_layoutAdmin');
}
function Product()
{
    load_view('/product/Product', '_layoutAdmin');
}
function UpdateProduct()
{
    load_view('/product/UpdateProduct', '_layoutAdmin');
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
