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

    $("#floatingAddress").hide();
    $("#floatingAddressLabel").hide();
    $("#floatingPLZ").hide();
    $("#floatingPLZLabel").hide();
    $("#floatingCity").hide();
    $("#floatingCityLabel").hide();
  } else {

    $("#floatingFirstname").show();
    $("#floatingFirstnameLabel").show();
    $("#floatingLastname").show();
    $("#floatingLastnameLabel").show();
    $("#floatingPasswordRepeat").show();
    $("#floatingPasswordRepeatLabel").show();
    $("#floatingEmail").show();
    $("#floatingEmailLabel").show();

    $("#floatingAddress").show();
    $("#floatingAddressLabel").show();
    $("#floatingPLZ").show();
    $("#floatingPLZLabel").show();
    $("#floatingCity").show();
    $("#floatingCityLabel").show();
  }
}

const loginSwitch = document.getElementById('loginSwitch');

loginSwitch.addEventListener('change', function () {
  toggleLoginSignup();
});

class SignUpUser {
  constructor(uname, fname, lname, email, password, passrepeat, address, plz, city) {
    this.username = uname;
    this.firstName = fname;
    this.lastName = lname;
    this.email = email;
    this.password = password;
    this.passwordRepeated = passrepeat;
    this.address = address;
    this.plz = plz;
    this.city = city;
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
        document.getElementById("floatingPasswordRepeat").value,
        document.getElementById("floatingAddress").value,
        document.getElementById("floatingPLZ").value,
        document.getElementById("floatingCity").value
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




function deactivateCustomer(customerId) {
  if (confirm('Möchten Sie diesen Kunden wirklich deaktivieren?')) {
      $.ajax({
          type: "POST",
          url: "../BE/database/dataHandler.php",
          data: { action: 'deactivateCustomer', customerId: customerId },
          success: function(response) {
              alert('Kunde wurde deaktiviert.');
              location.reload();
          },
          error: function() {
              alert('Fehler beim Deaktivieren des Kunden.');
          }
      });
  }
}



function viewOrders(customerId) {
  $.ajax({
      type: "POST",
      url: "../pages/user/orders.php",
      data: { action: 'getOrders', customerId: customerId },
      success: function(response) {
          const orders = JSON.parse(response);
          const orderDetails = document.getElementById('order-details');
          const orderTitle = document.getElementById('order-title');
          orderDetails.style.display = 'table';
          orderTitle.style.display = 'block';

          orderDetails.innerHTML = `
              <tr>
                  <th>Produkt ID</th>
                  <th>Produktname</th>
                  <th>Menge</th>
                  <th>Aktionen</th>
              </tr>
          `;

          orders.forEach(order => {
              orderDetails.innerHTML += `
                  <tr>
                      <td>${order.productId}</td>
                      <td>${order.productName}</td>
                      <td>${order.quantity}</td>
                      <td><button onclick="removeProduct(${order.orderId}, ${order.productId})">Entfernen</button></td>
                  </tr>
              `;
          });
      },
      error: function() {
          alert('Fehler beim Abrufen der Bestellungen.');
      }
  });
}