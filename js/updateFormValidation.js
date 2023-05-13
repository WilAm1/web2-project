$(document).ready(function () {
  $(".logo-box").click(function () {
    $(this).toggleClass("zoomed");
  });

  $(".toggle-preview").click(function () {
    console.log("hello");
    $(".preview-company-section").toggle("slide");
  });
  // add options to year select element
  var date = new Date();
  for (i = date.getFullYear(); i >= 1800; i--) {
    $("#yearStarted").append($("<option />").val(i).html(i));
  }

  var submitBtn = $("#submit");
  var nameErrMsg = $("#err");

  // All fields to be validated
  var fields = $(
    ".formContainer .form-control, .formContainer .form-select-year, .formContainer .file-input"
  );

  fields.keyup(function () {
    // if all fields are filled up
    var inputVal = $(this).val();
    var inputName = $(this).attr("id");

    // Handles the showing of error message to input keyups
    handleFieldValidity(inputName, inputVal, $(this));

    // Handles the 2nd Section detail input value
    if (inputVal.trim().length === 0) {
      inputVal = "<br/>";
    }
    $(".preview-" + inputName).html(inputVal);

    // Toggles the submit button
    if (allFieldUp(fields)) {
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

  $("#picture").change(function () {
    // if all fields are filled up
    if (allFieldUp(fields)) {
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
  $("#yearStarted").change(function () {
    var inputVal = $(this).val();
    if (inputVal.trim().length === 0) {
      inputVal = "<br/>";
    }
    $(".preview-yearStarted").html(inputVal);
    addValidStyle($(this));
  });

  // Checks the validity of Company Name
  $("#companyName").keyup(handleCompanyNameValidity);

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
  $fileInput.on("change ", handleFileChange);
  $fileInput.on("click ", handleFileClick);

  function handleCompanyNameValidity() {
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
      http.open("GET", "/process/checkIdProcess.php?q=" + inputValue, true);
      http.send();
    }
  }
});

function addValidStyle(jqueryElement) {
  jqueryElement.removeClass("is-invalid");
  jqueryElement.addClass("is-valid");
}
function addInvalidStyle(jqueryElement) {
  jqueryElement.removeClass("is-valid");
  jqueryElement.addClass("is-invalid");
}

// File input

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(".preview-picture")
        .attr("src", e.target.result)
        .effect("bounce", "slow");

      $(".preview-file-drop-picture")
        .attr("src", e.target.result)
        .effect("bounce", "fast");
    };

    reader.readAsDataURL(input.files[0]);
  }
}
function handleFieldValidity(inputName, inputVal, jqueryElem) {
  // check each field if they are correct.
  switch (inputName) {
    case "yearStarted":
    case "tagLine":
    case "headquarter": {
      if (inputVal.trim().length === 0) {
        addInvalidStyle(jqueryElem);
      } else {
        addValidStyle(jqueryElem);
      }
      break;
    }
    case "branches": {
      if (inputVal.trim().length === 0 || isNaN(inputVal)) {
        addInvalidStyle(jqueryElem);
      } else {
        addValidStyle(jqueryElem);
      }
      break;
    }
  }
}

function handleFileClick() {
  var filesCount = $(this)[0].files.length;
  var $textContainer = $(this).prev();

  if (filesCount === 1) {
    var fileName = $(this).val().split("\\").pop();
    $textContainer.text(fileName);
    addValidStyle($(this));
    $(this).removeClass("invalid");
  } else {
    addInvalidStyle($(this));
    $(this).addClass("invalid");
  }
}
function handleFileChange() {
  var filesCount = $(this)[0].files.length;
  var $textContainer = $(this).prev();

  if (filesCount === 1) {
    // if single file is selected, show file name
    var fileName = $(this).val().split("\\").pop();
    $textContainer.text(fileName);
    readURL($(this)[0]);
    addValidStyle($(this));
  } else {
    $(this).addClass("is-invalid");
    $(this).removeClass("is-valid");
  }
}
// Checks if all fields have value
function allFieldUp(fields) {
  return (
    fields.filter(function () {
      if (this.name === "picture") {
        return false;
      }
      return this.value === "";
    }).length === 0
  );
}
