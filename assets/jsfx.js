$(document).ready(function () {
  $(".form-control").keydown(function () {
    $(".autocomplete-items").slideToggle("fast");
  });
});
