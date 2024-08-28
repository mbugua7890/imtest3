document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Thank you for contacting us! We will get back to you soon.');
});

document.getElementById('newsletter-form').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Thank you for subscribing to our newsletter!');
});

document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');

    menuToggle.addEventListener('click', function() {
        navLinks.classList.toggle('show');
    });
});

