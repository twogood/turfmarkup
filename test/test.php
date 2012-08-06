<?php

require '../filters.php';

class FiltersTest extends PHPUnit_Framework_TestCase
{

  public function testZoneFilter()
  {
  
    $this->assertEquals(
      turfmarkup_zone_filter('zone:Hillbilly'),
      '<a href="http://turfgame.com/map/Hillbilly" target="_blank">Hillbilly</a>'
    );

    $this->assertEquals(
      turfmarkup_zone_filter('.zone:Hultagölen,'),
      '.<a href="http://turfgame.com/map/Hultag'.urlencode('ö').'len" target="_blank">Hultag&ouml;len</a>,'
    );

    $this->assertEquals(
      turfmarkup_zone_filter('abc zone:åäö efg'),
      'abc <a href="http://turfgame.com/map/'.urlencode('åäö').'" target="_blank">&aring;&auml;&ouml;</a> efg'
    );

  }

  public function testPlayerFilter()
  {
  
    $this->assertEquals(
      turfmarkup_player_filter('player:TurfBlekingeIT'),
      '<a href="http://turfgame.com/user/TurfBlekingeIT" target="_blank">TurfBlekingeIT</a>'
    );

  }

}
