$(document).ready(function() {
    $("#icon-navbar").click(function() {
        $("#span-btn").toggleClass('fa-times');
        $("#span-btn").toggleClass('fa-bars');
    });

    $("#btn-mess").click(function() {
      $("#chat").toggle();
    });

    $("#close-btn").click(function() {
        $("#chat").hide();
      });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })

    $('#login').click(function() {
        $('#login').removeClass('not-select').addClass('selected');
        $('#register').removeClass('selected').addClass('not-select');
        $('#form-login').removeClass('d-none').addClass('d-block');
        $('#form-register').removeClass('d-block').addClass('d-none');
    })

    $('#register').click(function() {
        $('#register').removeClass('not-select').addClass('selected');
        $('#login').removeClass('selected').addClass('not-select');
        $('#form-login').removeClass('d-block').addClass('d-none');
        $('#form-register').removeClass('d-none').addClass('d-block');
    })

    $('.btn-x').click(function() {
        $('.modal').modal('hide');
    })

    var origin   = window.location.href;

    $('.hapolearn-slick').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed : 3000,
        pauseOnFocus: true,
        pauseOnHover: true,
        prevArrow: $('#slide-btn-left').val(),
        nextArrow: $('#slide-btn-right').val(),

        responsive: [
          {
            breakpoint: 790,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
});
