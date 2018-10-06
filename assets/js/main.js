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
  var validity = field.validity;

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

  var message = field.form.querySelector('[data-form-error]#error-for-' + id);

  if (!message) {
    message = document.createElement('p');
    message.className = 'form-error';
    message.id = 'error-for-' + id;
    message.setAttribute('data-form-error', true);

    field.parentNode.insertBefore(message, field.nextSibling);
  }

  field.setAttribute('aria-describedby', 'error-for-' + id);

  message.innerHTML = error;
}

function removeError(field) {
  field.classList.remove('has-error');
  field.removeAttribute('aria-describedby');

  var id = field.id || field.name;

  if (!id) {
    return;
  }

  var message = field.form.querySelector('[data-form-error]#error-for-' + id);

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
  for (var i = 0; i < fields.length; i++) {
    var error = hasError(fields[i]);
  
    if (error) {
      showError(fields[i], error);
  
      if (!hasErrors) {
        hasErrors = fields[i];
      }
    }
  }

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

  formData.append('action', 'submit_form_data');

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

function getPrice() {
  var pricePerDay = (month > 6 && month < 9) ? 200.00 : 250.00;
  var extraPerPerson = (month > 6 && month < 9) ? 20.00 : 30.00;
  var discountPercentage = 20;
  var discountAfter = 4;
  var cleaningFee = 60.00;
  var tax = 2.70;

  var count = document.querySelectorAll('td.datepick-current-day').length;
  var numberOfPeople = parseInt(document.querySelector('select#count1').value);
  var currentPrice = pricePerDay * count + cleaningFee + (tax * count * numberOfPeople);
  var discount = discountPercentage * (count * pricePerDay) / 100;

  if (count > discountAfter) {
    currentPrice = (pricePerDay * count - discount) + cleaningFee + (tax * count * numberOfPeople);
  }

  if (numberOfPeople > 4) {
    currentPrice += extraPerPerson;
  }

  return parseFloat(currentPrice).toFixed(2);
}


// Active Pricing Card
var month = new Date().getMonth();

enableActiveCard(month);



// Responsive Menu
var menuToggle = document.querySelector('[data-menu-button]');
var menuWrapper = document.querySelector('[data-menu]');

menuToggle.addEventListener('click', function() {
  toggleMobileMenu(menuWrapper, menuToggle);
});



// Contact form
var contactForm = document.querySelector('[data-contact-form]');

if (contactForm) {
  var submitButton = contactForm.querySelector('button');
  contactForm.setAttribute('novalidate', true); 
  contactForm.addEventListener('submit', handleSubmit);
  contactForm.addEventListener('blur', handleBlur, true);
}



// Litebox
new Litebox({
  el: '.gallery a'
});


document.addEventListener('DOMContentLoaded', function() {
  var priceField = document.createElement('p');
  priceField.textContent = 'Bitte wählen Sie Tage aus, um die Kosten hier zu sehen.';
  priceField.classList.add('final-price');
  document.querySelector('.wpbc_structure_calendar').appendChild(priceField);
  
  document.body.addEventListener('click', function(event) {
    if (event.target.matches('td.date_available') || event.target.parentNode.matches('td.date_available')) {
      priceField.textContent = 'Gschätzte Kosten: ' + getPrice(month) + '€';
    }
  });

  document.body.addEventListener('change', function(event) {
    if (event.target.matches('select#count1')) {
      priceField.textContent = 'Gschätzte Kosten: ' + getPrice(month) + '€';
    }
  });
});