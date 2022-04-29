//Validation of form inputs
const username = document.getElementById("uname");
const email = document.getElementById("email");
const country = document.getElementById("country");
const phone = document.getElementById("phone");
const password = document.getElementById("pass");
const form = document.getElementById("sign-up-form");

let message1 = document.createElement("small");
let message2 = document.createElement("small");
let message3 = document.createElement("small");
let message4 = document.createElement("small");
console.log(username);

form.addEventListener("submit", function (e) {
  if (username.value === "") {
    e.preventDefault();
    username.classList.add("border", "border-danger");
    message1.innerHTML = "Please insert a valid username";
    username.after(message1);
  }
  if (email.value === "") {
    e.preventDefault();
    email.classList.add("border", "border-danger");
    message2.innerHTML = "Please insert a valid email";
    email.after(message2);
  }
  if (country.value === "") {
    e.preventDefault();
    country.classList.add("border", "border-danger");
    message3.innerHTML = `Please insert a valid  country`;
    country.after(message3);
  }
  if (phone.value === "") {
    e.preventDefault();
    phone.classList.add("border", "border-danger");
    message4.innerHTML = `Please insert a valid  phone number`;
    phone.after(message4);
  } else {
    message1.classList.add("d-none");
  }
});
