document.addEventListener('DOMContentLoaded', function() {
    var accordions = document.getElementsByClassName('accordion');
    for (var i = 0; i < accordions.length; i++) {
      accordions[i].addEventListener('click', function() {
        this.classList.toggle('active');
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
          panel.classList.remove('open');
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
          panel.classList.add('open');
        } 
      });
    }
  });

  function currentSlide(n) {
    var items = document.getElementsByClassName("carousel-item");
    var dots = document.getElementsByClassName("dot");
  
    if (n > items.length) { n = 1 }
    if (n < 1) { n = items.length }
  
    // Hide all items
    for (var i = 0; i < items.length; i++) {
      items[i].style.display = "none";
      items[i].classList.remove("active");
    }
  
    // Remove the "active" class from the dots
    for (var i = 0; i < dots.length; i++) {
      dots[i].classList.remove("active");
    }
  
    // Show the active item and dot
    items[n - 1].style.display = "block";
    items[n - 1].classList.add("active");
    dots[n - 1].classList.add("active");
  }
  
  // Initialize the first slide
  currentSlide(1);

