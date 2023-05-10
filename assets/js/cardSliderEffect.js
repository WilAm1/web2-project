$(document).ready(function () {
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
  $(".card-image").on("click", function () {
    $(".imagepreview").attr("src", $(this).find("img").attr("src"));
    $("#imagemodal").modal("show");
  });
});
