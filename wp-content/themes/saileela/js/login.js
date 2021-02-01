$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

    if (e.type === 'keyup') {
      if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
      if( $this.val() === '' ) {
        label.removeClass('active highlight'); 
      } else {
        label.removeClass('highlight');   
      }   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
        label.removeClass('highlight'); 
      } 
      else if( $this.val() !== '' ) {
        label.addClass('highlight');
      }
    }

});

$('.tab a').on('click', function (e) {
  $("#message").html('');
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});

$(document).ready(function () {
    $("#shareExperience").click(function () {
        $(".compose-experience").hide();

        // Hide error message
        $(".error").hide();

        // Show in-progress message
        $(".sharing-experience").show();

        $.post("/api/Comments", { message: document.getElementsByName("message")[0].value }, function (response) {
        }).done(function (response) {
            $(".shared-experience").show();
        }).fail(function (error) {
            $(".error").show();
            $(".compose-experience").show();
        }).always(function (always) {
            // Hide in-progress message
            $(".sharing-experience").hide();
        });
    });
});