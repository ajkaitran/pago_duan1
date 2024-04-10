<?php

function construct()
{
}
function register_admin()
{
    $username = isset($_POST['Username']) ? $_POST['Username'] : null;
    $password = isset($_POST['Password']) ? $_POST['Password'] : null;

    if ($username == null || $password == null) {
        echo "Lỗi: Điền đầy đủ thông tin.";
        load_view('admin/ListAdmin');
    }
    $arr = array(
        'Username' => $username,
        'Password' => md5($password),
    );

    db_insert('Admins', $arr);

    header("Location: ?controller=admin&action=listadmin");
    exit;
}
function login()
{
    load_view('admin/login', '_layoutNone');
}

function login_admin()
{
    $username = isset($_POST['Username']) ? $_POST['Username'] : null;
    $password = isset($_POST['Password']) ? md5($_POST['Password']) : null;


    if ($username && $password) {
        $user = db_fetch_row("SELECT * FROM `admins` WHERE `Username` = '$username' AND `Password` = '$password' AND `Active` = 1");

        if (!empty($user)) {
            $_SESSION['auth']['admin'] = $user;


            header("Location: ?controller=admin&action=index");
            exit;
        }
    }

    header("Location: ?controller=admin&action=login");
}


function logout()
{
    if (isset($_SESSION['auth']['admin'])) {
        unset($_SESSION['auth']['admin']);
        header("Location: ?controller=admin&action=login");
        exit;
    }
}
function Index()
{
    authorize("admin");
    load_view('/admin/Index', '_layoutAdmin');
}
function ListCategoryProduct()
{
    authorize("admin");
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $condition = '';
    if (!empty($keyword)) {
        $condition = "AND Name LIKE '%$keyword%'";
    }
    $sql = "SELECT * FROM `productcategory` WHERE 1 $condition";
    $listDm = db_fetch_array($sql);
    $data =  array(
        'listDm' => $listDm
    );
    load_view('/product/ListCategoryProduct', '_layoutAdmin', $data);
}

function CategoryProduct()
{
    authorize("admin");
    $categories = db_fetch_array("SELECT * FROM `ProductCategory`");

    $model = array(
        'ProductCategory' => $categories
    );
    load_view('/product/CategoryProduct', '_layoutAdmin', $model);
}
function AddCategoryProduct()
{
    authorize("admin");
    if (isset($_POST['them'])) {
        $prentCategoryId = isset($_POST['dm']) ? $_POST['dm'] : null;

        $name = isset($_POST['tendm']) ? $_POST['tendm'] : null;
        $img = isset($_FILES['img']) ? $_FILES['img']['name'] : null;
        $url = isset($_POST['slug']) ? $_POST['slug'] : null;
        if ($img != null) {
            $uploadFile = './public/uploads/AnhDanhMuc/' . $img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }
        if (!empty($name)) {
            $url = convertToUnSign($name);
        } else {
            $url = convertToUnSign($url);
        }
        $arr = array(
            'ParentCategoryId' => $prentCategoryId,
            'Name' => $name,
            'Image' => $img,
            'Slug' => $url,
        );
        db_insert('productcategory', $arr);
        header("Location: ?controller=admin&action=ListCategoryProduct");
    }
}


function UpdateCategoryProduct()
{
    authorize("admin");
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $sql = "SELECT * FROM `productcategory` WHERE Id = $id";
    $parentCategory = db_fetch_array("SELECT * FROM `ProductCategory` WHERE `Id` != $id");
    $danhmuc = db_fetch_row($sql);
    $data =  array(
        'danhmuc' => $danhmuc,
        'ProductCategory' => $parentCategory
    );
    load_view('/product/UpdateCategoryProduct', '_layoutAdmin', $data);
}


function EditCategoryProduct()
{
    authorize("admin");
    if (isset($_POST['sua'])) {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $prentCategoryId = isset($_POST['dm']) ? $_POST['dm'] : NULL;
        $name = isset($_POST['tendm']) ? $_POST['tendm'] : null;
        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
        $img = (isset($_FILES['img']) && $_FILES['img']['name'] != '') ? $_FILES['img']['name'] : null;
        if (!empty($name)) {
            $slug = convertToUnSign($name);
        } else {
            $slug = convertToUnSign($slug);
        }
        $data = array(
            "ParentCategoryId" => empty($prentCategoryId) ? NULL : $prentCategoryId,
            "Name" => $name,
            "Slug" => $slug
        );

        if ($img != null) {
            $data["Image"] = $img;
            $uploadFile = './public/uploads/AnhDanhMuc/' . $img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }

        db_update("productcategory", $data, "Id = $id");
        header("Location: ?controller=admin&action=ListCategoryProduct");
    } else {
    }
}


