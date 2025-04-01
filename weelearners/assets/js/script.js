var hamburgerMenu = document.querySelector('.div-hamburger-menu');
var navLinks = document.querySelector('.ul-nav-links');

hamburgerMenu.addEventListener('click', () => {
    hamburgerMenu.classList.toggle('active');
    navLinks.classList.toggle('open');
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

// This js code can provide functionality to create a function to scroll to the top of the page
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}