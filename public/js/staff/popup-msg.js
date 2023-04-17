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

function validateForm() {
  var rejectReason = document.getElementById("reject-reason");
  if (rejectReason.value.trim()=="") {
    rejectReason.style.outline = "2px solid red";
    navigator.vibrate([500, 200, 500]);
    rejectReason.classList.add("empty");
    rejectReason.style.textDecorationColor = "Red";
    return false;
  } else {
    rejectReason.style.outline = "black";
    rejectReason.classList.remove("empty");
    return true;
  }
 
}

var rejectReason = document.getElementById("reject-reason");
rejectReason.addEventListener("input", function() {
  rejectReason.classList.remove("empty");
  rejectReason.style.outline = "black";
  rejectReason.style.color = "black";
  });

