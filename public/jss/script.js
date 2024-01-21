// Obtener todos los botones de asiento
var seatButtons = document.querySelectorAll('.seat');

// Recorrer cada botón de asiento
seatButtons.forEach(function(button) {
  // Obtener el precio del atributo data-price
  var price = button.getAttribute('data-price');

  // Crear elemento span para mostrar el precio
  var priceElement = document.createElement('span');
  priceElement.className = 'seat-price';
  priceElement.textContent = '$' + price;

  // Agregar el elemento de precio al botón de asiento
  button.appendChild(priceElement);

  // Evento para mostrar el precio cuando el cursor está sobre el botón
  button.addEventListener('mouseenter', function() {
    priceElement.style.display = 'block';
    button.classList.add('show-price');
  });

  // Evento para ocultar el precio cuando el cursor sale del botón
  button.addEventListener('mouseleave', function() {
    priceElement.style.display = 'none';
    button.classList.remove('show-price');
  });
});
