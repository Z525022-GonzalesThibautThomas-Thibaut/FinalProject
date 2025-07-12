/*Script date selector navbar*/
flatpickr("#date", {
    dateFormat: "Y-m-d"
});
/*End of Script date selector navbar*/

/*Script dropdown menu navbar*/
const dropdown_button = document.getElementById('dropdown-button');
const menu = document.getElementById('dropdown-content');

dropdown_button.addEventListener('click', () => {
  if (menu.style.display === 'block') {
    menu.style.display = 'none';
  } else {
    menu.style.display = 'block';
  }
});


window.addEventListener('click', (e) => {
  if (!dropdown_button.contains(e.target) && !menu.contains(e.target)) {
    menu.style.display = 'none';
  }
});
/*End of Script dropdown menu navbar*/