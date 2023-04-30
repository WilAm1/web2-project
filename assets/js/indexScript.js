$(document).ready(function () {
  $(".accordion").accordion({
    collapsible: true,
    active: false,
    icons: {
      header: "iconClosed",
      activeHeader: "iconOpen",
    },
  });

  // Accordion Effects

  // gets the value of the attribute `data-companyName` and adds it to
  // deleteCompanyInput value
  $(".delete-company").click(function () {
    var companyName = $(this).attr("data-companyName");
    $("#deleteCompanyInput").val(companyName);
  });

  // Instruction Element Slide
  $(".accordion-header").click(function () {
    $(".instruction").slideUp("slow");
  });
});
