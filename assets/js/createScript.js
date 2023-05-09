$(document).ready(function () {
  // add options to year select element
  for (i = 2023; i >= 1800; i--) {
    $("#yearStarted").append($("<option />").val(i).html(i));
  }

  var submitBtn = $("#submit");
  var nameErrMsg = $("#err");

  var fields = $(
    ".formContainer .form-control, .formContainer .form-select, .formContainer .file-input"
  );

  $("#picture").change(function () {
    // if all fields are filled up
    if (allFieldUp(fields)) {
      console.log("hwere");
      submitBtn.prop("disabled", false);

      submitBtn.removeClass("btn-secondary");
      submitBtn.addClass("btn-primary");
      submitBtn.disabled = false;
    } else {
      submitBtn.addClass("btn-secondary");
      submitBtn.removeClass("btn-primary");
      submitBtn.prop("disabled", true);
    }
  });
  fields.keyup(function () {
    // if all fields are filled up
    if (allFieldUp(fields)) {
      console.log("hwere");
      submitBtn.prop("disabled", false);

      submitBtn.removeClass("btn-secondary");
      submitBtn.addClass("btn-primary");
      submitBtn.disabled = false;
    } else {
      submitBtn.addClass("btn-secondary");
      submitBtn.removeClass("btn-primary");
      submitBtn.prop("disabled", true);
    }
  });

  $("#companyName").keyup(function () {
    var inputElement = $("#companyName");
    var inputValue = inputElement.val();

    // disbales the submit button if length is less than 3 or text is only spaces.
    if (inputValue.length < 3 || inputValue.trim().length == 0) {
      inputElement.addClass("is-invalid");
      inputElement.removeClass("is-valid");
      submitBtn.addClass("btn-secondary");
      submitBtn.removeClass("btn-primary");
      submitBtn.prop("disabled", true);
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
            submitBtn.prop("disabled", true);
          } else if (responseText == "true") {
            nameErrMsg.html("That company is available!");
            inputElement.addClass("is-valid");
            inputElement.removeClass("is-invalid");
          }
        }
      };
      http.open("GET", "checkIdProcess.php?q=" + inputValue, true);
      http.send();
    }
  });

  function allFieldUp(fields) {
    return (
      fields.filter(function () {
        if (this.id === "picture") {
          console.log("hello world");
          console.log(this.files.length);
          return this.files.length === 0;
        }
        return this.value === "";
      }).length === 0
    );
  }

  var $fileInput = $(".file-input");
  var $droparea = $(".file-drop-area");

  // highlight drag area
  $fileInput.on("dragenter focus click", function () {
    $droparea.addClass("is-active");
  });

  // back to normal state
  $fileInput.on("dragleave blur drop", function () {
    $droparea.removeClass("is-active");
  });

  // change inner text
  $fileInput.on("change", function () {
    var filesCount = $(this)[0].files.length;
    var $textContainer = $(this).prev();

    if (filesCount === 1) {
      // if single file is selected, show file name
      var fileName = $(this).val().split("\\").pop();
      $textContainer.text(fileName);
    } else {
      // otherwise show number of files
      $textContainer.text(filesCount + " files selected");
    }
  });
});
