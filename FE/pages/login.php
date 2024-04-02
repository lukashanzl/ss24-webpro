<?php
include_once("./includes/header.php");
?>
<div class="form-container">
  
  <form>
    <h5>User Login</h5>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingUsername" placeholder="SampleUsername">
      <label for="floatingUsername">Username</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="SamplePassword">
      <label for="floatingPassword">Password</label>
    </div>
    <button type="submit">Send</button>
  </form>
</div>
<?php
include_once("./includes/footer.php");
?>