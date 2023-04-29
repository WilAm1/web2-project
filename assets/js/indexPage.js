$(document).ready(function () {
  function removeAutoComplete() {
    $("#autocomplete-list").slideUp("slow", function () {
      $(this).html("");
    });
  }

  $("#search").keyup(function () {
    var value = $("#search").val();

    if (value.trim().length == 0) {
      removeAutoComplete();
    } else {
      var http = new XMLHttpRequest();
      http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
          var suggestions = http.responseText;

          if (suggestions.length === 0) {
            removeAutoComplete();
          } else {
            $("#autocomplete-list").html(suggestions).slideDown();
          }
        }
      };
      http.open("GET", "showCompaniesProcess.php?q=" + value, true);
      http.send();
    }
  });

  $(document).click(function () {
    removeAutoComplete();
  });

  $(".accordion").accordion({
    collapsible: true,
    active: false,
    icons: {
      header: "iconClosed",
      activeHeader: "iconOpen",
    },
  });
});
