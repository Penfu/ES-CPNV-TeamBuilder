let menu = document.getElementById('mobile-menu')

document
  .querySelector('#btn-toggle-navbar')
  .addEventListener('click', function (event) {
    if (menu.style.display === 'block') {
      menu.style.display = 'none'
    } else {
      menu.style.display = 'block'
    }
  });
