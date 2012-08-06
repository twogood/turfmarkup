<?php

define('TURFMARKUP_ZONE', 'zone:');
define('TURFMARKUP_PLAYER', 'player:');

function turfmarkup_zone_callback($match)
{
//  var_dump($match);

  $zone = substr($match[0], strlen(TURFMARKUP_ZONE));

  return '<a href="http://turfgame.com/map/' 
    . urlencode($zone) . '" target="_blank">' 
    . htmlentities($zone, ENT_COMPAT, 'UTF-8')
    . '</a>';
}

function turfmarkup_zone_filter($content)
{
  return preg_replace_callback('/'.TURFMARKUP_ZONE.'\w+/u', 'turfmarkup_zone_callback', $content);
}

function turfmarkup_player_ascii($player)
{
  $savedLocale = setlocale(LC_ALL, 'en_US.UTF-8');

  $ascii = iconv('UTF-8', 'ASCII//TRANSLIT', $player);

  if ($savedLocale !== false)
  {
    setlocale(LC_ALL, $savedLocale);
  }

  return $ascii;
}

function turfmarkup_player_callback($match)
{
  $player = substr($match[0], strlen(TURFMARKUP_PLAYER));

  $playerAscii = turfmarkup_player_ascii($player);

  return '<a href="http://turfgame.com/user/' 
    . urlencode($playerAscii) . '" target="_blank">' 
    . htmlentities($player, ENT_COMPAT, 'UTF-8')
    . '</a>';
}

function turfmarkup_player_filter($content)
{
  return preg_replace_callback('/'.TURFMARKUP_PLAYER.'\w+/u', 'turfmarkup_player_callback', $content);
}


