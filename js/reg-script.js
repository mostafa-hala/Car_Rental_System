function isValidEmail(email) {
    let regex=/^[a-z]\w{1,30}@[a-z]{1,10}\.[a-z]{1,5}$/i
    return regex.test(email)
}

function check(elem) {
    if (elem.id == "email") {
        if(!isValidEmail(elem.value) || !elem.value ) elem.style.backgroundColor = "#fab1a0";
        else 
        elem.style.backgroundColor = "#f1f2f6";
      } 
    else if (elem.id == "password" || elem.id == "pass-confirm" || elem.id == "username") {
      if (!elem.value) elem.style.backgroundColor = "#fab1a0";
      else elem.style.backgroundColor = "#f1f2f6";
  }

} 

function validateForm() {
  var username = document.getElementById("username").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("pass-confirm").value;
  var isValid = true;
  if (username.trim() === '') {
      document.getElementById('usernameError').innerHTML = 'Username field cannot be empty';
      isValid = false;
  } else {
      document.getElementById('usernameError').innerHTML = '';
  }

 
  if (email.trim() === '') {
      document.getElementById('emailError').innerHTML = 'Email field cannot be empty';
      isValid = false;
  } else if (!isValidEmail(email)) {
      document.getElementById('emailError').innerHTML = 'Please enter a valid email form';
      isValid = false;
  } else {
      document.getElementById('emailError').innerHTML = '';
  }

  
  if (password.trim() === '') {
      document.getElementById('error').innerHTML = 'Password field cannot be empty';
      isValid = false;
  }

  
  if (password !== confirmPassword) {
      document.getElementById('error').innerHTML = 'Passwords do not match';
      isValid = false;
  }

  return isValid;
}