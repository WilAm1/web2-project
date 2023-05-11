$(document).ready(function () {
  $(".cards").sortable({ revert: true });
  $(".card").draggable({
    connectToSortable: ".cards",
    revert: true,
  });
  $(".card-content").click(function () {
    $(this)
      .parent()
      .parent()
      .children(".card-hovered")
      .show("slide", { direction: "down" });
  });
  $(".card-hovered").mouseleave(function () {
    $(this).hide("slide", { direction: "down" });
  });
  $(".modal-picture").on("click", function () {
    $(".imagepreview").attr("src", $(this).attr("src"));
    $("#imagemodal").modal("show");
  });
});
