jQuery(document).ready(function(){
	$container = jQuery('ul.products');
	
	jQuery('.ajax-layered a').live('click',function(){
		$container = jQuery('ul.products');
		$container.infinitescroll('destroy');
		$container.infinitescroll('reset');
		init_infinite_scroll($container);
	});
	
	init_infinite_scroll($container);
	
	if (jQuery('body').height() < jQuery(window).height()) {
	    $container.infinitescroll('retrieve');
	}
});

function init_infinite_scroll($container){
	//$container = jQuery('ul.products');
	$container.infinitescroll({
		loading: {
			msgText: "<em>" + infinite_scroll.loading_msg + "</em>",
			finishedMsg: "<em>" + infinite_scroll.no_more_products + "</em>",
			img: infinite_scroll.image_path,
			selector: "ul.products",
		},
		contentSelector : "ul.products",
		itemSelector : "ul.products li.product",
		navSelector  : "div.sod-inf-nav-next",            
    	nextSelector : "div.sod-inf-nav-next a:first",  
		debug:false,
		state: {
            isDestroyed: false,
            isDone: false
        },
	},function( newElements ) {
		$added = newElements.length;
		$total = jQuery('ul.products li').length;
		$lastElem = $total - $added;
		if(!jQuery('ul.products li:nth-child(' + $lastElem + ')').hasClass("last")){
			$firstElem = jQuery('ul.products li').first();
			$last = false;
			$perRow = 0;
			jQuery(newElements).each(function(index){$perRow++;$last = jQuery(this).hasClass('last');if($last){return false;}});
			$remainder = $added%$perRow;
			$getsLast = $perRow - $remainder;
			$getsFirst = $getsLast + 1;
			$i = 1;
			jQuery('ul.products li').each(function(index){
				if(jQuery(this).hasClass('first')){jQuery(this).removeClass('first');}
				if($i == 1){jQuery(this).addClass('first');}
				if(jQuery(this).hasClass('last')){jQuery(this).removeClass('last');}
				if($i == $perRow){jQuery(this).addClass('last');$i = 0;}
				$i++;
			});
		} 
    }
    );
}
