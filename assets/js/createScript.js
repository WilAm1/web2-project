$(document).ready(function () {
  //   $("#datepicker").datepicker({
  //     changeYear: true,
  //     showButtonPanel: true,
  //     dateFormat: "yy",
  //     onClose: function () {
  //       var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
  //       $(this).datepicker("setDate", new Date(year, 1));
  //     },
  //   });
  //   $(".date-picker-year").focus(function () {
  //     $(".ui-datepicker-month").hide();
  //   });
  $("#datepicker").datepicker({
    format: "yyyy",
    weekStart: 1,
    orientation: "bottom",
    viewMode: "years",
    minViewMode: "years",
  });

  //   $("#datepicker").datepicker();
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
        if (http.readyState === 4 && http.status === 200) {
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

  function handleInput(inputElement) {
    //inputElement is the company name input text
    var inputValue = inputElement.value;

    // disbales the submit button if length is less than 3 or text is only spaces.
    if (inputValue.length < 3 || inputValue.trim().length == 0) {
      inputElement.classList.add("is-invalid");
      inputElement.classList.remove("is-valid");
      submitBtn.classList.add("btn-secondary");
      submitBtn.classList.remove("btn-primary");

      nameErrMsg.innerHTML = "Company name must not be empty or too short.";
      submitBtn.disabled = true;
    } else {
      var http = new XMLHttpRequest();

      http.onreadystatechange = function () {
        // checks the response from the server. Disables the submit button if 'false' is the response.
        if (http.readyState === 4 && http.status === 200) {
          var responseText = http.responseText;
          if (responseText == "false") {
            nameErrMsg.textContent = "That company was already been created.";
            inputElement.classList.add("is-invalid");
            inputElement.classList.remove("is-valid");
            submitBtn.classList.add("btn-secondary");
            submitBtn.classList.remove("btn-primary");

            submitBtn.disabled = true;
          } else if (responseText == "true") {
            nameErrMsg.textContent = "That company is available!";

            inputElement.classList.add("is-valid");
            inputElement.classList.remove("is-invalid");
            submitBtn.classList.remove("btn-secondary");
            submitBtn.classList.add("btn-primary");

            submitBtn.disabled = false;
          }
        }
      };
      http.open("GET", "checkIdProcess.php?q=" + inputValue, true);
      http.send();
    }
  }
});
