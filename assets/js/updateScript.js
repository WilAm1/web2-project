$(document).ready(function () {
  function fetchData() {
    var companyName = $("#name").val().trim();
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
  $("#updateForm").bind("submit", function () {
    {
      $(this).find("select").prop("disabled", false);
    }
  });
  function changeFields(xml) {
    var year = xml.find("yearStart").text();
    var tagline = xml.find("tagline").text();
    var branch = xml.find("totalBranch").text();
    var headQuarter = xml.find("headquarter").text();
    var picture = xml.find("picture").text();
    $("#yearStarted").val(year);
    $("#tagLine").val(tagline);
    $("#branches").val(branch.replace(/\,/g, ""));
    $("#headquarter").val(headQuarter);
    $(".preview-file-drop-picture").attr("src", "data:image;base64," + picture);
  }

  $("#name").change(fetchData);

  // Drag Functionality
  // $(".cards").sortable({
  //   revert: true,
  // });
  $(".draggable-card").draggable({
    connectToSortable: ".cards",
    revert: "invalid",
    cursor: "grab",
    classes: {
      "ui-draggable": "card-drag-default",
      "ui-draggable-dragging": "card-dragging",
    },
    drag: function (event, ui) {
      $(".edit-company-content").removeClass("hidden");
    },
    stop: function (event, ui) {
      $(".edit-company-content").addClass("hidden");
    },
  });
  $("#drop-company").droppable({
    accept: ".draggable-card",
    hoverClass: "dropping-hover",
    classes: {
      "ui-droppable-hover": "dropping-hover",
      "ui-droppable-active": "dropping-active",
    },

    drop: function (event, ui) {
      var companyName = ui.draggable.attr("data-company-name");
      showCompanyUpdateModal(companyName);
    },
  });

  function showCompanyUpdateModal(companyName) {
    $("#update-company-disabled").val(companyName);
    $("#update-company-disabled").html(companyName);
    fetchData();
    $(".edit-company-content").addClass("hidden");

    $("#theModal").modal("show");
  }
});
