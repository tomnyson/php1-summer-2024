<?php

namespace App\Controllers;

use Core\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $productModel = $this->model('Product');
        $products = $productModel->getAll();
        $this->view('product/index', ['products' => $products]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];

            $productModel = $this->model('Product');
            $productModel->create($name, $price);

            header('Location: /php1-summer-2024/ca1/mvc/public/product/index');
        } else {
            $this->view('product/create');
        }
    }

    public function edit($id)
    {
        $productModel = $this->model('Product');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];

            $productModel->update($id, $name, $price);

            header('Location: /php1-summer-2024/ca1/mvc/public/product/index');
        } else {
            $product = $productModel->getById($id);
            $this->view('product/edit', ['product' => $product]);
        }
    }

    public function delete($id)
    {
        $productModel = $this->model('Product');
        $productModel->delete($id);

        header('Location: /php1-summer-2024/ca1/mvc/public/product/index');
    }
}
