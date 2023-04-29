$(document).ready(function () {
  var input = document.getElementById("search");
  var autocompleteContainerElement =
    document.getElementById("autocomplete-list");

  function handleInput(value) {
    if (value.trim().length === 0) {
      return;
    }
    var http = new XMLHttpRequest();
    http.onreadystatechange = function () {
      if (http.readyState == 4 && http.status == 200) {
        var suggestions = http.responseText;
        autocompleteContainerElement.innerHTML = suggestions;
      }
    };
    http.open("GET", "showCompaniesProcess.php?q=" + value, true);
    http.send();
  }

  // if dropdown is clicked, redirect to this url.
  function handleDropdownClick(value) {
    window.location.href = "/searchProcess.php?q=" + value;
  }
  // if the user clicks anywhere in the page , the container will get closed.
  document.addEventListener("click", () => {
    autocompleteContainerElement.innerHTML = "";
  });
});
