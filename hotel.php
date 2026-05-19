<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {

    $product = [
        "name" => $_POST['name'],
        "price" => $_POST['price']
    ];

    $_SESSION['cart'][] = $product;
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>MediCare Pharmacy</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#f4f7fb;
    font-family:Arial, sans-serif;
    overflow-x:hidden;
}

/* Navbar */

.navbar{
    background:white;
    padding:15px 0;
    box-shadow:0 4px 20px rgba(0,0,0,0.08);
}

.logo{
    font-size:32px;
    font-weight:bold;
    color:#0d6efd;
}

.logo span{
    color:#00c896;
}

.nav-link{
    font-weight:600;
    color:#333 !important;
    transition:0.3s;
}

.nav-link:hover{
    color:#0d6efd !important;
}

.cart-btn{
    position:relative;
}

.cart-count{
    position:absolute;
    top:-8px;
    right:-8px;
    background:red;
    color:white;
    width:22px;
    height:22px;
    border-radius:50%;
    font-size:12px;
    display:flex;
    align-items:center;
    justify-content:center;
}

/* Hero */

.hero{
    padding:100px 0;
    background:linear-gradient(135deg,#0d6efd,#00c896);
    color:white;
}

.hero h1{
    font-size:65px;
    font-weight:800;
    line-height:1.2;
}

.hero p{
    font-size:20px;
    margin-top:20px;
}

.hero-btn{
    background:white;
    color:#0d6efd;
    border:none;
    padding:14px 35px;
    border-radius:50px;
    font-weight:bold;
    transition:0.3s;
}

.hero-btn:hover{
    transform:translateY(-3px);
    background:#f1f1f1;
}

.hero img{
    border-radius:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.25);
}

/* Section */

.section-title{
    text-align:center;
    font-size:40px;
    font-weight:800;
    margin:80px 0 40px;
    color:#111827;
}

/* Product Card */

.product-card{
    background:white;
    border-radius:25px;
    overflow:hidden;
    transition:0.4s;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
    position:relative;
}

.product-card:hover{
    transform:translateY(-12px);
    box-shadow:0 15px 35px rgba(0,0,0,0.15);
}

.product-img{
    height:240px;
    width:100%;
    object-fit:cover;
}

.product-body{
    padding:20px;
}

.badge-sale{
    position:absolute;
    top:15px;
    left:15px;
    background:#00c896;
    color:white;
    padding:6px 14px;
    border-radius:50px;
    font-size:13px;
    font-weight:bold;
}

.product-title{
    font-size:24px;
    font-weight:700;
    margin-top:10px;
}

.price{
    color:#0d6efd;
    font-size:28px;
    font-weight:bold;
}

