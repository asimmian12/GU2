document.addEventListener("DOMContentLoaded", function () {
  var hamburgerMenu = document.querySelector('.div-hamburger-menu');
  var navLinks = document.querySelector('.ul-nav-links');
  
  if (hamburgerMenu && navLinks) {
    hamburgerMenu.addEventListener('click', () => {
      hamburgerMenu.classList.toggle('active');
      navLinks.classList.toggle('open');
    });
  }
})



// The js code can provide functionality to create a variable for ScrollReveal animations
var scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};

// This js code can provide functionality to create a variable for Swiper for navigation
var swiper = new Swiper(".swiper", {
  loop: true,
  pagination: {
    el: ".swiper-pagination",
  },
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-user-info
ScrollReveal().reveal(".section-user-info", {
  ...scrollRevealOption,
});


// The js code can provide functionality to reveal sections with ScrollReveal for .section-badge
ScrollReveal().reveal(".section-badge", {
  ...scrollRevealOption,
});


// The js code can provide functionality to reveal sections with ScrollReveal for .div-users-info
ScrollReveal().reveal(".div-users-info", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-account-info
ScrollReveal().reveal(".section-account-info", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-uploads
ScrollReveal().reveal(".section-uploads", {
  ...scrollRevealOption,
});


// The js code can provide functionality to reveal sections with ScrollReveal for .footer__col
ScrollReveal().reveal(".footer__col", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-register-form
ScrollReveal().reveal(".section-register-form", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-login-form
ScrollReveal().reveal(".section-login-form", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-contact-form
ScrollReveal().reveal(".section-contact-form", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .div-photo
ScrollReveal().reveal(".div-photo", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-photo 
ScrollReveal().reveal(".section-photo ", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-badge
ScrollReveal().reveal(".section-badge ", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-videos
ScrollReveal().reveal(".section-videos ", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-reviews
ScrollReveal().reveal(".section-reviews ", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .div-pending-item
ScrollReveal().reveal(".div-pending-item", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .div-badge
ScrollReveal().reveal(".div-badge", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .div-video
ScrollReveal().reveal(".div-video", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .div-review
ScrollReveal().reveal(".div-review", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .nav-navbar
ScrollReveal().reveal(".nav-navbar", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .paragraph-text
ScrollReveal().reveal(".paragraph-text", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .main-heading
ScrollReveal().reveal(".main-heading", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-game
ScrollReveal().reveal(".h1-heading-center", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-game
ScrollReveal().reveal(".h2-secondary-colour", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-game
ScrollReveal().reveal(".section-game", {
  ...scrollRevealOption,
});
// The js code can provide functionality to reveal sections with ScrollReveal for .section-banner
ScrollReveal().reveal(".section-banner", {
  ...scrollRevealOption,
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