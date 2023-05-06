$(document).ready(function () {
  $(".card-item").hover(function () {
    $(this).children(".card-hovered").toggle("slide", { direction: "down" });
  });
});
