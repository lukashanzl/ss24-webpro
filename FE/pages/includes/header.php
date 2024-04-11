<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Webshop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/styles.css">
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
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Webshop</a>
          </li>
        </ul>
        <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
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