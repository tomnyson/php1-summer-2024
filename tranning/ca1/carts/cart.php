<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./cart.css">
</head>

<body>
    <?php include_once('./cart-services.php');
    $carts = new Cart();

    include_once('../coupon/DBUtil.php');
    ini_set('display_errors', '1');

    $dbHelper = new DBUntil();

    $errors = [];
    $discount = 0;
    function checkCode($code)
    {
        /**
         *  còn hạn sử dụng
         *          */
        // 6/6-> 9/6 
        global $dbHelper;
        $sql = $dbHelper->select(
            "SELECT * FROM coupons WHERE code = :code AND quantity > 0 AND 
        startDate <= :currentDate AND endDate >= :currentDate",
            array(
                'code' => $code,
                'currentDate' => date("Y-m-d")
            )
        );
        if (count($sql) > 0) {
            return $sql[0];
        } else {
            return  null;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) == 'checkCode') {
        if (!empty($_POST['code'])) {
            $isCheck =  checkCode($_POST['code']);
            if (!empty($isCheck)) {
                $discount =   $isCheck['discount'];
            }
        }
    }
    ?>
    <div class="container padding-bottom-3x mb-1">
        <!-- Alert-->
        <!-- Shopping Cart-->
        <div class="table-responsive shopping-cart">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Discount</th>
                        <th class="text-center">
                            <form method="post" action="cart-handle.php">
                                <button type="submit" name="action" value="clear" class="btn btn-danger">clear</button>
                            </form>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $carts = new Cart();
                    foreach ($carts->getCart() as $item) { ?>
                        <tr>
                            <td>
                                <div class="product-item">
                                    <a class="product-thumb" href="#"><img src="<?php echo $item['img'] ?>" alt="Product"></a>
                                    <div class="product-info">
                                        <h4 class="product-title">
                                            name: <?php echo $item['name'] ?></br>
                                            price: <?php echo $item['price'] ?>
                                        </h4>
                                    </div>
                            </td>
                            <td class="text-center">
                                <div class="count-input">
                                    <select class="form-control">
                                        <option value="<?php echo $item['quantity'] ?>"><?php echo $item['quantity'] ?>
                                        </option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </td>
                            <td class="text-center text-lg text-medium"><?php echo $item['price'] ?></td>
                            <td class="text-center text-lg text-medium">0</td>
                            <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="" data-original-title="Remove item"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="shopping-cart-footer">
            <div class="column">
                <form class="coupon-form" action="" method="post">
                    <input name="code" class="form-control form-control-sm" type="text" placeholder="Coupon code" required="">
                    <button class="btn btn-outline-primary btn-sm" name="action" value="checkCode" type="submit">Apply
                        Coupon</button>
                </form>
            </div>
            <div class="column text-lg">Discount: <span class="text-medium"><?php echo  floatval($discount * $carts->getTotal() / 100)  ?></span>
            </div>
            <div class="column text-lg">Total: <span class="text-medium"><?php echo floatval($carts->getTotal() - ($discount * $carts->getTotal()) / 100) ?></span>
            </div>
        </div>
        <div class="shopping-cart-footer">
            <div class="column"><a class="btn btn-outline-secondary" href="index.php"><i class="icon-arrow-left"></i>&nbsp;Back
                    to Shopping</a></div>
            <div class="column"><a class="btn btn-primary" href="#" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Update Cart</a><a class="btn btn-success" href="#">Checkout</a></div>
        </div>
    </div>
</body>

</html>