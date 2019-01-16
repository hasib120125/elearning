$(document).ready(function () {
  $(".search-bar").hover(
    function () {
      $(this).addClass('hover');
    },
    function () {
      $(this).removeClass('hover');
    }
  );

  $(".notification-container").hover(
    function () {
      $(this).addClass('hover');
    },
    function () {
      $(this).removeClass('hover');
    }
  );

  $(".access-container").hover(
    function () {
      $(this).addClass('hover');
    },
    function () {
      $(this).removeClass('hover');
    }
  );

  $('.advance-search').click(function() {
    $(this).toggleClass("active");
});

  var owl = $('.owl-carousel');
  owl.owlCarousel({
    loop: true,
      nav: true,
      dots: false,
      rtl: true,
      items: 4,
      navText: ["&#10095;", "&#10094;"]
  });
  owl.on('mousewheel', '.owl-stage', function (e) {
      if (e.deltaY>0) {
          owl.trigger('next.owl');
      } else {
          owl.trigger('prev.owl');
      }
      e.preventDefault();
  });

  $("#rateYo").rateYo({
    rating: 2.5,
    normalFill: "#808080",
    ratedFill: "#FFDD00",
    starWidth: "18px",
    fullStar: true,
    readOnly: true
  });

  $("#rateYo2").rateYo({
    rating: 0,
    normalFill: "#FFF",
    ratedFill: "#FFDD00",
    starWidth: "18px",
    fullStar: true
  });

});

if($("#sidebar").length > 0)
{
var sidebar = new StickySidebar('#sidebar', {
    containerSelector: '.row',
    innerWrapperSelector: '.sidebar__inner',
    topSpacing: 20,
    bottomSpacing: 20
});
}
// Pagination
  $('#pagination-demo').twbsPagination({
    totalPages: 35,
    visiblePages: 7,
    onPageClick: function (event, page) {
      $('#page-content').text('Page ' + page);
    }
  });
