(function ($) {

    var l = function(v) {
        console.log(v);
    };

    var get_cart_items = function(mcart){

        var data = {action:'mcart_get_contents'}
        ajax('POST',data,'html',display_cart_items,mcart);

    }

    var display_cart_items = function(html,mcart){
        //var mcart_html = items.mini_cart;

        html = typeof(html) != 'undefined' ? html : null;

        $('.items').html('<div>'+html+'</div>');

        if(mcart)
            mcart.init();

        $('.mcart-loader').hide().stop();
    }

    var ajax = function(type,data,dataType,callback,mcart) {

        var data = typeof(data) != 'undefined' ? data : null;
        var dataType = typeof(dataType) != 'undefined' ? dataType : 'html';
        var mcart = typeof(mcart) != 'undefined' ? mcart : null;

        $.ajax({
            url: ajaxurl,
           // url:woocommerce_params.ajax_url,
            type: type,
            data: data,
            dataType: dataType,
            beforeSend: function(){
                $('.mcart-loader').fadeIn('fast');
            },
            success: function(result){
                l('ajax result:'+result);
                callback(result,mcart);
            },
            error: function( jqXHR, textStatus, errorThrown){
                l( 'ajax error :: jqXHR: ' + jqXHR + 'textStatus: ' + textStatus + 'errorThrown: ' +errorThrown);
                callback(errorThrown);
            }
        });
    }

    $(document).ready(function(){
        var mobilenav = {
            link_id: 'navbar-toggle',
            container_id: 'mobile-nav',
            fade_speed: 250
        }

        var mcart = {
            id: 'mini-cart',
            item_id: 'item',
            toggle_id:'mini-cart-toggle',
            remove_id: 'remove',
            qty_minus_id : 'minus',
            qty_plus_id : 'plus',
            add_to_cart_id: 'add_to_cart_button',
            fade_speed : 500,
            position: {
                start : '-292px',
                end : '0'
            }
        }
        var mobile_mcart = {
            link_id: 'mobile-mcart-button',
            container_id: 'mobile-mcart-container',
            fade_speed: 250
        }
        var mobile_nav = function(){
            return {
                init: function(){
                    this.bind_elements();
                },
                bind_elements: function(){

                    //bind close on outside div click
                    $(document).mouseup(function (e)
                    {
                        var container = $('#'+mobilenav.container_id);

                        if (!container.is(e.target) // if the target of the click isn't the container...
                            && container.has(e.target).length === 0) // ... nor a descendant of the container
                        {
                            $('.'+mobilenav.link_id).attr("disabled", false);
                            container.hide().stop();
                        }
                    });

                    $('.'+mobilenav.link_id).on('click',function(){
                        $(this).attr("disabled", true);
                        $('#'+mobilenav.container_id).fadeIn(mobilenav.fade_speed);
                    });

                }
            }
        }

        var mini_cart = function () {
            return {
                init: function(){
                    this.bind_elements();
                },
                bind_elements: function(){
                    //mcart object
                    var self = this;

                    //bind close on outside div click
                    $(document).mouseup(function (e)
                    {
                        var container = $('#'+mcart.id);
                        var add_to_cart_buttons = $('.add_to_cart_button');

                        if (!container.is(e.target)&& container.has(e.target).length === 0){
                            if(!add_to_cart_buttons.is(e.target)&& add_to_cart_buttons.has(e.target).length === 0)
                            container.animate({ left: mcart.position.start }, mcart.fade_speed);
                        }
                    });

                    //bind scrollable
                    $(".scrollable").scrollable({ vertical: true, mousewheel: true });

                    //bind remove item hover effect
                    $('.'+mcart.item_id).hover(function(){
                        $(this).find('.'+mcart.remove_id).fadeIn('fast');
                    },function(){
                        $(this).find('.'+mcart.remove_id).hide().stop();
                    });

                    //bind all remove buttons
                    $('.'+mcart.remove_id).on('click',function(){
                        l('cart_item_key: '+$(this).parent().find('.cart_item_key').val());
                        var data = {
                            action:'mcart_remove_item',
                            nonce:mcart_ajax_nonce,
                            cart_item_key: $(this).parent().find('.cart_item_key').val()
                        }
                        var jqtools_api = $(".scrollable").data("scrollable");

                        //uncomment to display api methods
                        //console.dir(jqtools_api);
                        ajax('POST',data,'html',display_cart_items,self);
                    });

                    //toggle button
                    $('#'+mcart.toggle_id).on('click',function(){
                        var current_position =  $('#'+mcart.id).position().left;

                        if(current_position == 0)
                            $('#'+mcart.id).animate({ left: mcart.position.start }, mcart.fade_speed);
                        else
                            $('#'+mcart.id).animate({ left: mcart.position.end }, mcart.fade_speed);
                    });

                    //minus buttons
                    $('.'+mcart.qty_minus_id).on('click',function(){

                        var data = {
                            action: 'mcart_update_quantity',
                            nonce: mcart_ajax_nonce,
                            cart_item_key: $(this).parent().find('.cart_item_key').val(),
                            cart_item_quantity: parseInt($(this).parent().find('.cart_item_quantity').val())-1
                        }

                        l('minus action:'+data.action+'minus quantity:'+data.cart_item_quantity);
                        ajax('POST',data,'text',display_cart_items,self);
                    });

                    //plus button
                    $('.'+mcart.qty_plus_id).on('click',function(){
                        var data = {
                            action: 'mcart_update_quantity',
                            nonce: mcart_ajax_nonce,
                            cart_item_key: $(this).parent().find('.cart_item_key').val(),
                            cart_item_quantity: parseInt($(this).parent().find('.cart_item_quantity').val())+1
                        }

                        l('plus action:'+data.action+'plus quantity:'+data.cart_item_quantity);
                        ajax('POST',data,'text',display_cart_items,self);
                    });

                    //add to cart button
                    $('.'+mcart.add_to_cart_id).on('click',function(){
                        var i = 1;
                        var jqtools_api = $(".scrollable").data("scrollable");

                        //uncomment to display api methods
                        //console.dir(jqtools_api);

                        $('body').ajaxStop(function(){
                            if(i <= 1){
                                get_cart_items(self);
                                jqtools_api.end();
                            }
                            i++;
                        });

                    });

                }


            }
        }

        var mobile_mini_cart = function(){
            return {
                init: function(){
                    this.bind_elements();
                },
                bind_elements: function(){
                    //mobile mcart object
                    var self = this;

                    //bind close on outside div click
                    $(document).mouseup(function (e)
                    {
                        var container = $('#'+mobile_mcart.container_id);
                        var add_to_cart_buttons = $('.add_to_cart_button');

                        if (!container.is(e.target)&& container.has(e.target).length === 0){
                            if(!add_to_cart_buttons.is(e.target)&& add_to_cart_buttons.has(e.target).length === 0)
                                $('.'+mobile_mcart.link_id).attr("disabled", false);
                            container.hide().stop();
                        }
                    });

                    $('#'+mobile_mcart.link_id).on('click',function(){
                        $('#'+mobile_mcart.container_id).fadeIn(mobile_mcart.fade_speed);
                    });

                }
            }
        }
        //init mobile nav
        var mobile_nav = new mobile_nav();
        mobile_nav.init();

        //init mobile mini cart
        var mobile_mini_cart = new mobile_mini_cart();
        mobile_mini_cart.init();

        //init mini cart
        var mini_cart = new mini_cart();
         mini_cart.init();

    }); // on document ready

})(jQuery); // refactor jQuery object
