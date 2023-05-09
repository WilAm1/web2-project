$(document).ready(function () {
  $(".card-btn").click(function () {
    var companyName = $(this).attr("data-company-name");
    fetchData(companyName);
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
