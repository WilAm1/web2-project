$(document).ready(function () {
  $(".slide-up").delay(500).show("slide", { direction: "down" });
  $(".fade-in").delay(500).fadeIn("slow");

  $(".blind-up").show("blind", { direction: "up" }, 500);
  $("#toast-close").click(function () {
    $(".toast").hide();
  });
});
