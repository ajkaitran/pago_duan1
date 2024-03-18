<?php

function construct()
{
}

function Index()
{
    load_view('/admin/Index', '_layoutAdmin');
}
function Adddm()
{
    load_view('/admin/category/Adddm', '_layoutAdmin');
}
function Listdm()
{
    load_view('/admin/category/Listdm', '_layoutAdmin');
}
function Addsp()
{
    load_view('/admin/product/Addsp', '_layoutAdmin');
}
function Listsp()
{
    load_view('/admin/product/Listsp', '_layoutAdmin');
}
function product()
{
    load_view('product/product', '_layoutAdmin');
}
function article()
{
    load_view('article/article', '_layoutAdmin');
}
