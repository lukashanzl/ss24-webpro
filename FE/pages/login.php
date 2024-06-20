<?php
include_once("./includes/header.php");
include_once("../../BE/classes/user.php");

?>
<p>test</p>
<div class="form-container" id="form-container">

  <div class="form" id="login-form">

    <div class="d-flex my-switch">
      <div class="form-text text-1">Sign Up</div>

      <div class="form-check form-switch form-check-inline">
        <input id="loginSwitch" class="form-check-input form-check-inline" type="checkbox">
      </div>

      <div class="form-text text-2">Login</div>
    </div>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingUsername" name="floatingUsername" placeholder="SampleUsername">
      <label for="floatingUsername">Username</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingFirstname" name="floatingFirstname" placeholder="SampleFirstname">
      <label for="floatingFirstname" id="floatingFirstnameLabel">Firstname</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingLastname" name="floatingLastname" placeholder="SampleLastname">
      <label for="floatingLastname" id="floatingLastnameLabel">Lastname</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" name="floatingPassword" placeholder="SamplePassword">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPasswordRepeat" name="floatingPasswordRepeat" placeholder="SamplePassword">
      <label for="floatingPasswordRepeat" id="floatingPasswordRepeatLabel">Password wiederholen</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="floatingEmail" name="floatingEmail" placeholder="Sample@email.com">
      <label for="floatingLastname" id="floatingEmailLabel">E-Mail</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingAddress" name="floatingAddress" placeholder="SampleAddress">
      <label for="floatingLastname" id="floatingAddressLabel">Adress</label>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" id="floatingPLZ" name="floatingPLZ" placeholder="SamplePLZ">
      <label for="floatingLastname" id="floatingPLZLabel">PLZ</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingCity" name="floatingCity" placeholder="SampleCity">
      <label for="floatingLastname" id="floatingCityLabel">City</label>
    </div>

    <button type="submit" onclick="loginSignUpUser()">Login</button>
  </div>
  <div class="form" id="logout-form">
    <button type="submit" onclick="logoutUser()">Logout</button>
</div>
</div>

<script>
  $(document).ready(function(){
    let param = window.location.search.substr(1);
    console.log(param);
  });

  $("#logout-form").hide();
  function logoutUser(){
    window.location.replace("http://localhost/ss24-webpro/FE/pages/logout.php");
  }
</script>

<?php
include_once("./includes/footer.php");

if(isset($_SESSION['user']) || isset($_SESSION['admin'])){
  echo <<< EOT
      <script>
        $("#login-form").hide();
        $("#logout-form").show();
      </script>
  EOT;
}


?>