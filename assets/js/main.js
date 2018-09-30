function enableActiveCard(month) {
  if (document.querySelectorAll('[data-card]').length > 0) {
    if (month > 6 && month < 9) {
      document.querySelector('[data-card="summer"]').classList.add('has-ribbon');
    } else {
      document.querySelector('[data-card="winter"]').classList.add('has-ribbon');
    }
  }
}

function scrollIntoView(event) {
  event.preventDefault();
  
  var target = document.querySelector(this.hash);

  if (target) {
    target.scrollIntoView({
      block: 'start',
      behavior: 'smooth'
    });
  }
}

function toggleMobileMenu(menu, button) {
  var icon = button.querySelector('use');
  var text = button.querySelector('span');

  if (!menu.classList.contains('is-open')) {
    menu.classList.add('is-open');
    text.textContent = 'Menu schließen';
    icon.setAttribute('xlink:href', icon.getAttribute('xlink:href').replace('#icon-menu', '#icon-close'));
  } else {
    menu.classList.remove('is-open');
    text.textContent = 'Menu anzeigen';
    icon.setAttribute('xlink:href', icon.getAttribute('xlink:href').replace('#icon-close', '#icon-menu'));
  }
}


document.addEventListener('DOMContentLoaded', function() {
  // Active Pricing Card
  var month = new Date().getMonth();

  enableActiveCard(month);



  // Smooth Scrolling
  var links = document.querySelectorAll('[data-menu] a');
  
  [].forEach.call(links, function(link) {
    link.addEventListener('click', scrollIntoView);
  });
  


  // Responsive Menu
  var menuToggle = document.querySelector('[data-menu-button]');
  var menuWrapper = document.querySelector('[data-menu]');

  menuToggle.addEventListener('click', function() {
    toggleMobileMenu(menuWrapper, menuToggle);
  });



  // Litebox
  new Litebox();
});