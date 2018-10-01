function enableActiveCard(month) {
  if (document.querySelectorAll('[data-card]').length > 0) {
    if (month > 6 && month < 9) {
      document.querySelector('[data-card="summer"]').classList.add('has-ribbon');
    } else {
      document.querySelector('[data-card="winter"]').classList.add('has-ribbon');
    }
  }
}

function hasError(field) {
  let validity = field.validity;

  if (field.type === 'submit' || field.type === 'button') {
    return;
  }

  if (validity.valid) {
    return;
  }

  if (validity.valueMissing) {
    return 'Bitte füllen Sie dieses Feld aus.';
  }

  if (validity.tooShort) {
    return 'Ihr Text ist zu kurz.';
  }

  if (validity.patternMismatch || validity.typeMismatch) {
    return 'Bitte geben Sie eine gültige E-Mail ein.';
  }
}

function handleBlur(event) {
  if (!event.target.form.hasAttribute('data-contact-form')) {
    return;
  }

  var error = hasError(event.target);

  if (error) {
    showError(event.target, error);
    return;
  }

  removeError(event.target);
}

function showError(field, error) {
  field.classList.add('has-error');

  var id = field.id || field.name;

  if (!id) {
    return;
  }

  var message = field.form.querySelector(`[data-form-error]#error-for-${id}`);

  if (!message) {
    message = document.createElement('p');
    message.className = 'form-error';
    message.id = `error-for-${id}`;
    message.setAttribute('data-form-error', true);

    field.parentNode.insertBefore(message, field.nextSibling);
  }

  field.setAttribute('aria-describedby', `error-for-${id}`);

  message.innerHTML = error;
}

function removeError(field) {
  field.classList.remove('has-error');
  field.removeAttribute('aria-describedby');

  var id = field.id || field.name;

  if (!id) {
    return;
  }

  var message = field.form.querySelector(`[data-form-error]#error-for-${id}`);

  if (!message) {
    return;
  }

  field.parentNode.removeChild(message);
}

function handleSubmit(event) {
  event.preventDefault();

  var fields = this.elements;
  var hasErrors = null;
  var honeypotField = this.querySelector('input.js-tricky');

  if (honeypotField.checked) {
    return;
  }

  // Check each field for errors and store the first one in `hasErrors`
  Array.from(fields).forEach(function(field) {
    let error = hasError(field);

    if (error) {
      showError(field, error);

      if (!hasErrors) {
        hasErrors = field;
      }
    }
  });

  // If there is a field with an error show it, otherwise submit
  if (hasErrors) {
    hasErrors.focus();
  } else {
    submitButton.disabled = true;
    submitButton.textContent = 'Nachricht wird gesendet...';

    sendForm(event.target);
  }
}

function sendForm(form) {
  var xhr = new XMLHttpRequest();
  var formData = new FormData(form);

  formData.append('action', 'contact_send');

  xhr.addEventListener('load', handleFormSuccess);
  xhr.addEventListener('error', handleFormError);
  xhr.open('POST', '/wp-admin/admin-ajax.php');
  xhr.send(formData);
}

function handleFormSuccess(response) {
  if (this.readyState === 4) {
    if (this.status === 200) {
      submitButton.textContent = 'Nachricht gesendet';
      showMessage('Vielen Dank, Ihre Nachricht wurde gesendet. Wir werden uns demnächst bei Ihnen melden.');
    } else {
      submitButton.textContent = 'Fehler beim Senden der Nachricht.';
      showMessage('Leider ist beim Senden Ihrer Nachricht ein Fehler aufgetreten. Bitte versuchen Sie es direkt an info@zaehringer-huette.de.', true);
    }
  }
}

function showMessage(msg, stay) {
  var p = document.createElement('p');

  p.textContent = msg;
  p.classList.add('success-message');

  contactForm.appendChild(p);

  if (!stay) {
    setTimeout(function() {
      contactForm.removeChild(p);
    }, 5000);
  }
}

function handleFormError() {
  submitButton.textContent = 'Fehler beim Senden der Nachricht.';
  showMessage('Leider ist beim Senden Ihrer Nachricht ein Fehler aufgetreten. Bitte versuchen Sie es direkt an info@zaehringer-huette.de.', true);
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



// Contact form
var contactForm = document.querySelector('[data-contact-form]');
var submitButton = contactForm.querySelector('button');
contactForm.setAttribute('novalidate', true); 
contactForm.addEventListener('submit', handleSubmit);
contactForm.addEventListener('blur', handleBlur, true);



// Litebox
new Litebox({
  el: '.gallery a'
});