$(document).ready(function () {
  // add options to year select element
  for (i = 2023; i >= 1800; i--) {
    $("#yearStarted").append($("<option />").val(i).html(i));
  }

  var submitBtn = $("#submit");
  var nameErrMsg = $("#err");

  $("#companyName").keyup(function () {
    var inputElement = $("#companyName");
    var inputValue = inputElement.val();

    // disbales the submit button if length is less than 3 or text is only spaces.
    if (inputValue.length < 3 || inputValue.trim().length == 0) {
      inputElement.addClass("is-invalid");
      inputElement.removeClass("is-valid");
      submitBtn.addClass("btn-secondary");
      submitBtn.removeClass("btn-primary");

      nameErrMsg.html("Company name must not be empty or too short.");
      submitBtn.disabled = true;
    } else {
      var http = new XMLHttpRequest();

      http.onreadystatechange = function () {
        // checks the response from the server. Disables the submit button if 'false' is the response.
        if (http.readyState == 4 && http.status == 200) {
          var responseText = http.responseText;
          if (responseText == "false") {
            nameErrMsg.html("That company was already been created.");
            inputElement.addClass("is-invalid");
            inputElement.removeClass("is-valid");
            submitBtn.addClass("btn-secondary");
            submitBtn.removeClass("btn-primary");

            submitBtn.disabled = true;
          } else if (responseText == "true") {
            nameErrMsg.html("That company is available!");

            inputElement.addClass("is-valid");
            inputElement.removeClass("is-invalid");
            submitBtn.removeClass("btn-secondary");
            submitBtn.addClass("btn-primary");

            submitBtn.disabled = false;
          }
        }
      };
      http.open("GET", "checkIdProcess.php?q=" + inputValue, true);
      http.send();
    }
  });
});
