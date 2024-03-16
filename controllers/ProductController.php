<?php

function construct()
{

}

function Index()
{
    $model = array(
        'title' => "Mai Nam Hải"
    );

    load_view('Product', '_productLayout', $model);
}
