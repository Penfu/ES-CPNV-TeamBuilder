let modal = document.getElementById('modal-team-creation')

document.getElementById('btn-create-team').onclick = function () {
  modal.classList.remove('hidden')
  document.getElementById('team-name').focus()
}

document.getElementById('btn-cancel').onclick = function () {
  modal.classList.add('hidden')
}

document
  .getElementById('modal-background')
  .addEventListener('click', function (event) {
    modal.classList.add('hidden')
  })
