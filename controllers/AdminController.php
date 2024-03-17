<?php

function construct()
{
}

function Index()
{
    load_view('admin/Index', '_layoutAdmin');
}
function product()
{
    load_view('product/product', '_layoutAdmin');
}
function article()
{
    load_view('article/article', '_layoutAdmin');
}
