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
  constructor(uname, fname, lname, email, password, passrepeat) {
    this.username = uname;
    this.firstName = fname;
    this.lastName = lname;
    this.email = email;
    this.password = password;
    this.passwordRepeated = passrepeat;
  }
}

class LoginUser {
  constructor(uname, pword) {
    this.userName = uname;
    this.password = pword;
  }
}

function loginSignUpUser() {
  let loginSwitch = document.getElementById('loginSwitch');



  if (loginSwitch.checked) {
    const logInUser = new LoginUser(
        document.getElementById("floatingUsername").value,
        document.getElementById("floatingPassword").value
      );

    $.ajax({
      type: "POST",
      url: "../../BE/database/loginUser.php",
      data: JSON.stringify(logInUser),
      success: function (data) {
        console.log(data);
        let  responseData = JSON.parse(data);
        if(responseData.Result === "OK"){
          $("#form-container").hide();
          toastr.success(`Welcome ${responseData.UserFirstname} ${responseData.UserLastname}!`,responseData.Message,{
            progressBar: true
          });
        }else if(responseData.Result === "Error"){
          toastr.warning(responseData.Message,responseData.Result,{
            progressBar: true
          });
        }
      },
      error: function () {
        // implement error 
        console.log(data);
      }
    });
  } else {
    if ($("#floatingPassword").val() == $("#floatingPasswordRepeat").val()) {
      const signUpUser = new SignUpUser(
        document.getElementById("floatingUsername").value,
        document.getElementById("floatingFirstname").value,
        document.getElementById("floatingLastname").value,
        document.getElementById("floatingEmail").value,
        document.getElementById("floatingPassword").value,
        document.getElementById("floatingPasswordRepeat").value
      );

      $.ajax({
        type: "POST",
        url: "../../BE/database/signupUser.php",
        data: JSON.stringify(signUpUser),
        success: function (data) {
          console.log(data);
          let  responseData = JSON.parse(data);
          if(responseData.Result === "OK"){
            $("#form-container").hide();
            toastr.success(`Welcome ${responseData.UserFirstname} ${responseData.UserLastname}!`,responseData.Message,{
              progressBar: true
            });
          }else if(responseData.Result === "Error"){
            toastr.warning(responseData.Message,responseData.Result,{
              progressBar: true
            });
          }
        },
        error: function () {
          // implement error 
          console.log(data);
        }
      });
    } else {
      // implement password error
      console.log("Password repeat wrong!");
    }
  }
}

