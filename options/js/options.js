jQuery(document).ready(function(){
	
	
	if(jQuery('#last_tab').val() == ''){

		jQuery('.nhp-opts-group-tab:first').slideDown('fast');
		jQuery('#nhp-opts-group-menu li:first').addClass('active');
	
	}else{
		
		tabid = jQuery('#last_tab').val();
		jQuery('#'+tabid+'_section_group').slideDown('fast');
		jQuery('#'+tabid+'_section_group_li').addClass('active');
		
	}
	
	
	jQuery('input[name="'+nhp_opts.opt_name+'[defaults]"]').click(function(){
		if(!confirm(nhp_opts.reset_confirm)){
			return false;
		}
	});
	
	jQuery('.nhp-opts-group-tab-link-a').click(function(){
		relid = jQuery(this).attr('data-rel');
		
		jQuery('#last_tab').val(relid);
		
		jQuery('.nhp-opts-group-tab').each(function(){
			if(jQuery(this).attr('id') == relid+'_section_group'){
				jQuery(this).delay(400).fadeIn(1200);
			}else{
				jQuery(this).fadeOut('fast');
			}
			
		});
		
		jQuery('.nhp-opts-group-tab-link-li').each(function(){
				if(jQuery(this).attr('id') != relid+'_section_group_li' && jQuery(this).hasClass('active')){
					jQuery(this).removeClass('active');
				}
				if(jQuery(this).attr('id') == relid+'_section_group_li'){
					jQuery(this).addClass('active');
				}
		});
	});
	
	
	
	
	if(jQuery('#nhp-opts-save').is(':visible')){
		jQuery('#nhp-opts-save').delay(4000).slideUp('slow');
	}
	
	if(jQuery('#nhp-opts-imported').is(':visible')){
		jQuery('#nhp-opts-imported').delay(4000).slideUp('slow');
	}	
	
	jQuery('input, textarea, select').change(function(){
		jQuery('#nhp-opts-save-warn').slideDown('slow');
	});
	
	
	jQuery('#nhp-opts-import-code-button').click(function(){
		if(jQuery('#nhp-opts-import-link-wrapper').is(':visible')){
			jQuery('#nhp-opts-import-link-wrapper').fadeOut('fast');
			jQuery('#import-link-value').val('');
		}
		jQuery('#nhp-opts-import-code-wrapper').fadeIn('slow');
	});
	
	jQuery('#nhp-opts-import-link-button').click(function(){
		if(jQuery('#nhp-opts-import-code-wrapper').is(':visible')){
			jQuery('#nhp-opts-import-code-wrapper').fadeOut('fast');
			jQuery('#import-code-value').val('');
		}
		jQuery('#nhp-opts-import-link-wrapper').fadeIn('slow');
	});
	
	
	
	
	jQuery('#nhp-opts-export-code-copy').click(function(){
		if(jQuery('#nhp-opts-export-link-value').is(':visible')){jQuery('#nhp-opts-export-link-value').fadeOut('slow');}
		jQuery('#nhp-opts-export-code').toggle('fade');
	});
	
	jQuery('#nhp-opts-export-link').click(function(){
		if(jQuery('#nhp-opts-export-code').is(':visible')){jQuery('#nhp-opts-export-code').fadeOut('slow');}
		jQuery('#nhp-opts-export-link-value').toggle('fade');
	});
	
	
    /* Custom code added by Daniel Moret 11.5.2013 */

    /**
     * Display homepage featured content select fields
     *
     * @values  0=>None 1=>Latest Post, 2=>Static Page, 3=>Custom Widgets
     */
	jQuery('#homepage-featured-content').on('change',function(){
        var select_field = jQuery(this);
        var content_type = jQuery(this).val();
        switch(content_type)
        {
            case 0:
                //select_field.parent().append(select_field);
                break;
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
        }
    });
	
	
});