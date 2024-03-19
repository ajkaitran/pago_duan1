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
    load_view('/product/ListCategoryProduct', '_layoutAdmin');
}
function UpdateCategoryProduct()
{
    load_view('/product/UpdateCategoryProduct', '_layoutAdmin');
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
