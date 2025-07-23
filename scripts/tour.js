/*Script date selector navbar*/
flatpickr("#tour-date", {
    dateFormat: "Y-m-d",
    allowInput: true
});
document.addEventListener('DOMContentLoaded', () => {
  const guestsInput = document.getElementById('tour-guests');
  const priceDisplay = document.getElementById('price_display');
  const unitPrice = parseInt(document.querySelector('input[name="unit_price"]').value, 10);

  function updatePrice() {
    console.log('updatePrice triggered');
    const guests = parseInt(guestsInput.value, 10);
    if (!isNaN(guests) && guests > 0) {
      const total = guests * unitPrice;
      priceDisplay.textContent = '¥' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
    } else {
      priceDisplay.textContent = '¥0';
    }
  }

  guestsInput.addEventListener('input', updatePrice);
  guestsInput.addEventListener('change', updatePrice);
});

