<?php

define('TURFMARKUP_ZONE', 'zone:');
define('TURFMARKUP_PLAYER', 'player:');

function turfmarkup_zone_callback($match)
{
//  var_dump($match);

  $zone = substr($match[0], strlen(TURFMARKUP_ZONE));

	$zoneHtml = htmlspecialchars( $zone, ENT_COMPAT, 'UTF-8' );

	return '<a href="https://turfgame.com/map/'
	       . $zoneHtml . '" target="_blank">'
	       . $zoneHtml
	       . '</a>';
}

function turfmarkup_zone_filter($content)
{
  return preg_replace_callback('/'.TURFMARKUP_ZONE.'\w+/u', 'turfmarkup_zone_callback', $content);
}

function turfmarkup_player_callback($match)
{
  $player = substr($match[0], strlen(TURFMARKUP_PLAYER));

	$playerHtml = htmlspecialchars( $player, ENT_COMPAT, 'UTF-8' );

	return '<a href="https://turfgame.com/user/'
	       . $playerHtml . '" target="_blank">'
	       . $playerHtml
	       . '</a>';
}

function turfmarkup_player_filter($content)
{
  return preg_replace_callback('/'.TURFMARKUP_PLAYER.'\w+/u', 'turfmarkup_player_callback', $content);
}


