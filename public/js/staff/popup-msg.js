function showConfirmation() {
  document.getElementById("reject").disabled = true;
  document.getElementById("reject").style.opacity = 0.5;
  document.getElementById("confirmation-dialog").showModal();
}

function hideConfirmation() {
  document.getElementById("reject").disabled = false;
  document.getElementById("reject").style.opacity = 1;
  document.getElementById("confirmation-dialog").close();
}

function showRejection() {
  document.getElementById("accept").disabled = true;
  document.getElementById("accept").style.opacity = 0.5;
  document.getElementById("rejection-dialog").showModal();
}

function hideRejection() {
  document.getElementById("accept").disabled = false;
  document.getElementById("accept").style.opacity = 1;
  document.getElementById("rejection-dialog").close();
}

