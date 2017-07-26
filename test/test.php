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
      '.<a href="https://turfgame.com/map/Hultagölen" target="_blank">Hultagölen</a>,',
	  turfmarkup_zone_filter('.zone:Hultagölen,')
    );

    $this->assertEquals(
      'abc <a href="https://turfgame.com/map/åäö" target="_blank">åäö</a> efg',
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
      '<a href="https://turfgame.com/user/FarbrorGrön" target="_blank">FarbrorGrön</a>',
	  turfmarkup_player_filter('player:FarbrorGrön')
    );

    $this->assertEquals('C', setlocale(LC_ALL, 'C'));

  }

}
