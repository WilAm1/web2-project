$(document).ready(function () {
  $("#search").keyup(function () {
    var value = $("#search").val();

    if (value.trim().length === 0) {
      $("#autocomplete-list").slideUp().html(" ");
      return;
    }

    var http = new XMLHttpRequest();
    http.onreadystatechange = function () {
      if (http.readyState == 4 && http.status == 200) {
        var suggestions = http.responseText;

        if (suggestions.length === 0) {
          $("#autocomplete-list").slideUp().html("");
        } else {
          $("#autocomplete-list").html(suggestions).slideDown();
        }
      }
    };
    http.open("GET", "showCompaniesProcess.php?q=" + value, true);
    http.send();
  });

  $(".autocomplete-item").click(function () {
    window.location.href =
      "/searchProcess.php?q=" + $(this).attr("data-companyName");
  });
  function handleDropdownClick(value) {
    window.location.href = "/searchProcess.php?q=" + value;
  }

  $(document).click(function () {
    console.log("I ran");
    $("autocomplete-list").html("");
  });
});
