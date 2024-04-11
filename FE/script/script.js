function toggleLoginSignup() {
  let form = document.querySelector('.form-container form');
  let loginSwitch = document.getElementById('loginSwitch');

  console.log(loginSwitch.checked);

  if (loginSwitch.checked) {
    
    $("#floatingFirstname").hide();
    $("#floatingFirstnameLabel").hide();
    $("#floatingLastname").hide();
    $("#floatingLastnameLabel").hide();
    $("#floatingPasswordRepeat").hide();
    $("#floatingPasswordRepeatLabel").hide();
    $("#floatingEmail").hide();
    $("#floatingEmailLabel").hide();
  } else {

    $("#floatingFirstname").show();
    $("#floatingFirstnameLabel").show();
    $("#floatingLastname").show();
    $("#floatingLastnameLabel").show();
    $("#floatingPasswordRepeat").show();
    $("#floatingPasswordRepeatLabel").show();
    $("#floatingEmail").show();
    $("#floatingEmailLabel").show();
  }
}

const loginSwitch = document.getElementById('loginSwitch');

loginSwitch.addEventListener('change', function () {
  toggleLoginSignup();
});

class SignUpUser {
  constructor(uname, fname, lname, email, password) {
    this.username = uname;
    this.firstName = fname;
    this.lastName = lname;
    this.email = email;
    this.password = password;
  }
}

class LoginUser {
  constructor(uname, pword) {
    this.userName = uname;
    this.password = pword;
  }
}

function loginSignUpUser() {
  let form = document.querySelector('.form-container form');
  let loginSwitch = document.getElementById('loginSwitch');



  if (loginSwitch.checked) {
    const logInUser = new LoginUser(document.getElementById("floatingUsername").value, document.getElementById("floatingPassword").value);

    $.ajax({
      type: "POST",
      url: "../../BE/database/loginUser.php",
      data: JSON.stringify(logInUser),
      success: function (data) {
        console.log(data);
      },
      error: function () {
        // implement error 
      }
    });
  } else {
    if (document.getElementById("floatingPassword").value == document.getElementById("floatingPasswordRepeat").value) {
      const signUpUser = new SignUpUser(document.getElementById("floatingUsername").value,
        document.getElementById("floatingFirstname").value,
        document.getElementById("floatingLastname").value,
        document.getElementById("floatingEmail").value,
        document.getElementById("floatingPassword").value);

      $.ajax({
        type: "POST",
        url: "../../BE/database/signupUser.php",
        data: JSON.stringify(signUpUser),
        success: function (data) {
          console.log(data);
        },
        error: function () {
          // implement error 
        }
      });
    } else {
      // implement password error
    }
  }
}



