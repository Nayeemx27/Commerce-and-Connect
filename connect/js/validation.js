function validate() {
  const name = document.getElementById('name').value;
  const phone = document.getElementById('phone').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;
  const Cpassword = document.getElementById('Cpassword').value;


  const nameRegex = /^[a-zA-Z\s]+$/;
  const phoneRegex = /^01[3-9]\d{8}$/;
  const emailRegex = /(cse)_\d{10,20}@lus\.ac\.bd/;
  const passwordRegex = /((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@!#$%&_+<>])).{8,20}/;


  //for registration form
  if (!nameRegex.test(name)) {
    nameError.textContent = "Your name is not valid";
    namevalid.textContent = "";
    return false;
  } else {
    nameError.textContent =" ";
    namevalid.textContent = "your name is valid";
  }
 

  if (!emailRegex.test(email)) {
    emailError.textContent = "Only Lus CSE Student Email Accepted";
    emailvalid.textContent = " ";
    return false;
  } else {
    emailError.textContent ="";
    emailvalid.textContent = "valid email address";
  }

  if (!phoneRegex.test(phone)) {
    phoneError.textContent = "Only Bangladesh's number accepted";
    phonevalid.textContent = " ";
    return false;
  } else {
    phoneError.textContent = " ";
    phonevalid.textContent = " ";
  }

  if (!passwordRegex.test(password)) {
    passError.textContent = "contains 1(char,digit and special) and length upto 20";
    passvalid.textContent = "";
    return false;
  } else {
    passError.textContent = "";
    passvalid.textContent = "Valid Password";
  }

  if (password !== Cpassword) {
    cpass.textContent ="Password didn't match ):" 
    return false;
  
  } else {
    cpass.textContent =" " 
   
  
  }
 return true;
}
