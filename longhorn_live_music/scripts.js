$(document).ready(function () {
  function changeOrange(event) {
    event.target.style.color = "#bf5700";
  }
  function changeBlack(event) {
    event.target.style.color = "black";
  }

  $(".header-outside").mouseover(changeOrange);
  $(".header-outside").mouseout(changeBlack);

  $(".header-inside").mouseover(changeOrange);
  $(".header-inside").mouseout(changeOrange);
});

var submitButton = document.getElementById("submit");
submitButton.addEventListener("click", validateInput);

var clearButton = document.getElementById("clear");
clearButton.addEventListener("click", clearForm);

function validateInput() {
  var email = document.getElementById("email").value;

  // Email validation
  if (
    email.match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    )
  ) {
    window.alert("Email is valid. Thank you for your feedback!");
  } else {
    window.alert("Invalid email.");
    return;
  }
}

function clearForm() {
  document.getElementById("email").value = "";
  document.getElementById("feedback").value = "";
}
