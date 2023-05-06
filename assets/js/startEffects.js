$(document).ready(function () {
  $(".slide-up").show("slide", { direction: "down" });
  $(".fade-in").fadeIn("slow");

  $(".blind-up").show("blind", { direction: "up" }, 500);
});
