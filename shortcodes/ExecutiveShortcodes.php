<?php
class RankExecutive_ShortCodes {
  function __construct()
  {
    add_action('media_buttons',array(&$this,'select_grid'),11);
add_shortcode( 'grid', array(&$this,'get_grid' ));
add_shortcode( 'row', array(&$this,'get_row' ));
add_action('admin_head', array(&$this,'button_js'));

  }
function get_grid($attr, $text)
{
    extract( shortcode_atts(
    array(
      'target' => '',
      'col' => 0,
    ), $attr )
  );
    return "<div class='".$target." col-".$col."'>".$text."</div>";
}
function get_row($attr, $content)
{
  return '<div class="row">'.do_shortcode($content).'</div>';
}
function select_grid(){  
?>
    <select id="grid_select">
                        <option>SelGrid</option>
                        <option value="[row][/row]">row</option>
                      <option value="[grid col='1'][/grid]">grid 1</option>
                      <option value="[grid col='2'][/grid]">grid 2</option>
                      <option value="[grid col='3'][/grid]">grid 3</option>
                      <option value="[grid col='4'][/grid]">grid 4</option>
                      <option value="[grid col='5'][/grid]">grid 5</option>
                      <option value="[grid col='6'][/grid]">grid 6</option>
                      <option value="[grid col='7'][/grid]">grid 7</option>
                      <option value="[grid col='8'][/grid]">grid 8</option>
                      <option value="[grid col='9'][/grid]">grid 9</option>
                      <option value="[grid col='1'][/grid]">grid 10</option>
                      <option value="[grid col='1'][/grid]">grid 11</option>
                      <option value="[grid col='1'][/grid]">grid 12</option>

        </select>
        <?php

}
function button_js() {
        echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        jQuery(document).ready(function(){
           $("#grid_select").change(function() {
            $("#content").val($("#content").val()+$("#grid_select :selected").val());})
        });
        </script>';
}
}
if(!class_exists('RankExecutive_ShortCodes'))
{
$RankExecutive_ShortCodes = new RankExecutive_ShortCodes();
}


