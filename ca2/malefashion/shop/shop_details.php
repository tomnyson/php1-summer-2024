<?php $dbHelper = new DBUntil();
$detail = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $products = $dbHelper->select("select * from products where id = ?", [$id]);
    if (count($products) > 0) {
        $detail = $products[0];
    }
    // die;
    // var_dump($products);
}
?>
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="<?php echo $detail['img'] ?>">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-2.png">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-3.png">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-4.png">
                                    <i class="fa fa-play"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="<?php echo $detail['img'] ?>" alt="">
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="img/shop-details/product-big-3.png" alt="">
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="img/shop-details/product-big.png" alt="">
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-4" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="img/shop-details/product-big-4.png" alt="">
                                <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1"
                                    class="video-popup"><i class="fa fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4><?php echo $detail['name']; ?></h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div>
                        <h3><?php echo $detail['price']; ?><span>70.00</span></h3>
                        <p><?php echo $detail['description']; ?></p>
                        <div class="product__details__option">
                            <div class="product__details__option__size">
                                <span>Size:</span>
                                <label for="xxl">xxl
                                    <input type="radio" id="xxl">
                                </label>
                                <label class="active" for="xl">xl
                                    <input type="radio" id="xl">
                                </label>
                                <label for="l">l
                                    <input type="radio" id="l">
                                </label>
                                <label for="sm">s
                                    <input type="radio" id="sm">
                                </label>
                            </div>
                            <div class="product__details__option__color">
                                <span>Color:</span>
                                <label class="c-1" for="sp-1">
                                    <input type="radio" id="sp-1">
                                </label>
                                <label class="c-2" for="sp-2">
                                    <input type="radio" id="sp-2">
                                </label>
                                <label class="c-3" for="sp-3">
                                    <input type="radio" id="sp-3">
                                </label>
                                <label class="c-4" for="sp-4">
                                    <input type="radio" id="sp-4">
                                </label>
                                <label class="c-9" for="sp-9">
                                    <input type="radio" id="sp-9">
                                </label>
                            </div>
                        </div>
                        <div class="product__details__cart__option">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            <form method="get" action="./cart-handle.php">
                                <input type="hidden" name="id" value="<?php echo $detail['id']; ?>" />

                                <button type="submit" class="primary-btn" name="action" value="add" class="add-cart">+
                                    Add To Cart</button>
                            </form>
                        </div>
                        <div class="product__details__btns__option">
                            <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                            <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                        </div>
                        <div class="product__details__last__option">
                            <h5><span>Guaranteed Safe Checkout</span></h5>
                            <img src="img/shop-details/details-payment.png" alt="">
                            <ul>
                                <li><span>SKU:</span> 3812912</li>
                                <li><span>Categories:</span> Clothes</li>
                                <li><span>Tag:</span> Clothes, Skin, Body</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews(5)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                    information</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <?php echo $detail['description'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Shop Details Section End -->

<!-- Related Section Begin -->
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                        <span class="label">New</span>
                        <ul class="product__hover">
                            <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                            <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Piqué Biker Jacket</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$67.24</h5>
                        <div class="product__color__select">
                            <label for="pc-1">
                                <input type="radio" id="pc-1">
                            </label>
                            <label class="active black" for="pc-2">
                                <input type="radio" id="pc-2">
                            </label>
                            <label class="grey" for="pc-3">
                                <input type="radio" id="pc-3">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                        <ul class="product__hover">
                            <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                            <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Piqué Biker Jacket</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$67.24</h5>
                        <div class="product__color__select">
                            <label for="pc-4">
                                <input type="radio" id="pc-4">
                            </label>
                            <label class="active black" for="pc-5">
                                <input type="radio" id="pc-5">
                            </label>
                            <label class="grey" for="pc-6">
                                <input type="radio" id="pc-6">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                        <span class="label">Sale</span>
                        <ul class="product__hover">
                            <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                            <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Multi-pocket Chest Bag</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$43.48</h5>
                        <div class="product__color__select">
                            <label for="pc-7">
                                <input type="radio" id="pc-7">
                            </label>
                            <label class="active black" for="pc-8">
                                <input type="radio" id="pc-8">
                            </label>
                            <label class="grey" for="pc-9">
                                <input type="radio" id="pc-9">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/product-4.jpg">
                        <ul class="product__hover">
                            <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                            <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                            <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>Diagonal Textured Cap</h6>
                        <form method="post" action="./cart-handle.php">
                            <input type="hidden" name="id" value="<?php echo $detail['id']; ?>" />
                            <input type="hidden" name="name" value="<?php echo $detail['name']; ?>" />
                            <input type="hidden" name="price" value="<?php echo $detail['price']; ?>" />
                            <input type="hidden" name="img" value="<?php echo $detail['img']; ?>" />
                            <button type="submit" name="action" value="add" class="add-cart">+ Add To Cart</button>
                        </form>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>$60.9</h5>
                        <div class="product__color__select">
                            <label for="pc-10">
                                <input type="radio" id="pc-10">
                            </label>
                            <label class="active black" for="pc-11">
                                <input type="radio" id="pc-11">
                            </label>
                            <label class="grey" for="pc-12">
                                <input type="radio" id="pc-12">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>