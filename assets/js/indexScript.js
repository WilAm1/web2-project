$(document).ready(function () {
  $(".active+.active-box").css("visibility", "visible");
  $(".card-btn").click(function () {
    var companyName = $(this).attr("data-company-name");
    fetchData(companyName);
  });
});
