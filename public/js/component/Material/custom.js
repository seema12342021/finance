
$(function () {
    "use strict";

    $(".preloader").fadeOut();

    $(".left-sidebar").hover(
        function () {
            $(".navbar-header").addClass("expand-logo");
        },
        function () {
            $(".navbar-header").removeClass("expand-logo");
        }
    );
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function () {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".nav-lock").on('click', function () {
        $("body").toggleClass("lock-nav");
        $(".nav-lock i").toggleClass("mdi-toggle-switch-off");
        $("body, .page-wrapper").trigger("resize");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function () {
        $(".app-search").toggle(200);
        $(".app-search input").focus();
    });

    // ==============================================================
    // Right sidebar options
    // ==============================================================
    $(function () {
        $(".service-panel-toggle").on('click', function () {
            $(".customizer").toggleClass('show-service-panel');

        });
        $('.page-wrapper').on('click', function () {
            $(".customizer").removeClass('show-service-panel');
        });
    });
    // ==============================================================
    // This is for the floating labels
    // ==============================================================
    $('.floating-labels .form-control').on('focus blur', function (e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');

    // ==============================================================
    //tooltip
    // ==============================================================
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // ==============================================================
    //Popover
    // ==============================================================
    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    // ==============================================================
    // Perfact scrollbar
    // ==============================================================
    $('.message-center, .customizer-body, .scrollable').perfectScrollbar({
        wheelPropagation: !0
    });

    /*var ps = new PerfectScrollbar('.message-body');
    var ps = new PerfectScrollbar('.notifications');
    var ps = new PerfectScrollbar('.scroll-sidebar');
    var ps = new PerfectScrollbar('.customizer-body');*/

    // ==============================================================
    // Resize all elements
    // ==============================================================
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();

    // ==============================================================
    // To do list
    // ==============================================================
    $(".list-task li label").click(function () {
        $(this).toggleClass("task-done");
    });

    // ==============================================================
    // Collapsable cards
    // ==============================================================
    $('a[data-action="collapse"]').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.card').find('[data-action="collapse"] i').toggleClass('ti-minus ti-plus');
        $(this).closest('.card').children('.card-body').collapse('toggle');
    });
    // Toggle fullscreen
    $('a[data-action="expand"]').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.card').find('[data-action="expand"] i').toggleClass('mdi-arrow-expand mdi-arrow-compress');
        $(this).closest('.card').toggleClass('card-fullscreen');
    });
    // Close Card
    $('a[data-action="close"]').on('click', function () {
        $(this).closest('.card').removeClass().slideUp('fast');
    });
    // ==============================================================
    // LThis is for mega menu
    // ==============================================================
    $(document).on('click', '.mega-dropdown', function (e) {
        e.stopPropagation()
    });
    // ==============================================================
    // Last month earning
    // ==============================================================
    $('#monthchart').sparkline([5, 6, 2, 9, 4, 7, 10, 12], {
        type: 'bar',
        height: '35',
        barWidth: '4',
        resize: true,
        barSpacing: '4',
        barColor: '#1e88e5'
    });
    $('#lastmonthchart').sparkline([5, 6, 2, 9, 4, 7, 10, 12], {
        type: 'bar',
        height: '35',
        barWidth: '4',
        resize: true,
        barSpacing: '4',
        barColor: '#7460ee'
    });
    var sparkResize;

    // ==============================================================
    // This is for the innerleft sidebar
    // ==============================================================
    $(".show-left-part").on('click', function () {
        $('.left-part').toggleClass('show-panel');
        $('.show-left-part').toggleClass('ti-menu');
    });

    // For Custom File Input
    $('.custom-file-input').on('change', function () {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
});

 // Code ID Proof radio buttons start

$('input[name=test]').click(function () {
    if (this.id == "radio_1") {
        $('#driving , #upload').show('slow');
    } else {
        $('#driving').hide('slow');
}
});

$('input[name=test]').click(function () {
    if (this.id == "radio_2") {
        $('#voting , #upload').show('slow');
    } else {
        $('#voting').hide('slow');
    }
});

$('input[name=test]').click(function () {
    if (this.id == "radio_3") {
        $('#adhar , #upload').show('slow');
    } else {
        $('#adhar').hide('slow');
    }
});


 // Code for ID Proof radio buttons end


$('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
  /*  $('#to-recover').on("click", function() {
        $("#reset-modal").slideUp();
        $("#login-modal").fadeIn();
    });*/


$('#to-recover').on("click", function() {
     $('#login-modal').modal('hide');
    $('#recoverform').modal('show');
});


$('body').on('show.bs.modal', '.modal', function () {
    $('.modal:visible').removeClass('fade').modal('hide').addClass('fade');
});

$('input[name=wallet]').click(function () {
    if (this.id == "radio_omni") {
        $('#omni').show('slow');
    } else {
        $('#omni').hide('slow');
    }
});

$('input[name=wallet]').click(function () {
    if (this.id == "radio_ecr") {
        $('#erc20').show('slow');
    } else {
        $('#erc20').hide('slow');
    }
});

// ==============================================================
    // This is for active inactive inactive user in admin profile 
    // ==============================================================

$('.toggle-active').click(function() {
    $(this).addClass('active');
    $('a', this).toggle(); // This line will toggle the spans inside of the link

});

//Js for toggle active and inactive end

/*

$("body").on('click','.toggle-active',function(){
    $(this).toggleClass("fa-check-circle fa-ban");
});*/

// ==============================================================
    // This is for Copy Text 
    // ==============================================================
/*function copy_data(containerid) {
  var range = document.createRange();
  range.selectNode(containerid); //changed here
  window.getSelection().removeAllRanges(); 
  window.getSelection().addRange(range); 
  document.execCommand("copy");
  window.getSelection().removeAllRanges();
  alert("data copied");
}
*/
function copy_data(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();

}

$('.copy').click(function(){
   $(this).attr( "data-original-title", "Copied!" );
   $(this).tooltip('show');
})

$(".copy").hover(function(){
   $(this).attr( "data-original-title", "Copy to clipboard" );
   $(this).tooltip('show');
});
// ==============================================================
    // This is for validate numbers only for INR and USDT
    // ==============================================================
$('.error').keyup(function() {
    var $th = $(this);
    $th.val( $th.val().replace(/[^0-9.]/g, function(str) {
	 return ''; 
} ) );
});

// ==============================================================
    // This is for admin navbar active menu 
    // ==============================================================
/*var url = window.location;
$('.nav-btn').filter(function() {
    return this.href == url;
}).addClass('active-nav');
*/

/*$(document).ready(function() {
    var CurrentUrl= document.URL;
    var CurrentUrlEnd = CurrentUrl.split('/');
	var FinalUrl = CurrentUrlEnd[4].split('?');
    $( ".btn-list li .admin-url" ).each(function() {
          var HrefUrl = $(this).attr('href');
          var HrefUrlEnd = HrefUrl.split('/');
          if(HrefUrlEnd[2] == FinalUrl[0]){
          $(this).addClass('active-nav')
          }
    });
   });*/

// ==============================================================
    // This is for User navbar active menu 
    // ==============================================================

$(document).ready(function() {
    var CurrentUrl= document.URL;
    var CurrentUrlEnd = CurrentUrl.split('/');
    $( ".btn-list li .user-url" ).each(function() {
          var HrefUrl = $(this).attr('href');
          var HrefUrlEnd = HrefUrl.split('/');
          if(HrefUrlEnd[1] == CurrentUrlEnd[3]){
          $(this).addClass('active-nav')
          }
    });
   });
// ==============================================================
    // This is for remove previous selected value in Login modal
    // ==============================================================

  $('#login-modal ,#signup-modal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})


// ==============================================================
    // This is for showing greeting
    // ==============================================================
$(document).ready(function() {
    var ndate = new Date();
	var hr = ndate.getHours();
    var h = hr % 12;
	
	 if (hr < 12)
	 {
        greet = 'Good Morning';
		format='AM';
		}
    else if (hr >= 12 && hr < 17)
	{
        greet = 'Good Afternoon';
		format='PM';
		}
    else if (hr >= 17 && hr < 24){
        greet = 'Good Evening';
}
    if (h < 12) {
      h = "0" + h;
      $("span.day-message").html(greet);
    } else if (h < 18) {
      $("span.day-message").html(greet);
    } else {
      $("span.day-message").html(greet);
    }

});

// code for adding active class in Upload Document boxes start
$(document).ready(function(){
  $('.select-payment .form-group-payment').click(function(){
	  if ($("input").is(":disabled")){
		$('.form-group-payment').removeClass("selected-radio-border");
	}else{
	   $('.form-group-payment').removeClass("selected-radio-border");
       $(this).addClass("selected-radio-border");
      }
   });
});