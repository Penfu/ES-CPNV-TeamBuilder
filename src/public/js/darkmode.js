if (
  localStorage.theme === 'dark' ||
  (!'theme' in localStorage &&
    window.matchMedia('(prefers-color-scheme: dark)').matches)
) {
  document.body.classList.add('dark')
} else if (localStorage.theme === 'dark') {
  document.body.classList.add('dark')
}

document
  .getElementById('btn-toggle-darkmode')
  .addEventListener('click', function () {
    if (localStorage.theme == 'dark') {
      document.body.classList.remove('dark')
      localStorage.removeItem('theme')
    } else {
      document.body.classList.add('dark')
      localStorage.theme = 'dark'
    }
  })
