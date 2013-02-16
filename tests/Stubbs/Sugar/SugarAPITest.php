<?php

/**
 * Unit tests for the SugarAPI class.
 */

namespace Stubbs\Sugar\SugarAPI\Tests;

use Stubbs\Sugar\SugarAPI,
    Stubbs\Sugar\Contact,
    Stubbs\Sugar\Lead;

class SugarApiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var $objAuth Mock of the Auth object.
     */
    private $objAuth;

    /**
     * @var $objTransport Mock of the Transport class.
     */
    private $objTransport;

    public function setUp()
    {
        $this->objTransport = $this->getMockBuilder('Transport')
                                   ->setMethods(array('call'))
                                   ->disableOriginalConstructor()
                                   ->getMock();
    }

    /**
     * Return an instance of the SugarAPI class mocked to return a given result.
     *
     * @return SugarAPI
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    protected function getMockAPI($strCallResult)
    {
        $this->objTransport->expects($this->once())
             ->method('call')
             ->will($this->returnValue(json_decode($strCallResult)));

        return new SugarAPI($this->objTransport);
    }

    // Returns a few common fields
    protected function getModuleFieldList() {
        $strFields = '{
            "id": {
                "name": "id",
                "type": "id",
                "group": "",
                "id_name": "",
                "label": "ID",
                "required": 1,
                "options": [],
                "related_module": "",
                "calculated": "",
                "len": 255
            },
            "name": {
                "name": "name",
                "type": "name",
                "group": "last_name",
                "id_name": "",
                "label": "Name:",
                "required": 0,
                "options": [],
                "related_module": "",
                "calculated": "",
                "len": 255
            }
        }';

        return $strFields;
    }

    /**
     * Returns a shortened list of all the modules.
     *
     * @return string
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    protected function getModuleListJSON()
    {
        return '{
          "modules": [
            {
              "module_key": "Home",
              "module_label": "Home",
              "favorite_enabled": false,
              "acls": [
                {
                  "action": "edit",
                  "access": true
                },
                {
                  "action": "delete",
                  "access": true
                },
                {
                  "action": "list",
                  "access": true
                },
                {
                  "action": "view",
                  "access": true
                },
                {
                  "action": "import",
                  "access": true
                },
                {
                  "action": "export",
                  "access": true
                }
              ]
            },
            {
              "module_key": "Accounts",
              "module_label": "Accounts",
              "favorite_enabled": false,
              "acls": [
                {
                  "action": "edit",
                  "access": true
                },
                {
                  "action": "delete",
                  "access": true
                },
                {
                  "action": "list",
                  "access": true
                },
                {
                  "action": "view",
                  "access": true
                },
                {
                  "action": "import",
                  "access": true
                },
                {
                  "action": "export",
                  "access": true
                }
              ]
            },
            {
              "module_key": "Contacts",
              "module_label": "Contacts",
              "favorite_enabled": false,
              "acls": [
                {
                  "action": "edit",
                  "access": true
                },
                {
                  "action": "delete",
                  "access": true
                },
                {
                  "action": "list",
                  "access": true
                },
                {
                  "action": "view",
                  "access": true
                },
                {
                  "action": "import",
                  "access": true
                },
                {
                  "action": "export",
                  "access": true
                }
              ]
            }
          ]
        }';
    }

    protected function getModuleFieldsJSON()
    {
        return '{"module_name": "Contacts",
              "table_name": "contacts",
              "module_fields": {
                "id": {
                  "name": "id",
                  "type": "id",
                  "group": "",
                  "id_name": "",
                  "label": "ID:",
                  "required": 1,
                  "options": [],
                  "related_module": "",
                  "calculated": false,
                  "len": ""
                },
                "name": {
                  "name": "name",
                  "type": "name",
                  "group": "last_name",
                  "id_name": "",
                  "label": "Name:",
                  "required": 0,
                  "options": [],
                  "related_module": "",
                  "calculated": false,
                  "len": "255"
                },
                "date_entered": {
                  "name": "date_entered",
                  "type": "datetime",
                  "group": "created_by_name",
                  "id_name": "",
                  "label": "Date Created",
                  "required": 0,
                  "options": {
                    "=": {
                      "name": "=",
                      "value": "Equals"
                    },
                    "not_equal": {
                      "name": "not_equal",
                      "value": "Not On"
                    },
                    "greater_than": {
                      "name": "greater_than",
                      "value": "After"
                    },
                    "less_than": {
                      "name": "less_than",
                      "value": "Before"
                    },
                    "last_7_days": {
                      "name": "last_7_days",
                      "value": "Last 7 Days"
                    },
                    "next_7_days": {
                      "name": "next_7_days",
                      "value": "Next 7 Days"
                    },
                    "last_30_days": {
                      "name": "last_30_days",
                      "value": "Last 30 Days"
                    },
                    "next_30_days": {
                      "name": "next_30_days",
                      "value": "Next 30 Days"
                    },
                    "last_month": {
                      "name": "last_month",
                      "value": "Last Month"
                    },
                    "this_month": {
                      "name": "this_month",
                      "value": "This Month"
                    },
                    "next_month": {
                      "name": "next_month",
                      "value": "Next Month"
                    },
                    "last_year": {
                      "name": "last_year",
                      "value": "Last Year"
                    },
                    "this_year": {
                      "name": "this_year",
                      "value": "This Year"
                    },
                    "next_year": {
                      "name": "next_year",
                      "value": "Next Year"
                    },
                    "between": {
                      "name": "between",
                      "value": "Is Between"
                    }
                  },
                  "related_module": "",
                  "calculated": false,
                  "len": ""
                }
              }
          }';
        }

    /**
     * @covers Stubbs\Sugar\SugarAPI::getAvailableModules
     */
    public function testGetModuleList() {
        $objAPI = $this->getMockAPI($this->getModuleListJSON());

        $arrModules = $objAPI->getAvailableModules();

        $this->assertGreaterThan(0,count($arrModules));
    }

    /**
     * @covers Stubbs\Sugar\SugarAPI::getModuleFields
     */
    public function testGetContactFields() {
        $objAPI = $this->getMockAPI($this->getModuleFieldsJSON());

        $arrFields = $objAPI->getModuleFields('Contacts');

        $this->assertGreaterThan(0,count($arrFields));
    }
    
    /**
     * @covers Stubbs\Sugar\SugarAPI::getModuleFields
     * @expectedException UnexpectedValueException
     * @expectedExceptionMessage Unable to find module BadModule
     */
    public function testGetContactFieldsThrowsNotFound() {
        $objAPI = $this->getMockAPI('{"name":"Module Does Not Exist","number":20,"description":"This module is not available on this server"}');

        $arrFields = $objAPI->getModuleFields('BadModule');
    }
    
    /**
     * @covers Stubbs\Sugar\SugarAPI::setEntry
     */
    public function testCreateContactCallsTransport() {
        $this->markTestIncomplete('Not yet Implemented');
        $objContact = new Contact();

        // Simple test, only the last name is required to make a valid contact.
        $objContact->strFirstName = 'Stuart';
        $objContact->strLastName = 'Grimshaw';
    }

    /**
     * @covers Stubbs\Sugar\SugarAPI::setEntry
     */
    public function testSetEntryCallsTransport() {
        $this->objTransport->expects($this->once())
             ->method('call')
             ->with($this->equalTo("set_entry"),
                    $this->equalTo(array(
                        "module" => "Leads",
                        "name_value_list" => array(
                            "first_name" => "Stuart", "last_name" => "Grimshaw", "full_name" => "Stuart Grimshaw")
                        )
                    )
                )
                ->will($this->returnValue(array("id" => "123xyz")));

        $objLead = new Lead('{"first_name": "Stuart", "last_name": "Grimshaw", "full_name": "Stuart Grimshaw"}');

        $objAPI = new SugarAPI($this->objTransport);

        $this->assertEquals($objAPI->setEntry($objLead), "123xyz");
    }

}
