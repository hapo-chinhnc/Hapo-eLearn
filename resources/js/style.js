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
        $('#formLogin').removeClass('d-none').addClass('d-block');
        $('#formRegister').removeClass('d-block').addClass('d-none');
    })

    $('#register').click(function() {
        $('#register').removeClass('not-select').addClass('selected');
        $('#login').removeClass('selected').addClass('not-select');
        $('#formLogin').removeClass('d-block').addClass('d-none');
        $('#formRegister').removeClass('d-none').addClass('d-block');
    })

    $('.btn-x').click(function() {
        $('.modal').modal('hide');
    })

    if($('#formLoginInput span').hasClass('invalid-feedback')) {
        $('.modal').modal('show');
    }

    if($('#formRegisterInput span').hasClass('invalid-feedback')) {
        $('#login').removeClass('selected').addClass('not-select');
        $('#formLogin').removeClass('d-block').addClass('d-none');
        $('#register').removeClass('not-select').addClass('selected');
        $('#formRegister').removeClass('d-none').addClass('d-block');
        $('.modal').modal('show');
    }

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

      var fullRating = $('#fullStarVal').val();
      var goodRating = $('#goodRatingVal').val();
      var normalRating = $('#normalRatingVal').val();
      var badRating = $('#badRatingVal').val();
      var veryBadRating = $('#veryBadRatingVal').val();
      $('#fullStar').width(fullRating);
      $('#goodRating').width(goodRating);
      $('#normalRating').width(normalRating);
      $('#badRating').width(badRating);
      $('#veryBadRating').width(veryBadRating);

      var role = $('#roleVal').val();
      $('option[value=' + role + ']').attr('selected', true);

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#avatarUpload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#avatar").change(function() {
        readURL(this);
        $('#avatarUpload').removeClass('d-none').addClass('d-block');
    });

    $('#filterBtn').click(function() {
        $('#filterTable').slideToggle();
    })

    if($('#order').val() == 0) {
        $('#newest').attr('checked', 'checked');
    }
    if($('#order').val() == 1) {
        $('#oldest').attr('checked', 'checked');
    }
    var teacherId = $('#teacherId').val();
      $('#teacher option[value=' + teacherId + ']').attr('selected', true);
});
