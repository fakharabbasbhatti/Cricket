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

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<style>

body{
    background:#f5f7fb;
    font-family:Arial;
}

.navbar{
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.logo{
    font-size:30px;
    font-weight:bold;
    color:#0d6efd;
}

.logo span{
    color:#00b894;
}

.hero{
    background:linear-gradient(to right,#0d6efd,#00b894);
    padding:80px 0;
    color:white;
}

.hero h1{
    font-size:55px;
    font-weight:bold;
}

.product-card{
    background:white;
    border-radius:15px;
    overflow:hidden;
    transition:0.3s;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.product-card:hover{
    transform:translateY(-10px);
}

.product-img{
    height:220px;
    object-fit:cover;
}

.price{
    color:#0d6efd;
    font-size:22px;
    font-weight:bold;
}

.section-title{
    text-align:center;
    margin:50px 0 30px;
    font-weight:bold;
}

.cart-box{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.footer{
    background:#111827;
    color:white;
    padding:30px 0;
    margin-top:50px;
}

.cart-count{
    background:red;
    color:white;
    border-radius:50%;
    padding:2px 8px;
    font-size:12px;
}

</style>

</head>
<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg sticky-top">

<div class="container">

<a class="navbar-brand logo" href="#">
    Medi<span>Care</span>
</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
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
    <a href="#" class="nav-link">Contact</a>
</li>

<li class="nav-item mx-2">

<button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#cartCanvas">

<i class="fa fa-shopping-cart"></i>

<span class="cart-count">
<?php echo count($_SESSION['cart']); ?>
</span>

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

<h1>Online Medical Store</h1>

<p class="lead">
Buy medicines and healthcare products online.
</p>

<button class="btn btn-light btn-lg mt-3">
Shop Now
</button>

</div>

<div class="col-lg-6 text-center">

<img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?q=80&w=1000"
class="img-fluid rounded shadow">

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

<!-- Product 1 -->

<div class="col-md-4">

<div class="product-card p-3">

<img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?q=80&w=1000"
class="img-fluid product-img rounded">

<h4 class="mt-3">
Vitamin Tablets
</h4>

<p class="price">
$15
</p>

<form method="POST">

<input type="hidden" name="name" value="Vitamin Tablets">
<input type="hidden" name="price" value="15">

<button type="submit" name="add_to_cart"
class="btn btn-primary w-100">

<i class="fa fa-cart-plus"></i>
Add To Cart

</button>

</form>

</div>

</div>

<!-- Product 2 -->

<div class="col-md-4">

<div class="product-card p-3">

<img src="https://images.unsplash.com/photo-1607619056574-7b8d3ee536b2?q=80&w=1000"
class="img-fluid product-img rounded">

<h4 class="mt-3">
Blood Pressure Kit
</h4>

<p class="price">
$35
</p>

<form method="POST">

<input type="hidden" name="name" value="Blood Pressure Kit">
<input type="hidden" name="price" value="35">

<button type="submit" name="add_to_cart"
class="btn btn-primary w-100">

<i class="fa fa-cart-plus"></i>
Add To Cart

</button>

</form>

</div>

</div>

<!-- Product 3 -->

<div class="col-md-4">

<div class="product-card p-3">

<img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=1000"
class="img-fluid product-img rounded">

<h4 class="mt-3">
Medical Mask Box
</h4>

<p class="price">
$10
</p>

<form method="POST">

<input type="hidden" name="name" value="Medical Mask Box">
<input type="hidden" name="price" value="10">

<button type="submit" name="add_to_cart"
class="btn btn-primary w-100">

<i class="fa fa-cart-plus"></i>
Add To Cart

</button>

</form>

</div>

</div>

</div>

</section>

<!-- Cart -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="cartCanvas">

<div class="offcanvas-header">

<h4>Your Cart</h4>

<button class="btn-close" data-bs-dismiss="offcanvas"></button>

</div>

<div class="offcanvas-body">

<?php

if (count($_SESSION['cart']) > 0) {

    foreach ($_SESSION['cart'] as $item) {

        $total += $item['price'];

?>

<div class="cart-box mb-3">

<h5>
<?php echo $item['name']; ?>
</h5>

<p>
$<?php echo $item['price']; ?>
</p>

</div>

<?php
    }

} else {

    echo "<p>Your cart is empty.</p>";
}

?>

<hr>

<h4>
Total: $<?php echo $total; ?>
</h4>

<button class="btn btn-success w-100 mt-3">
Checkout
</button>

</div>

</div>

<!-- Footer -->

<footer class="footer">

<div class="container text-center">

<h3>MediCare Pharmacy</h3>

<p>
Professional Online Pharmacy Store
</p>

<div class="mt-3">

<i class="fab fa-facebook fa-2x mx-2"></i>
<i class="fab fa-instagram fa-2x mx-2"></i>
<i class="fab fa-twitter fa-2x mx-2"></i>

</div>

</div>

</footer>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>