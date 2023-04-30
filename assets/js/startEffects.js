$(document).ready(function () {
  $(".slide-up").show("slide", { direction: "down" });
  $(".fade-in").fadeIn("slow");

  $(".blind-right").show("blind", { direction: "up" }, 500);
});
