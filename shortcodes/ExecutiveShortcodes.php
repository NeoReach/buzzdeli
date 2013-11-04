<?php
/**
 * @package RankExecutive
 */
/*
Plugin Name: Executive Short Codes
Plugin URI: http://rankexecutives.com
Description: Bootstrap Shortcodes
Version: 1
Author: RankExecutives
Author URI: http://rankexecutives.com
*/

class RankExecutive_ShortCodes 
{
  function __construct()
  {
    add_action('media_buttons',array(&$this,'select_grid'),11);
add_shortcode( 'grid', array(&$this,'get_grid' ));
add_shortcode( 'row', array(&$this,'get_row' ));
add_shortcode( 'button', array(&$this,'get_button' ));
add_shortcode( 'alert', array(&$this,'get_alert' ));
  }
  function get_alert($attr, $text)
  {
       extract( shortcode_atts(
    array(
      'type' => 'red',
    ), $attr )
  );

return "<div class='alert alert-".$type."'>".$text."</div>";
  }
  function get_button($attr)
  {
      extract( shortcode_atts(
    array(
      'color' => 'red',
      'link'=>'#',
      'text'=>'button',
      'col' => 0,
    ), $attr )
  );
      switch($color)
      {
        case 'default':
        $cs ='btn btn-default';
        break;
         case 'red':
        $cs ='btn btn-danger';
        break;
         case 'orange':
        $cs ='btn btn-warning';
        break;
         case 'green':
        $cs ='btn btn-success';
        break;
         case 'blue':
        $cs ='btn btn-info';
        break;
         case 'primary':
        $cs ='btn btn-primary';
        break;
      }
      switch($size)
      {
        case 'small':
        $size  = ' btn-sm';
        break;
          case 'medium':
        $size  = '';
        break;
          case 'large':
        $size  = ' btn-lg';
        break;

      }
    return "<button class='".$cs.$size."' href='".$link."' role='button'>".$text."</button>";
  }
function get_grid($attr, $text)
{
    extract( shortcode_atts(
    array(
      'target' => '',
      'col' => 0,
    ), $attr )
  );
    return "<div class='".$target." col-".$col."'>".do_shortcode($text)."</div>";
}
function get_row($attr, $content)
{
  return '<div class="row">'.do_shortcode($content).'</div>';
}
function select_grid(){  
?>
    <select id="grid_select">
                        <option>Grid</option>
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
            <select id="grid_button">
                        <option>Buttons</option>
                      <option value="[button color='default' link='#' text='button']">default</option>
                      <option value="[button color='primary'  link='#' text='button']">primary</option>
                      <option value="[button color='green'  link='#' text='button']">green</option>
                      <option value="[button color='blue'  link='#' text='button']">blue</option>
                      <option value="[button color='orange'  link='#' text='button']">orange</option>
                      <option value="[button color='red'  link='#' text='button']">red</option>

        </select>
                 <select id="grid_alert">
                        <option>Alerts</option>
                      <option value="[alert type='success'][/alert]">success</option>
                       <option value="[alert type='info'][/alert]">info</option>
                        <option value="[alert type='warning'][/alert]">warning</option>
                         <option value="[alert type='danger'][/alert]">danger</option>


        </select>

        <?php

}
}
$RankExecutive_ShortCodes = new RankExecutive_ShortCodes();


