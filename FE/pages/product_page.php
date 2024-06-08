<?php
  include_once("./includes/header.php");
?>
<script>
var linkElement = document.createElement("link");
linkElement.rel = "stylesheet";
linkElement.href = "../assets/styleprod.css"; 

document.head.appendChild(linkElement);
</script>

<div class="album py-5 align-items-center bg-body-tertiary">
    <div class="container">
    <header style="padding-bottom:20px">
        <!-- Suchleiste -->
        <input type="text" id="searchBar" placeholder="Nach Marke suchen...">
        <!-- Kategorien Dropdown -->
        <select id="categorySelect">
            <option value="all">Alle Kategorien</option>
            <option value="Staubsauger">Staubsauger</option>
            <option value="Accessoires">Accessoires</option>
            <option value="Langarm">Langarm</option>
            <option value="Kurzarm">Kurzarm</option>
        </select>
    </header>

        <div id="products" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        <!-- Produkte -->
        </div>
  </div>

   <!-- Warenkorb -->
   <div id="cart">
        <h2>Warenkorb</h2>
        <div id="cartContent">
            <p>Warenkorb leer</p>
        </div>
        <p>Gesamtpreis: <span id="totalPrice">0.00€</span></p>
        <div class="btn btn-danger" id="orderButton">Bestellen</div>
        <div class="btn btn-info" id="scrollToTop">Back to top</div>
    </div>
    


     
<script src="../script/script_products.js"></script>
<?php
include_once("./includes/footer.php");
?>