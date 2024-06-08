<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
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

            header('Location: /product/index');
        } else {
            $this->view('product/create');
        }
    }

    public function edit($id)
    {
        var_dump($id);
        $productModel = $this->model('Product');
        echo "call this route to edit 13131";
        var_dump($productModel);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];

            $productModel->update($id, $name, $price);

            header('Location: /product/index');
        } else {
            $product = $productModel->getById($id);
            $this->view('product/edit', ['product' => $product]);
        }
    }

    public function delete($id)
    {
        $productModel = $this->model('Product');
        $productModel->delete($id);

        header('Location: /product/index');
    }
}
