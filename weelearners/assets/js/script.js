// The js code can provide functionality to create a variable for the hamburger menu
var hamburgerMenu = document.querySelector('#div-hamburger-menu');
// The js code can provide functionality to create a variable for the navigation links
var navLinks = document.querySelector('#ul-nav-links');
// The js code can provide functionality to open and close the hamburger menu with a simple if statement
if (hamburgerMenu && navLinks) {
  hamburgerMenu.addEventListener('click', () => {
    hamburgerMenu.classList.toggle('active');
    navLinks.classList.toggle('open');
  });
}


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
ScrollReveal().reveal("#section-user-info", {
  ...scrollRevealOption,
});


// The js code can provide functionality to reveal sections with ScrollReveal for .section-badge
ScrollReveal().reveal("#section-badge", {
  ...scrollRevealOption,
});


// The js code can provide functionality to reveal sections with ScrollReveal for .div-users-info
ScrollReveal().reveal("#div-users-info", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-account-info
ScrollReveal().reveal("#section-account-info", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-uploads
ScrollReveal().reveal("#section-uploads", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-register-form
ScrollReveal().reveal("#section-register-form", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-login-form
ScrollReveal().reveal("#section-login-form", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-contact-form
ScrollReveal().reveal("#section-contact-form", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-upload-form
ScrollReveal().reveal("#section-upload-form", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-photo 
ScrollReveal().reveal("#section-photo", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-videos
ScrollReveal().reveal("#section-video", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-reviews
ScrollReveal().reveal("#section-review", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .div-pending-item
ScrollReveal().reveal("#div-pending-item", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .div-photo
ScrollReveal().reveal("#div-photo", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .div-badge
ScrollReveal().reveal("#div-badge", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .div-video
ScrollReveal().reveal("#div-video", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .div-review
ScrollReveal().reveal("#div-review", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .nav-navbar
ScrollReveal().reveal("#nav-navbar", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .paragraph-text
ScrollReveal().reveal("#paragraph-text", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .main-heading
ScrollReveal().reveal("#main-heading", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-game
ScrollReveal().reveal("#h1-heading-center", {
  ...scrollRevealOption,
});


// The js code can provide functionality to reveal sections with ScrollReveal for .section-game
ScrollReveal().reveal("#section-game", {
  ...scrollRevealOption,
});

// The js code can provide functionality to reveal sections with ScrollReveal for .section-game
ScrollReveal().reveal("#section-contact", {
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

    // The js code can provide to be a file selection handler
    document.getElementById('section-profile-picture').addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            // The js code can update the file info text
            document.getElementById('file-selected-text').textContent = file.name;
            
            // The js code can store the image preview as a variable, that's attached with classes
            var previewContainer = document.getElementById('image-preview-container');
            var previewImage = document.getElementById('image-preview');
            var fileNameElement = document.getElementById('file-name');
            var fileSizeElement = document.getElementById('file-size');
            
            // The js code can show the file info
            fileNameElement.textContent = file.name;
            fileSizeElement.textContent = (file.size / 1024 / 1024).toFixed(2) + 'MB';
            
            // The js code can provide functionality to create, and now finally show the image preview
            var reader = new FileReader();
            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
    // The js code can provide to be a file selection handler
    document.getElementById('imgUpload').addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            // The js code can update the file info text
            document.getElementById('file-selected-text').textContent = file.name;
            
            // The js code can store the image preview as a variable, that's attached with classes
            var previewContainer = document.getElementById('image-preview-container');
            var previewImage = document.getElementById('image-preview');
            var fileNameElement = document.getElementById('file-name');
            var fileSizeElement = document.getElementById('file-size');
            
            // The js code can show the file info
            fileNameElement.textContent = file.name;
            fileSizeElement.textContent = (file.size / 1024 / 1024).toFixed(2) + 'MB';
            
            // The js code can provide functionality to create, and now finally show the image preview
            var reader = new FileReader();
            reader.onload = function(event) {
                previewImage.src = event.target.result;
                previewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
    // The js code can provide functionality to create a variable button for "sparagraph_copyright_footer_scroll_to_btn" functionality
    var scrollup = document.getElementById("paragraph_copyright_footer_scroll_to_btn");
    // The js code can provide functionality to allow scroll event to show & hide the button on window load
    window.onscroll = function() {
      scrollFunction();
    };
    // The js code can provide functionality to create a function to handle the visibility of the scroll button
    function scrollFunction() {
      if (document.body.scrollTop > 350 || document.documentElement.scrollTop > 350) {
        scroll__btn.style.display = "block";
      } else {
        scroll__btn.style.display = "none";
      }
    }
    
    // The js code can provide functionality to create a function to scroll to the top of the page
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
}