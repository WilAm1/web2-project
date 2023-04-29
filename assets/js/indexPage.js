$(document).ready(function () {
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

  // removes the autocomplete if clicked outside of the autocomplete div
  $(document).click(function () {
    removeAutoComplete();
  });

  // adds accordion
  $(".accordion").accordion({
    collapsible: true,
    active: false,
    icons: {
      header: "iconClosed",
      activeHeader: "iconOpen",
    },
  });

  // gets the value of the attribute `data-companyName` and adds to
  // deleteCompanyInput value
  $(".delete-company").click(function () {
    var companyName = $(this).attr("data-companyName");
    $("#deleteCompanyInput").val(companyName);
  });

  // exploding
  $(".accordion-header").click(function (param) {
    $(".exploding").slideUp("slow");
  });
});
