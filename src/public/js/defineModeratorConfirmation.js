let modal = document.getElementById('modal-define-moderator-confirmation')
let idToReplace = '%id%'
let nameToReplace = '%name%'

document.querySelectorAll('.btn-define-moderator').forEach(item => {
  item.addEventListener('click', event => {
    var member = JSON.parse(item.dataset.member);
    var form = document.getElementById('form');
    var message = document.getElementById('message');

    form.action = form.action.replace(idToReplace, member.id);
    message.innerHTML = message.innerHTML.replace(nameToReplace, member.name);

    idToReplace = member.id;
    nameToReplace = member.name;
    modal.classList.remove('hidden')
  })
})

document.getElementById('btn-cancel').addEventListener('click', event => {
  modal.classList.add('hidden')
})

window.onclick = function (event) {
  if (event.target == modal) {
    modal.classList.add('hidden')
  }
}
