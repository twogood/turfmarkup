<?php
/*
Plugin Name: Turf Markup
Plugin URI: https://github.com/twogood/turfmkarup
Description: Wordpress Markup for linking to Turf zones and players
Version: 0.1
Author: TurfBlekingeIT
Author URI: http://turf.blekinge.it/

*/

require 'filters.php';

foreach (array('the_content', 'the_excerpt', 'comment_text') as $filter)
{
  add_filter($filter, 'turfmarkup_zone_filter');
  add_filter($filter, 'turfmarkup_player_filter');
}

?>
