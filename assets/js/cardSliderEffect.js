$(document).ready(function () {
  $(".cards").sortable({ revert: true });

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
  $(".logo-box").click(function () {
    $(this).toggleClass("zoomed");
  });

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      console.log(entry);
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
        $(".card-item").each(function () {
          var delayTime = $(this).attr("data-animation-delay") * 100;
          console.log(delayTime);
          setTimeout(() => {
            $(this).addClass("showed");
          }, delayTime);
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
