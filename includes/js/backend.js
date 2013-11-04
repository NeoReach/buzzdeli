jQuery(document).ready(function($){
          $("#grid_select, #grid_button, #grid_alert").change(function() {
            var val = $(this).find(":selected").val();
            $("#content").val($("#content").val()+val);

               if(tinyMCE && tinyMCE.activeEditor)
    {
        tinyMCE.activeEditor.selection.setContent(val);
    }
    return false;
        })
})