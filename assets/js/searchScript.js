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
            $("#autocomplete-list")
              .html('<div class="autocomplete-item">No results found.</div>')
              .slideDown();
          } else {
            $("#autocomplete-list").html(suggestions).slideDown();

            $(".autocomplete-item").click(function () {
              var companyName = $(this).attr("data-company-name");

              fetchData(companyName);
            });
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
function fetchData(companyName) {
  $.ajax({
    url: "/BSIT3EG1G4.xml",
    type: "GET",
    dataType: "xml",
    success: function (xml) {
      $(xml)
        .find("companyName")
        .each(function () {
          if ($(this).text() === companyName) {
            var parentElem = $(this).parent();
            changeFields(parentElem);
            return;
          }
        });
    },
  });
}
function changeFields(xml) {
  var name = xml.find("companyName").text();
  var year = xml.find("yearStart").text();
  var tagline = xml.find("tagline").text();
  var branch = xml.find("totalBranch").text();
  var headQuarter = xml.find("headquarter").text();
  var picture = xml.find("picture").text();
  $(".modal-name").html(name);
  $(".modal-year").html(year);
  $(".modal-branches").html(branch);
  $(".modal-tagline").html(tagline);
  $(".modal-headquarter").html(headQuarter);
  $(".modal-picture").attr("src", "data:image;base64," + picture);
}
