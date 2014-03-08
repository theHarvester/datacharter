var lastClicked;
$( document ).ready(function() {
	$('#menu-show-btn').click(function() {
        $('#menu-container').toggle("slide", {
            direction: "left",
            distance: 400
        }, 500);

        $('#menu-show-btn').fadeOut(150, function(){
        	$('#menu-show-btn').delay(200).fadeIn(150, 
        		function(){
        			sideMenuScroll();
        		});
        });

        $('.menu-icon-bar.top').removeClass('white');
        $('.menu-icon-bar.top').removeClass('orange');
		$('.menu-icon-bar.top').addClass('white');
		$('.menu-icon-bar.middle').removeClass('white');
		$('.menu-icon-bar.middle').removeClass('orange');
		$('.menu-icon-bar.middle').addClass('white');
		$('.menu-icon-bar.bottom').removeClass('white');
		$('.menu-icon-bar.bottom').removeClass('orange');
		$('.menu-icon-bar.bottom').addClass('white');
    });

    $(document).scroll(function (){
    	sideMenuScroll();
    });

    $( "#datepicker" ).datepicker();

    $('.high-chart').each(function (){
        var url = window.urlPathPrefix + "/highcharts/"+$(this).data('id');
        $.getScript( url, function() {});
    });

    // Toggle qick create buttons on home page
    $('#quickCreateToggle').click(function(){
        $('.quickForm').slideUp();
        if($('.quickCreate').is(":hidden")){
            $('.quickCreate').slideDown();
        } else {
            $('.quickCreate').slideUp();
        }
    });

    $('.quickCreate').click(function(){
        $('.quickForm').slideUp();

        if($(this).data('type') == 'data' && $('#quickDataForm').is(":hidden")){
            $('#quickDataForm').slideDown();
        }
    });

    $(".quickForm form").submit(function (e) {
        e.preventDefault();

        url = $(this).attr('action');
        data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(){
                location.reload();
            }
        });
    });
});

function sideMenuScroll(){
	if($('#menu-container').css('display') == 'none'){
    	if($(window).scrollTop() > 328 && $('.menu-icon-bar.top').hasClass('white')){
    		$('.menu-icon-bar.top').removeClass('white');
    		$('.menu-icon-bar.top').addClass('orange');
    	}
    	if($(window).scrollTop() > 320 && $('.menu-icon-bar.middle').hasClass('white')){
    		$('.menu-icon-bar.middle').removeClass('white');
    		$('.menu-icon-bar.middle').addClass('orange');
    	}
    	if($(window).scrollTop() > 312 && $('.menu-icon-bar.bottom').hasClass('white')){
    		$('.menu-icon-bar.bottom').removeClass('white');
    		$('.menu-icon-bar.bottom').addClass('orange');
    	}
    	if($(window).scrollTop() < 328 && $('.menu-icon-bar.top').hasClass('orange')){
    		$('.menu-icon-bar.top').removeClass('orange');
    		$('.menu-icon-bar.top').addClass('white');
    	}
    	if($(window).scrollTop() < 320 && $('.menu-icon-bar.middle').hasClass('orange')){
    		$('.menu-icon-bar.middle').removeClass('orange');
    		$('.menu-icon-bar.middle').addClass('white');
    	}
    	if($(window).scrollTop() < 312 && $('.menu-icon-bar.bottom').hasClass('orange')){
    		$('.menu-icon-bar.bottom').removeClass('orange');
    		$('.menu-icon-bar.bottom').addClass('white');
    	}
    }
}