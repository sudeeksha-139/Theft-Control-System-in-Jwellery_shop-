<?php
session_start();
require_once 'config/connection.php';

if (empty($_SESSION['isLogin'])) {
    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php require_once 'include/header.php'; ?>
<style>
    .jewelry-area {
    padding: 50px 0;
}

.single-jewelry {
    position: relative;
    margin-bottom: 30px;
    overflow: hidden;
}

.jewelry-details {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 15px;
    transition: all 0.3s ease;
}

.single-jewelry:hover .jewelry-details {
    bottom: -50px;
}

.jewelry-title {
    font-size: 20px;
    margin-bottom: 10px;
    color: #333;
}

.jewelry-description {
    font-size: 14px;
    color: #666;
}

    </style>

<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="active-banner-slider owl-carousel">
                    
                    <div class="row single-slide align-items-center d-flex">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h2>Discover Exquisite Jewelry Pieces!</h2>
                                <p>Explore our stunning collection of jewelry, crafted with precision and elegance, perfect for any occasion.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid" src="img/banner/banner-img.png" alt="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row single-slide">
                        <div class="col-lg-5">
                            <div class="banner-content">
                                <h2>Discover Exquisite Jewelry Pieces!</h2>
                                <p>Explore our stunning collection of jewelry, crafted with precision and elegance, perfect for any occasion.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="img-fluid" src="img/banner/banner-img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features-area section_gap">
    <div class="container">
        <div class="row features-inner">

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon1.png" alt="">
                    </div>
                    <h6>Free Delivery</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon2.png" alt="">
                    </div>
                    <h6>Return Policy</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon3.png" alt="">
                    </div>
                    <h6>24/7 Support</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon4.png" alt="">
                    </div>
                    <h6>Secure Payment</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="jewelry-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="single-jewelry">
                            <img class="img-fluid w-100" src="img/necklace.jpg" alt="Necklace">
                            <div class="jewelry-details">
                                <h6 class="jewelry-title">Necklaces</h6>
                                <p class="jewelry-description">Necklaces are worn around the neck and come in various lengths and styles, including chokers, chains, pendants, and statement necklaces.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-jewelry">
                    <img class="img-fluid w-100" src="img/necklace.jpg" alt="Earrings">
                    <div class="jewelry-details">
                        <h6 class="jewelry-title">Earrings</h6>
                        <p class="jewelry-description">Earrings are worn on the earlobe and come in various styles such as studs, hoops, dangles, and chandeliers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="jewelry-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="single-jewelry">
                        <img class="img-fluid w-100" src="img/rings.jpg" alt="Rings">
                            <div class="jewelry-details">
                                <h6 class="jewelry-title">Rings</h6>
                                <p class="jewelry-description">Rings are worn on the fingers and come in different types such as engagement rings, wedding bands, cocktail rings, and stackable rings.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-jewelry">
                <img class="img-fluid w-100" src="img/bracelets.jpg" alt="Bracelets">
                            <div class="jewelry-details">
                                <h6 class="jewelry-title">Bracelets</h6>
                                <p class="jewelry-description">Bracelets are worn around the wrist and can be made of metals, beads, gemstones, or leather. They come in various styles including bangles, cuffs, and charm bracelets.</p>
                            </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'include/footer.php';?>
</body>

</html>