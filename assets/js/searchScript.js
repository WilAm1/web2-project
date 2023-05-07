$(document).ready(function () {
  $("#search-form").submit(function () {
    return false;
  });
  function removeAutoComplete() {
    $("#autocomplete-list").slideUp("slow", function () {
      $(this).html("");
    });
  }

  // sliding logic. slidedown if there are no results. slide up if there are results.
  $("#search").keyup(function () {
    var value = $("#search").val();

    if (value.trim().length == 0) {
      removeAutoComplete();
    } else {
      var http = new XMLHttpRequest();
      http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
          var suggestions = http.responseText;

          if (suggestions.length == 0) {
            $("#autocomplete-list").html(
              '<div class="autocomplete-item">No results found.</div>'
            );
          } else {
            $("#autocomplete-list").html(suggestions).slideDown();
          }
        }
      };
      http.open("GET", "showCompaniesProcess.php?q=" + value, true);
      http.send();
    }
  });

  // removes the autocomplete if clicked outside of the autocomplete div
  $(document).click(function () {
    removeAutoComplete();
  });
});
