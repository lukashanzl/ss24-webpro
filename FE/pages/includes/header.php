<?php 

if(isset($_SESSION['user'])){
  $js_session = $_SESSION['user'];
} else {
  $js_session = null;
}
if(isset($_SESSION['admin'])){
  $js_session_admin = $_SESSION['admin'];
} else {
  $js_session_admin = null;
}

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

<script>
    var jsSession = '<?php echo $js_session; ?>';
    console.log(jsSession);
</script>

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
            <li><a class="dropdown-item" href="./user/userdata.php">Personal Data</a></li>
            <li><a class="dropdown-item" href="./user/paymentmethods.php">Payment Methods</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="./user/orders.php">Orders</a></li>
          </ul>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Warenkorb"><i class="bi bi-cart3"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./login.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Login/Sign Up"><i class="bi bi-person-square"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>