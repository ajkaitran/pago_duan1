<?php 

function showCategories($selected, $categories, $parent_id = 0, $char = '')
{

    foreach ($categories as $key => $item)
    {

        // Nếu là chuyên mục con thì hiển thị
        if ($item['ParentCategoryId'] == $parent_id)
        {

            echo '<option value="'.$item['Id'].'" '.($selected == $item['Id'] ? "selected" : null).'>';
                echo $char . $item['Name'];
            echo '</option>';
             
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($selected, $categories, $item['Id'], $char.'|---');
        }
    }

}


function echoArray($arr) {
    echo '<pre>';
    print_r($arr);
    die();
}