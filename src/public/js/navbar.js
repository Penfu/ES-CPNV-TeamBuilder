let icoBtnMenuOpen = document.getElementById('ico-btn-menu-open')
let icoBtnMenuClose = document.getElementById('ico-btn-menu-close')

let menu = document.getElementById('mobile-menu')

document
  .querySelector('#btn-toggle-navbar')
  .addEventListener('click', function (event) {
    if (menu.classList.contains('hidden')) {
      icoBtnMenuOpen.classList.add('hidden')
      icoBtnMenuClose.classList.remove('hidden')
      menu.classList.remove('hidden')
    } else {
      icoBtnMenuOpen.classList.remove('hidden')
      icoBtnMenuClose.classList.add('hidden')
      menu.classList.add('hidden')
    }
  })
