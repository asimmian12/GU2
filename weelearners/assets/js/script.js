var hamburgerMenu = document.querySelector('.div-hamburger-menu');
var navLinks = document.querySelector('.ul-nav-links');

hamburgerMenu.addEventListener('click', () => {
    hamburgerMenu.classList.toggle('active');
    navLinks.classList.toggle('open');
});


// Still need to fix this!!! Asim Mian 11:05: 2025!!!!!

// The js code can provide functionality to to perfrom validation.
function submitForm() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var message = document.getElementById("message").value;
  // I can perform validation here before displaying the message/pop up.
  
  var messageDiv = document.getElementById("message");
  messageDiv.innerText = "Thanks," + name + "" + "You are now subscribed!";
}