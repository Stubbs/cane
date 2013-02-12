<?php

/**
 * Unit tests for the SugarAPI class.
 */

namespace Stubbs\Sugar\SugarAPI\Tests;

use Stubbs\Sugar\Lead;

class LeadTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers \Stubbs\Sugar\Lead::toArray
     */
    public function testToJSONRemovesNullFields() {
        $objLead = new Lead();

        $objLead->first_name = "Stuart";
        $objLead->last_name = "Grimshaw";
        $objLead->full_name = "Stuart Grimshaw";

        $this->assertEquals(array("first_name" => "Stuart", "last_name" => "Grimshaw", "full_name" => "Stuart Grimshaw"),
            $objLead->toArray());
    }
    
}