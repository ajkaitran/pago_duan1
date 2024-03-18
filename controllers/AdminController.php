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
    load_view('/category/Adddm', '_layoutAdmin');
}
function Listdm()
{
    load_view('/category/Listdm', '_layoutAdmin');
}
function Addsp()
{
    load_view('/product/Addsp', '_layoutAdmin');
}
function Listsp()
{
    load_view('/product/Listsp', '_layoutAdmin');
}
function article()
{
    load_view('article/article', '_layoutAdmin');
}
