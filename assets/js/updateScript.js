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
  function changeFields(xml) {
    var year = xml.find("yearStart").text();
    var tagline = xml.find("tagline").text();
    var branch = xml.find("totalBranch").text();
    var headQuarter = xml.find("headquarter").text();
    $("#yearStarted").val(year);
    $("#tagLine").val(tagline);
    $("#branches").val(branch.replace(/\,/g, ""));
    $("#headquarter").val(headQuarter);
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
    activeClass: ".drop-active",
    classes: {
      "ui-droppable-active": "dropping-active",
      "ui-droppable-hover": "dropping-hover",
    },
    drop: function (event, ui) {
      console.log("I was recieved");
      console.log(ui.draggable);
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

// drop: function (event, ui) {
//       console.log(event);
//       console.log(ui);
//       console.log("i was dropped");
//       // $(this).addClass("ui-state-highlight").find("p").html("Dropped!");
//     },
