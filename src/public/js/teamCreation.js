let btnOpen = document.getElementById("btn-open-modal");
let btnClose = document.getElementById("btn-close-modal");
let modal = document.getElementById("modal-team-creation");
let modalBackground = document.getElementById("modal-background");

btnOpen.onclick = function () {
  console.log("Button Open Clicked");
  modal.style.display = "block";
};

btnClose.onclick = function () {
  console.log("Button Close Clicked");
  modal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == modalBackground) {
    modal.style.display = "none";
  }
};
