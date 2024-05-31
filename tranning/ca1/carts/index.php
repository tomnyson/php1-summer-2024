<?php
$products = array(
    array('id' => 1, 'name' => 'iphone15-xanh', 'img' => 'https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-xanh-glr-1.jpg', 'price' => 13590000),
    array('id' => 1, 'name' => 'iphone15-hồng', 'img' => 'https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-1-3.jpg', 'price' => 13700000)
)

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./cart.css">
</head>

<body>
    <div class="container mt-3">
        <div class="row g-1">
            <?php foreach ($products as $product) {
            ?>
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo $product['img'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                            <p class="card-text price"><?php echo $product['price'] ?></p>
                            <form method="post" action="cart.php">
                                <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                                <input type="hidden" name="name" value="<?php echo $product['name'] ?>">
                                <input type="hidden" name="price" value="<?php echo $product['price'] ?>">
                                <button type="submit" name="action" value="add" class="btn btn-primary">Buy</button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>