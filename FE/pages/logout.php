<?php

session_start();
session_unset();
session_destroy();

include_once("./includes/header.php");
?>

<script>
  window.location.replace("http://localhost/ss24-webpro/FE/pages/index.php");
</script>

<?php
  include_once("./includes/footer.php");
?>