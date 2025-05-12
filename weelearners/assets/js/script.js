var hamburgerMenu = document.querySelector('.div-hamburger-menu');
var navLinks = document.querySelector('.ul-nav-links');

hamburgerMenu.addEventListener('click', () => {
    hamburgerMenu.classList.toggle('active');
    navLinks.classList.toggle('open');
});


// The js code can provide functionality to to perfrom validation.
function submitForm() {
 document.getElementById("form-contact-form").addEventListener("submit", function(e) {
  if (!this.checkValidity()) {
    // If the form is invalid, it then prevents the form submission, 
    e.preventDefault(); 
    // and shows the alert message to the user.
    alert("Please fill out all required fields.");
  } else{
    alert("Form submitted successfully!");
  }
});
};