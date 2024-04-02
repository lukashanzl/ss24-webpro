function toggleLoginSignup() {
  let form = document.querySelector('.form-container form');
  let loginSwitch = document.getElementById('loginSwitch');

  console.log(loginSwitch.checked);

  if (loginSwitch.checked) {
    // Change form action to login action
    form.setAttribute('action', '../../BE/database/loginUser.php');

    document.getElementById('floatingFirstname').style.display = "none";
    document.getElementById('floatingFirstnameLabel').style.display = "none";
    document.getElementById('floatingLastname').style.display = "none";
    document.getElementById('floatingLastnameLabel').style.display = "none";
    document.getElementById('floatingPasswordRepeat').style.display = "none";
    document.getElementById('floatingPasswordRepeatLabel').style.display = "none";
    document.getElementById('floatingEmail').style.display = "none";
    document.getElementById('floatingEmailLabel').style.display = "none";
  } else {
    // Change form action to sign up action
    form.setAttribute('action', '../../BE/database/signupUser.php');

    document.getElementById('floatingFirstname').style.display = "";
    document.getElementById('floatingFirstnameLabel').style.display = "";
    document.getElementById('floatingLastname').style.display = "";
    document.getElementById('floatingLastnameLabel').style.display = "";
    document.getElementById('floatingPasswordRepeat').style.display = "";
    document.getElementById('floatingPasswordRepeatLabel').style.display = "";
    document.getElementById('floatingEmail').style.display = "";
    document.getElementById('floatingEmailLabel').style.display = "";
  }
}

const loginSwitch = document.getElementById('loginSwitch');

loginSwitch.addEventListener('change', function () {
  toggleLoginSignup();
});