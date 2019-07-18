/*
 * Main JS
 * Theme Name   : Theme Name
 * Author       : MD. Abu Ahsan Basir
 * Description  : Theme Description
 * Version      : 1.0
 */


(function($) {
    "use strict";

    /*
     * ----------------------------------------------------------------------------------------
     *  Document Ready
     * ----------------------------------------------------------------------------------------
     */

    jQuery(document).ready(function($) {
        // Scroll
        $('.slider').smooth({
            top : 80
        });
        $('.navbar-nav').smooth({
            top : 80
        });
        $('.goto-top').smooth({
            top : 0
        });
        $(document).scroll(function() {
            var scrollTop = $(document).scrollTop();
            var offsetY = $('#header').offset().top;
            var top = $('#header').offset().top - scrollTop;
            console.log(top);
            if( top == 0){
                $('#header').removeClass('top-fixed');
                $('.logo-image').attr('src','assets/img/logo-small.jpg')
            }else {
                $('#header').addClass('top-fixed');
                $('.logo-image').attr('src','assets/img/logo.png')
            }
        });

        // Price

        $('#discount-switch').on("change",function(){
            var cuurentStarterPrice = $('.starter-plan').find(".price").text();
            var cuurentProPrice = $('.pro-plan').find(".price").text();
            var originalStarterPrice = $('.starter-plan').find('#original_price').val();
            var originalProPrice = $('.pro-plan').find('#original_price').val();
            var inputStarterPrice = $('.starter-plan').find('#price_input');
            var inputProPrice = $('.pro-plan').find('#price_input');
            var checked = $(this).prop("checked");
            var newStarterPrice,
                newProPrice,
                newDuration;

            // console.log(cuurentStarterPrice);
            // console.log(cuurentProPrice);
            
            if (checked) {
                newStarterPrice = (originalStarterPrice * 10)/12;
                newProPrice = (originalProPrice * 10)/12;
                newDuration = "yearly";
            }else{
                newStarterPrice = originalStarterPrice ;
                newProPrice = originalProPrice;
                newDuration = "monthly";
            }
            $('.starter-plan').find(".price").text(newStarterPrice);
            inputStarterPrice.val(newStarterPrice);
            
            $('.pro-plan').find(".price").text(newProPrice);
            inputProPrice.val(newProPrice);

            $('.starter-plan').find('.get_started').attr("data-price",newStarterPrice);
            $('.pro-plan').find('.get_started').attr("data-price",newProPrice);

            $('.starter-plan').find('.get_started').attr("data-duration", newDuration);
            $('.pro-plan').find('.get_started').attr("data-duration", newDuration);

        });

        $("#signin-tab,#signup-tab").on("click",function(e){
            e.preventDefault();
            var tabId = $(this).attr('href');
            console.log(tabId);
            $(".signin").find(".tab-pane").removeClass("active show");
            $(tabId).addClass("active show");
        });

        /* Cart */
        $("#remove-cart").on("click",function(e){
            e.preventDefault();
            var formURL = '/removeCart';
            $.ajax({
                url: formURL,
                type: "POST",
                dataType: 'json',
                data: {
                    '_token': $('input[name="_token"]').val()
                },
                success: function (data) {
                    console.log(data);
                    if(data.success == true){
                        $(".cart").slideUp( "slow");
                    }
                },
                error: function (data) {
                    alert("Error occurd! Please try again");
                }
            });
        });

        $(".get_started").on("click",function(e){
            // e.preventDefault();
            var href    = $(this).attr('href');
            var id      = $(this).data("plan-id");
            var duration = $(this).data("duration");
            //console.log(href);

            var formURL = '/addCart';
            $.ajax({
                url: formURL,
                type: "POST",
                dataType: 'json',
                data: {
                    "id": id,
                    "qty": 1,
                    "duration": duration,
                    '_token': $('input[name="_token"]').val()
                },
                success: function (data) {
                    if(data.success == true){
                        console.log("success");
                    }
                },
                error: function (data) {
                    alert("Error occurd! Please try again");
                }
            });
        });
    });

    /*
     * ----------------------------------------------------------------------------------------
     *  Document Onload
     * ----------------------------------------------------------------------------------------
     */

    $(window).on('load', function(event) {
    });


}(jQuery));
