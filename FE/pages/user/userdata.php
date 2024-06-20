<?php
  include_once("../includes/header.php");
  include_once("../../../BE/classes/user.php");
?>

<div class="user-data-container">
  <form method="POST" action="">
    <div class="section">
      <h4>Personal Data</h4>
      <hr>
      <ul>
        <li>
          Vorname: <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($user->getFirstname()); ?>">
        </li>
        <li>
          Nachname: <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($user->getLastname()); ?>">
        </li>
      </ul>
    </div>
    <div class="section">
      <h4>Login Information</h4>
      <hr>
      <ul>
        <li>
          Username: <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user->getUsername()); ?>">
        </li>
        <li>
          Email: <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user->getEmail()); ?>">
        </li>
      </ul>
    </div>
    <div class="section">
      <h4>Address Information</h4>
      <hr>
      <!-- Add fields for address information here if needed -->
    </div>
    <div>
      <button type="submit">Save Changes</button>
    </div>
  </form>
</div>

<?php
  include_once("../includes/footer.php");
?>