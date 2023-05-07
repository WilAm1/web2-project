$(document).ready(function () {
  function fetchData() {
    var companyName = $("#name").val();
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
    var year = xml.find("yearStart").text();
    var tagline = xml.find("tagline").text();
    var branch = xml.find("totalBranch").text();
    var headQuarter = xml.find("headquarter").text();

    console.log(headQuarter);
    console.log(branch);
    $("#yearStarted").val(year);
    $("#tagLine").val(tagline);
    $("#branches").val(branch.replace(/\,/g, ""));
    $("#headquarter").val(headQuarter);
  }

  $("#name").change(fetchData);
  fetchData();
});
