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
        if($img != null) {
            $uploadFile = './public/uploads/AnhDanhMuc/'.$img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }
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
        if($img != null) {
            $uploadFile = './public/uploads/AnhDanhMuc/'.$img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }
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
        if($img != null) {
            $uploadFile = './public/uploads/AnhSanPham/'.$img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }
        $gia = isset($_POST['gia']) ? $_POST['gia'] : null;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : null;
        $giasale = isset($_POST['giasale']) ? $_POST['giasale'] : null;
        $date = date("Y-m-d H:i:s");
        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        $sql = "INSERT INTO `product`( `Name`, `Des`, `Image`, `Slug`, `Price`, `PriceSale`, `Active`, `CreatedAt`, `ProductCategoryId`) VALUES ('$name','$desc','$img','$slug',$gia,$giasale,1,'$date',$dm)";
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
        $date = date("Y-m-d H:i:s");
        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $img = isset($_POST['img']) && ($_POST['img'] != '') ? $_POST['img'] : $_POST['imgOld'];
        if($img != null) {
            $uploadFile = './public/uploads/AnhSanPham/'.$img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }
        $sql = "UPDATE `product` SET `Name`='$name',`Des`='$desc',`Image`='$img',`Slug`='$slug',`Price`='$gia',`PriceSale`='$giasale',`Active`= 1,`CreatedAt`='$date',`ProductCategoryId`='$dm' WHERE Id = $id";
        db_query($sql);
        header("Location: ?controller=admin&action=ListProduct");
    }
}

function DeleteProduct() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    db_delete('product', "Id = $id");
    header("Location: ?controller=admin&action=ListProduct");

}


// Article

function CategoryArticle()
{
    
    load_view('article/CategoryArticle', '_layoutAdmin');
}
function AddCategoryArticle() {
    if(isset($_POST['them'])) {
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : null;
        $img = isset($_FILES['img']) ? $_FILES['img']['name'] : null;
        if($img != null) {
            $uploadFile = './public/uploads/AnhDMBaiViet/'.$img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }
        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
        $arr = array(
            'Title' => $title,
            'Des' => $desc,
            'Image' => $img,
            'Slug' => $slug,
        );
        db_insert('articlecategories', $arr);
        header("Location: ?controller=admin&action=ListCategoryArticle");
    }
}

function ListCategoryArticle()
{   
    $sql = "SELECT * FROM `articlecategories` WHERE 1";
    $listDm = db_query($sql);
    $data =  array(
        'listDm' => $listDm
    );
    load_view('article/ListCategoryArticle', '_layoutAdmin', $data);
}
function UpdateCategoryArticle()
{   
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `articlecategories` WHERE Id = $id";
        $cate = db_fetch_row($sql);
        $data =  array(
            'cate' => $cate,
        );
    }
    load_view('article/UpdateCategoryArticle', '_layoutAdmin', $data);
}

function EditCategoryArticle() {
    if(isset($_POST['sua'])) {
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $desc = isset($_POST['des']) ? $_POST['des'] : null;
        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $img = (isset($_FILES['img']) && $_FILES['img']['name'] != '') ? $_FILES['img']['name'] : $_POST['imgOld'];
        if($img != null) {
            $uploadFile = './public/uploads/AnhDMBaiViet/'.$img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }
        $sql = "UPDATE `articlecategories` SET `Title`='$title',`Des`='$desc',`Image`='$img',`Slug`='$slug' WHERE Id = $id";
        db_query($sql);
        header("Location: ?controller=admin&action=ListCategoryArticle");
    }
}

function DeleteCategoryArticle() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    db_delete('articlecategories', "Id = $id");
    header("Location: ?controller=admin&action=ListCategoryArticle");

}


//  Article

function Article()
{   
    $sql = "SELECT * FROM `articlecategories` WHERE 1";
    $listDm = db_query($sql);
    $data =  array(
        'listDm' => $listDm
    );
    load_view('article/Article', '_layoutAdmin', $data);
}
function AddArticle() {
    if(isset($_POST['them'])) {
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $content = isset($_POST['content']) ? $_POST['content'] : null;
        $img = isset($_FILES['img']) ? $_FILES['img']['name'] : null;
        $date = date("Y-m-d H:i:s");
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        if($img != null) {
            $uploadFile = './public/uploads/AnhBaiViet/'.$img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }
        $arr = array(
            'Title' => $title,
            'Content' => $content,
            'Image' => $img,
            'CreatedAt' => $date,
            'ArticleCategoryId' => $dm,
        );
        db_insert('articles', $arr);
        header("Location: ?controller=admin&action=ListArticle");
    }
}

function ListArticle()
{   
    $sql = "SELECT * FROM `articles` WHERE 1";
    $listAr = db_query($sql);
    $data =  array(
        'listAr' => $listAr
    );
    load_view('article/ListArticle', '_layoutAdmin', $data);
}
function UpdateArticle()
{   
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `articles` WHERE Id = $id";
        $sql2 = "SELECT * FROM `articlecategories` WHERE 1";
        $articles = db_fetch_row($sql);
        $listDm = db_query($sql2);
        $data =  array(
            'articles' => $articles,
            'listDm' => $listDm
        );
    }
    load_view('article/UpdateArticle', '_layoutAdmin', $data);
}

function EditArticle() {
    if(isset($_POST['sua'])) {
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $content = isset($_POST['content']) ? $_POST['content'] : null;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        $date = date("Y-m-d H:i:s");
        $img = (isset($_FILES['img']) && $_FILES['img']['name'] != '') ? $_FILES['img']['name'] : $_POST['imgOld'];
        if($img != null) {
            $uploadFile = './public/uploads/AnhBaiViet/'.$img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }
        $sql = "UPDATE `articles` SET `Title`='$title',`Content`='$content',`Image`='$img',`CreatedAt`='$date',`ArticleCategoryId`='$dm' WHERE Id = $id";
        db_query($sql);
        header("Location: ?controller=admin&action=ListArticle");
    }
}

function DeleteArticle() {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    db_delete('articles', "Id = $id");
    header("Location: ?controller=admin&action=ListArticle");

}





// admin
function UpdatePassword()
{
    load_view('admin/UpdatePassword', '_layoutAdmin');
}
function ListAdmin()
{
    load_view('admin/ListAdmin', '_layoutAdmin');
}



//service
function CategoryService()
{
    load_view('service/CategoryService', '_layoutAdmin');
}
function ListCategoryService()
{
    load_view('service/ListCategoryService', '_layoutAdmin');
}
function UpdateCategoryService()
{
    load_view('service/UpdateCategoryService', '_layoutAdmin');
}
function Service()
{
    load_view('service/Service', '_layoutAdmin');
}
function ListService()
{
    load_view('service/ListService', '_layoutAdmin');
}
function UpdateService()
{
    load_view('service/UpdateService', '_layoutAdmin');
}


//comment
function Comment()
{
    load_view('comment/Comment', '_layoutAdmin');
}
//stalistical
function Statistical()
{
    load_view('statistical/Statistical', '_layoutAdmin');
}
