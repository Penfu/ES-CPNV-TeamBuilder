let mobileMenu = document.getElementById('mobile-menu')
let profileDropdown = document.getElementById('profile-dropdown')
let icoBtnMenuOpen = document.getElementById('ico-btn-menu-open')
let icoBtnMenuClose = document.getElementById('ico-btn-menu-close')

document
  .getElementById('btn-toggle-navbar')
  .addEventListener('click', function (event) {
    if (mobileMenu.classList.contains('hidden')) {
      icoBtnMenuOpen.classList.add('hidden')
      icoBtnMenuClose.classList.remove('hidden')
      mobileMenu.classList.remove('hidden')
    } else {
      icoBtnMenuOpen.classList.remove('hidden')
      icoBtnMenuClose.classList.add('hidden')
      mobileMenu.classList.add('hidden')
    }
  })

document
  .getElementById('btn-profile-dropdown')
  .addEventListener('click', function (event) {
    if (profileDropdown.classList.contains('hidden'))
      profileDropdown.classList.remove('hidden')
    else profileDropdown.classList.add('hidden')
  })

document.addEventListener('click', function (event) {
  if (
    event.target.closest('#profile-dropdown') ||
    event.target.closest('#btn-profile-dropdown')
  )
    return
  else {
    if (profileDropdown.classList.contains('hidden')) return
    else profileDropdown.classList.add('hidden')
  }
})
