// ** Input de incrementar e decrementar e Carrinho... ** //

const quantityControls = document.querySelectorAll('.quantity-control');

quantityControls.forEach(control => {
  const decreaseButton = control.querySelector('.decrease');
  const increaseButton = control.querySelector('.increase');
  const quantityInput = control.querySelector('.quantity-input');

  decreaseButton.addEventListener('click', () => {
    const currentValue = parseInt(quantityInput.value, 10) || 0;
    if (currentValue > 0) {
      quantityInput.value = currentValue - 1;
    }
  });

  increaseButton.addEventListener('click', () => {
    const currentValue = parseInt(quantityInput.value, 10) || 0;
    quantityInput.value = currentValue + 1;
  });
});