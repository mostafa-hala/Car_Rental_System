function isValidEmail(email) {
  let regex=/^[a-z]\w{1,30}@[a-z]{1,10}\.[a-z]{1,5}$/i
  return regex.test(email)
}
function check(elem) {
  if (elem.id == "email") {
    if
     (!isValidEmail(elem.value)) elem.style.backgroundColor = "#fab1a0";
    else 
    elem.style.backgroundColor = "#f1f2f6";
  } 
  else if (elem.id == "password") {
    if (!elem.value) elem.style.backgroundColor = "#fab1a0";
    else elem.style.backgroundColor = "#f1f2f6";
  }
}

function handleSubmit() {
  let p = document.getElementById("error");
  email = document.getElementById("email").value;
  password = document.getElementById("password").value;
  if (!isValidEmail(email) || !password) {
    p.innerHTML = "Please enter valid information";
    return false;
  } else {
    p.innerHTML = "";
    return true;
  }
}