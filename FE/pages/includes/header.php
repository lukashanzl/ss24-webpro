<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Webshop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

  <nav class="navbar navbar-light navbar-expand-lg bg-faded justify-content-center transparent" id="navbar">
    <div class="container">
      <a class="navbar-brand d-flex w-50 me-auto" href="./index.php"><i class="bi bi-box2-heart"></i>&nbsp; Shirt-Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="navbar-collapse collapse w-100" id="navbarSupportedContent">
        <ul class="navbar-nav w-100 justify-content-center">
          <li class="nav-item active">
            <a class="nav-link" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./product_page.php">Products</a>
          </li>
        </ul>
        <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account Management
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              if (isset($_SESSION['admin'])) {
                  echo <<< EOT
                    <li><a class="dropdown-item" href="./admin.php">Admin Panel</a></php>
                    <li><a class="dropdown-item" href="./edit_products.php">Produkte bearbeiten</a></php>
                    <li><hr class="dropdown-divider"></li>
                  EOT;
              }
            ?>
            <li><a class="dropdown-item" href="./user/userdata.php">Personal Data</a></li>
            <li><a class="dropdown-item" href="./user/paymentmethods.php">Payment Methods</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./user/orders.php">Orders</a></li>
          </ul>
        </li>
           <!-- Warenkorb-Symbol -->
           <li class="nav-item">
    <div id="cart-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
        </svg>
        <span id="cart-count">0</span>
    </div>
           </li>

          <li class="nav-item">
            <a class="nav-link" href="./login.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Login/Sign Up"><i class="bi bi-person-square"></i></a>
          </li>
            <?php 
              if(isset($_SESSION['user'])){
                echo '<li class="nav-item" id="greeting">';
                echo 'Hello '. $_SESSION['user']['username'].'!';
                echo '</li>';
              }elseif(isset($_SESSION['admin'])){
                echo '<li class="nav-item">';
                echo 'Hello '. $_SESSION['admin']['username'].'!';
                echo '</li>';
              }
            ?>
        </ul>
      </div>
    </div>
  </nav>