function DeleteCategoryProduct()
{
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    db_delete('productcategory', "Id = $id");
    header("Location: ?controller=admin&action=ListCategoryProduct");
}


// PRODUCT 

function ListProduct()
{
    authorize("admin");
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $condition = '';
    if (!empty($keyword)) {
        $condition = "WHERE sp.Name LIKE '%$keyword%'";
    }
    $cat = "SELECT * FROM `productcategory`";
    $sql = "SELECT sp.*, dm.Name AS ten_danhmuc 
            FROM `product` sp 
            JOIN `productcategory` dm ON sp.ProductCategoryId = dm.Id
            $condition
            ORDER BY sp.CreatedAt DESC";
    $listSp = db_query($sql);
    $data = array(
        'listSp' => $listSp,
        'listCat' => $cat,
    );
    load_view('/product/ListProduct', '_layoutAdmin', $data);
}


function ProductDetail()
{
    authorize("admin");
    $id = isset($_GET['Id']) ? $_GET['Id'] : 0;
    $sql = "SELECT * FROM product WHERE Id = '$id'";
    $productDetail = db_fetch_row($sql);
    if ($productDetail) {
        $model = array(
            'productDetail' => $productDetail,
        );
        load_view('/product/ProductDetail', '_layoutAdmin', $model);
    } else {
        echo "Sản phẩm không tồn tại";
    }
    // load_view('/product/ProductDetail', '_layoutAdmin');
}
function Product()
{
    authorize("admin");
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
function AddProduct()
{
    authorize("admin");
    if (isset($_POST['them'])) {
        $name = isset($_POST['ten']) ? $_POST['ten'] : null;
        $imgNames = array();
        if (isset($_FILES['img'])) {
            $imgFiles = $_FILES['img'];
            $names = $imgFiles['name'];
            $types = $imgFiles['type'];
            $tmp_names = $imgFiles['tmp_name'];

            foreach ($tmp_names as $index => $tmp_name) {
                $img = $names[$index];

                if (!empty($img)) {
                    $uploadDir = './public/uploads/AnhSanPham/';
                    $uploadFile = $uploadDir . basename($img);
                    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
                    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
                    if (!in_array($imageFileType, $allowedExtensions)) {
                        echo "Chỉ cho phép tải lên các tệp ảnh có định dạng JPG, JPEG, PNG, GIF.";
                        return;
                    }

                    // Move the uploaded file to the destination directory
                    if (!move_uploaded_file($tmp_name, $uploadFile)) {
                        echo "Có lỗi xảy ra khi tải lên ảnh.";
                        return;
                    }

                    $imgNames[] = $img;
                }
            }
        }
        $imgString = implode(',', $imgNames);
        $gia = isset($_POST['gia']) ? $_POST['gia'] : null;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : null;
        $content = isset($_POST['content']) ? $_POST['content'] : null;
        $giasale = isset($_POST['giasale']) ? $_POST['giasale'] : null;
        $createdAt = date('Y-m-d H:i:s');
        $slug = convertToUnSign($name);
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        $sql = "INSERT INTO `product` 
        (`Name`, `Des`, `Content`, `Image`, `Slug`, `Price`, `PriceSale`, `Active`, `CreatedAt`, `ProductCategoryId`) 
        VALUES ('$name', '$desc', '$content', '$imgString', '$slug', $gia, $giasale, 1, '$createdAt', $dm)";
        db_query($sql);
        header("Location: ?controller=admin&action=ListProduct");
    }
}

function UpdateProduct()
{
    authorize("admin");
    if (isset($_GET['id'])) {
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
function EditProduct()
{
    authorize("admin");
    if (isset($_POST['sua'])) {
        $name = isset($_POST['ten']) ? $_POST['ten'] : null;
        $gia = isset($_POST['gia']) ? $_POST['gia'] : null;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : null;
        $content = isset($_POST['content']) ? $_POST['content'] : null;
        $giasale = isset($_POST['giasale']) ? $_POST['giasale'] : null;
        $date = date("Y-m-d H:i:s");
        $slug = convertToUnSign($name);
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $imgNames = ''; // Đưa biến $imgNames về chuỗi trống

        if (isset($_FILES['img'])) {
            $imgFiles = $_FILES['img'];
            $names = $imgFiles['name'];
            $types = $imgFiles['type'];
            $tmp_names = $imgFiles['tmp_name'];

            foreach ($tmp_names as $index => $tmp_name) {
                $img = $names[$index];

                if (!empty($img)) {
                    $uploadDir = './public/uploads/AnhSanPham/';
                    $uploadFile = $uploadDir . basename($img);
                    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
                    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
                    if (!in_array($imageFileType, $allowedExtensions)) {
                        echo "Chỉ cho phép tải lên các tệp ảnh có định dạng JPG, JPEG, PNG, GIF.";
                        return;
                    }
                    if (!move_uploaded_file($tmp_name, $uploadFile)) {
                        echo "Có lỗi xảy ra khi tải lên ảnh.";
                        return;
                    }
                    $imgNames .= $img . ',';
                }
            }
        }
        $imgNames = rtrim($imgNames, ',');

        // Nếu không có file ảnh mới được tải lên, giữ nguyên giá trị của ảnh cũ
        if (empty($imgNames)) {
            $imgNames = isset($_POST['imgOld']) ? $_POST['imgOld'] : null;
        }
        $sql = "UPDATE `product` SET `Name`='$name',`Des`='$desc', `Content`='$content',`Image`='$imgNames',`Slug`='$slug',`Price`='$gia',`PriceSale`='$giasale',`Active`= 1,`CreatedAt`='$date',`ProductCategoryId`='$dm' WHERE Id = $id";
        db_query($sql);
        header("Location: ?controller=admin&action=ListProduct");
    }
}

function DeleteProduct()
{
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    db_delete('product', "Id = $id");
    header("Location: ?controller=admin&action=ListProduct");
}


// Article

function CategoryArticle()
{
    load_view('article/CategoryArticle', '_layoutAdmin');
}
function AddCategoryArticle()
{
    if (isset($_POST['them'])) {
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $desc = isset($_POST['desc']) ? $_POST['desc'] : null;
        $img = isset($_FILES['img']) ? $_FILES['img']['name'] : null;
        if ($img != null) {
            $uploadFile = './public/uploads/AnhDMBaiViet/' . $img;
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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `articlecategories` WHERE Id = $id";
        $cate = db_fetch_row($sql);
        $data =  array(
            'cate' => $cate,
        );
    }
    load_view('article/UpdateCategoryArticle', '_layoutAdmin', $data);
}

function EditCategoryArticle()
{
    if (isset($_POST['sua'])) {
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $desc = isset($_POST['des']) ? $_POST['des'] : null;
        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $img = (isset($_FILES['img']) && $_FILES['img']['name'] != '') ? $_FILES['img']['name'] : $_POST['imgOld'];
        if ($img != null) {
            $uploadFile = './public/uploads/AnhDMBaiViet/' . $img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }
        $sql = "UPDATE `articlecategories` SET `Title`='$title',`Des`='$desc',`Image`='$img',`Slug`='$slug' WHERE Id = $id";
        db_query($sql);
        header("Location: ?controller=admin&action=ListCategoryArticle");
    }
}

function DeleteCategoryArticle()
{
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
function AddArticle()
{
    if (isset($_POST['them'])) {
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $content = isset($_POST['content']) ? $_POST['content'] : null;
        $img = isset($_FILES['img']) ? $_FILES['img']['name'] : null;
        $date = date("Y-m-d H:i:s");
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        if ($img != null) {
            $uploadFile = './public/uploads/AnhBaiViet/' . $img;
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
    if (isset($_GET['id'])) {
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

function EditArticle()
{
    if (isset($_POST['sua'])) {
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $content = isset($_POST['content']) ? $_POST['content'] : null;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $dm = isset($_POST['dm']) ? $_POST['dm'] : null;
        $date = date("Y-m-d H:i:s");
        $img = (isset($_FILES['img']) && $_FILES['img']['name'] != '') ? $_FILES['img']['name'] : $_POST['imgOld'];
        if ($img != null) {
            $uploadFile = './public/uploads/AnhBaiViet/' . $img;
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile);
        }
        $sql = "UPDATE `articles` SET `Title`='$title',`Content`='$content',`Image`='$img',`CreatedAt`='$date',`ArticleCategoryId`='$dm' WHERE Id = $id";
        db_query($sql);
        header("Location: ?controller=admin&action=ListArticle");
    }
}

function DeleteArticle()
{
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    db_delete('articles', "Id = $id");
    header("Location: ?controller=admin&action=ListArticle");
}





// admin
function UpdatePassword()
{
    authorize("admin");
    load_view('admin/UpdatePassword', '_layoutAdmin');
}
function ListAdmin()
{
    authorize("admin");
    load_view('admin/ListAdmin', '_layoutAdmin');
}

// User
function ListUser()
{
    authorize("admin");
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $condition = '';
    if (!empty($keyword)) {
        $condition = "WHERE Username LIKE '%$keyword%' OR FullName LIKE '%$keyword%' OR PhoneNumber LIKE '%$keyword%' OR Email LIKE '%$keyword%'";
    }
    $user = db_fetch_array("SELECT * FROM `users` $condition");
    $model = array(
        'users' => $user
    );
    load_view('/Admin/ListUser', '_layoutAdmin', $model);
}
function EditUser()
{
    authorize("admin");
    load_view('admin/EditUser', '_layoutAdmin');
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
    authorize("admin");
    $sql =  db_query("SELECT * FROM `comments`");
    $model = array(
        'listComment' => $sql,
    );
    load_view('comment/Comment', '_layoutAdmin', $model);
}
function DeleteComment()
{
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    db_delete('comments', "`Id` = $id");
    header("Location: ?controller=admin&action=Comment");
}
//stalistical
function Statistical()
{
    load_view('statistical/Statistical', '_layoutAdmin');
}

// order
function list_order()
{
    authorize("admin");
    global $status, $payments;

    $orders = db_fetch_array("SELECT orders.id as order_id, orders.created_at, orders.total_amount, orders.status, orders.payment, customers.*
        FROM orders
        INNER JOIN customers ON orders.customer_id = customers.id;
    ");

    // echoArray($orders);

    $data = array(
        'orders' => $orders,
        'status' => $status,
        'payments' => $payments,
    );
    load_view('order/list_order', '_layoutAdmin', $data);
}

function order_details()
{
    authorize("admin");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $order = db_fetch_row("
            SELECT orders.id as order_id, orders.created_at, orders.total_amount, orders.status, orders.payment, customers.*
            FROM orders
            INNER JOIN customers ON orders.customer_id = customers.id
            WHERE orders.id = $id
        ");

        $order_id = $order['order_id'];

        $order_items = db_fetch_array("
            SELECT order_details.id as order_item_id, order_details.quantity, order_details.price, order_details.total_price, order_details.product_id, product.Name, product.Image
            FROM `order_details` 
            INNER JOIN product ON order_details.product_id = product.Id
            WHERE `order_id` = $order_id
        ");

        $count_items = db_query("SELECT SUM(quantity) AS total_quantity FROM `order_details` WHERE `order_id` = $order_id");

        $data = array(
            'order' => $order,
            'order_items' => $order_items,
            'ship_fee' => 30000,
            'total_quantity' => $count_items->fetch_assoc()['total_quantity'],
        );

        load_view('order/order_details', '_layoutAdmin', $data);
    }
}

function update_order()
{
    authorize("admin");
    if (isset($_POST['update_order'])) {
        $id = isset($_POST['order_id']) ? $_POST['order_id'] : null;
        $status = isset($_POST['status']) ? $_POST['status'] : null;

        $data = array(
            'status' => $status,
        );

        db_update("orders", $data, "`id` = $id");

        header("Location: ?controller=admin&action=list_order");
    }
}

function remove_order()
{
    if (isset($_GET['order_id'])) {
        $id = $_GET['order_id'];

        db_delete("orders", "`id` = $id");
        header("Location: ?controller=admin&action=list_order");
    }
}


// Chuyển thành ToUnSign
function convertToUnSign($str)
{
    $unsignChars = array(
        'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a',
        'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a',
        'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a',
        'đ' => 'd',
        'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e',
        'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e',
        'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
        'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',
        'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o',
        'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o',
        'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u',
        'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u',
        'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',
        'Á' => 'A', 'À' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A',
        'Ă' => 'A', 'Ắ' => 'A', 'Ằ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A',
        'Â' => 'A', 'Ấ' => 'A', 'Ầ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A',
        'Đ' => 'D',
        'É' => 'E', 'È' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E',
        'Ê' => 'E', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E',
        'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I',
        'Ó' => 'O', 'Ò' => 'O', 'Ỏ' => 'O', 'Õ' => 'O', 'Ọ' => 'O',
        'Ô' => 'O', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O',
        'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O',
        'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U',
        'Ư' => 'U', 'Ứ' => 'U', 'Ừ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U',
        'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y'
    );

    $str = strtr($str, $unsignChars);
    $str = str_replace(' ', '-', $str);
    return $str;
}
