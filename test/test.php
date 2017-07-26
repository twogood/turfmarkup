<?php

require '../filters.php';

class FiltersTest extends PHPUnit_Framework_TestCase
{

  public function testZoneFilter()
  {
  
    $this->assertEquals(
      turfmarkup_zone_filter('zone:Hillbilly'),
      '<a href="https://turfgame.com/map/Hillbilly" target="_blank">Hillbilly</a>'
    );

    $this->assertEquals(
      turfmarkup_zone_filter('.zone:Hultagölen,'),
      '.<a href="https://turfgame.com/map/Hultag'.urlencode('ö').'len" target="_blank">Hultag&ouml;len</a>,'
    );

    $this->assertEquals(
      turfmarkup_zone_filter('abc zone:åäö efg'),
      'abc <a href="https://turfgame.com/map/'.urlencode('åäö').'" target="_blank">&aring;&auml;&ouml;</a> efg'
    );

  }

  public function testPlayerFilter()
  {
  
    $this->assertEquals(
      turfmarkup_player_filter('player:TurfBlekingeIT'),
      '<a href="https://turfgame.com/user/TurfBlekingeIT" target="_blank">TurfBlekingeIT</a>'
    );

    $this->assertEquals(
      turfmarkup_player_filter('player:fårahedern'),
      '<a href="https://turfgame.com/user/farahedern" target="_blank">f&aring;rahedern</a>'
    );

    $this->assertEquals(setlocale(LC_ALL, 'C'), 'C');

  }

}
