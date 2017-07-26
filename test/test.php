<?php

require '../filters.php';

class FiltersTest extends PHPUnit_Framework_TestCase
{

  public function testZoneFilter()
  {

    $this->assertEquals(
      '<a href="https://turfgame.com/map/Hillbilly" target="_blank">Hillbilly</a>',
	  turfmarkup_zone_filter('zone:Hillbilly')
    );

    $this->assertEquals(
      '.<a href="https://turfgame.com/map/Hultag'.urlencode('ö').'len" target="_blank">Hultag&ouml;len</a>,',
	  turfmarkup_zone_filter('.zone:Hultagölen,')
    );

    $this->assertEquals(
      'abc <a href="https://turfgame.com/map/'.urlencode('åäö').'" target="_blank">&aring;&auml;&ouml;</a> efg',
	  turfmarkup_zone_filter('abc zone:åäö efg')
    );

  }

  public function testPlayerFilter()
  {

    $this->assertEquals(
	  '<a href="https://turfgame.com/user/TurfBlekingeIT" target="_blank">TurfBlekingeIT</a>',
      turfmarkup_player_filter('player:TurfBlekingeIT')
    );

    $this->assertEquals(
      '<a href="http://turfgame.com/user/farahedern" target="_blank">f&aring;rahedern</a>',
	  turfmarkup_player_filter('player:fårahedern')
    );

    $this->assertEquals('C', setlocale(LC_ALL, 'C'));

  }

}
