$(document).ready(function () {
  $(".cards").sortable({ revert: true });

  $(".card-item").mouseenter(function () {
    $(this).children(".card-hovered").show("slide", { direction: "down" });
  });
  $(".card-item").mouseleave(function () {
    $(this).children(".card-hovered").hide("slide", { direction: "down" });
  });
  $(".logo-box").click(function () {
    $(this).toggleClass("zoomed");
  });

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      console.log(entry);
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
        $(".card-item").each(function () {
          $(this).addClass("showed");
        });
      } else {
        entry.target.classList.remove("show");
      }
    });
  });
  var hiddenElems = document.querySelectorAll(".cards");
  hiddenElems.forEach(function (elem) {
    observer.observe(elem);
  });
});

// .delay($(this).attr("data-animation-delay") * 100)
