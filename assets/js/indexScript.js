$(document).ready(function () {
  $(".accordion").accordion({
    collapsible: true,
    active: false,
    // these are the classes of the triangle icon on the accordion header. header is the closed icon and activeHeader is the open one
    icons: {
      header: "iconClosed",
      activeHeader: "iconOpen",
    },
  });

  // Accordion Effects

  // gets the value of the attribute `data-companyName` and adds it to
  // deleteCompanyInput value in the modal. This is used if the user clicks the delete button on the modal
  $(".delete-company").click(function () {
    var companyName = $(this).attr("data-companyName");
    $("#deleteCompanyInput").val(companyName);
  });

  // Instruction Element Slide
  $(".accordion-header").click(function () {
    $(".instruction").slideUp("slow");
  });
});