.add-btn{
    background:linear-gradient(135deg,#0d6efd,#00c896);
    border:none;
    padding:12px;
    border-radius:12px;
    font-weight:bold;
    transition:0.3s;
}

.add-btn:hover{
    transform:scale(1.03);
}

/* Cart */

.offcanvas{
    border-top-left-radius:25px;
    border-bottom-left-radius:25px;
}

.cart-box{
    background:#f8f9fc;
    padding:18px;
    border-radius:15px;
    margin-bottom:15px;
}

.cart-box h5{
    font-weight:700;
}

.total-box{
    background:#0d6efd;
    color:white;
    padding:18px;
    border-radius:15px;
    text-align:center;
    margin-top:20px;
}

/* Footer */

.footer{
    background:#111827;
    color:white;
    padding:60px 0 30px;
    margin-top:80px;
}

.footer h3{
    font-size:35px;
    font-weight:bold;
}

.social-icons i{
    width:50px;
    height:50px;
    border-radius:50%;
    background:#1f2937;
    line-height:50px;
    text-align:center;
    margin:0 8px;
    transition:0.3s;
}

.social-icons i:hover{
    background:#0d6efd;
    transform:translateY(-5px);
}

/* Responsive */

@media(max-width:768px){

.hero{
    text-align:center;
    padding:70px 0;
}

.hero h1{
    font-size:42px;
}

.hero img{
    margin-top:40px;
}

.section-title{
    font-size:32px;
}

}

</style>

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg sticky-top">

<div class="container">

<a href="#" class="navbar-brand logo">
Medi<span>Care</span>
</a>

<button class="navbar-toggler"
data-bs-toggle="collapse"
data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto align-items-center">

<li class="nav-item mx-2">
<a href="#" class="nav-link">Home</a>
</li>

<li class="nav-item mx-2">
<a href="#" class="nav-link">Products</a>
</li>

<li class="nav-item mx-2">
<a href="#" class="nav-link">About</a>
</li>

<li class="nav-item mx-2">
<a href="#" class="nav-link">Contact</a>
</li>

<li class="nav-item ms-3">

<button class="btn btn-primary cart-btn"
data-bs-toggle="offcanvas"
data-bs-target="#cartCanvas">

<i class="fa fa-shopping-cart"></i>

<div class="cart-count">
<?php echo count($_SESSION['cart']); ?>
</div>

</button>

</li>

</ul>

</div>

</div>

</nav>

<!-- Hero -->

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6">

<h1>Your Trusted Online Pharmacy</h1>

<p>
Order medicines, healthcare essentials,
and medical equipment from home.
</p>

<button class="hero-btn mt-4">
Shop Now
</button>

</div>

<div class="col-lg-6 text-center">

<img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?q=80&w=1000"
class="img-fluid">

</div>

</div>

</div>

</section>

<!-- Products -->

<section class="container">

<h2 class="section-title">
Featured Products
</h2>

<div class="row g-4">

<?php

$products = [

[
"name"=>"Vitamin Tablets",
"price"=>15,
"img"=>"https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?q=80&w=1000"
],

[
"name"=>"Blood Pressure Kit",
"price"=>35,
"img"=>"https://images.unsplash.com/photo-1607619056574-7b8d3ee536b2?q=80&w=1000"
],

[
"name"=>"Medical Mask Box",
"price"=>10,
"img"=>"https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=1000"
]

];

foreach($products as $product){

?>

<div class="col-lg-4 col-md-6">

<div class="product-card">

<div class="badge-sale">
Best Seller
</div>

<img src="<?php echo $product['img']; ?>"
class="product-img">

<div class="product-body">

<h4 class="product-title">
<?php echo $product['name']; ?>
</h4>

<p class="price">
$<?php echo $product['price']; ?>
</p>

<form method="POST">

<input type="hidden" name="name"
value="<?php echo $product['name']; ?>">

<input type="hidden" name="price"
value="<?php echo $product['price']; ?>">

<button type="submit"
name="add_to_cart"
class="btn btn-primary w-100 add-btn">

<i class="fa fa-cart-plus me-2"></i>
Add To Cart

</button>

</form>

</div>

</div>

</div>

<?php } ?>

</div>

</section>

<!-- Cart -->

<div class="offcanvas offcanvas-end"
tabindex="-1"
id="cartCanvas">

<div class="offcanvas-header">

<h3>Your Cart</h3>

<button class="btn-close"
data-bs-dismiss="offcanvas"></button>

</div>

<div class="offcanvas-body">

<?php

if(count($_SESSION['cart']) > 0){

foreach($_SESSION['cart'] as $item){

$total += $item['price'];

?>

<div class="cart-box">

<h5>
<?php echo $item['name']; ?>
</h5>

<p class="mb-0">
$<?php echo $item['price']; ?>
</p>

</div>

<?php
}

}else{

echo "<p>Your cart is empty.</p>";

}

?>

<div class="total-box">

<h4>
Total: $<?php echo $total; ?>
</h4>

<button class="btn btn-light w-100 mt-3">
Proceed To Checkout
</button>

</div>

</div>

</div>

<!-- Footer -->

<footer class="footer">

<div class="container text-center">

<h3>MediCare Pharmacy</h3>

<p class="mt-3">
Your trusted healthcare partner online.
</p>

<div class="social-icons mt-4">

<i class="fab fa-facebook-f"></i>
<i class="fab fa-instagram"></i>
<i class="fab fa-twitter"></i>
<i class="fab fa-linkedin-in"></i>

</div>

<p class="mt-4 mb-0">
© 2026 MediCare Pharmacy. All Rights Reserved.
</p>

</div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>