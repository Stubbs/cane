<?php

/**
 * Unit tests for the SugarAPI class.
 */

namespace Stubbs\Sugar\SugarAPI\Tests;

use Stubbs\Sugar\SugarAPI,
    Stubbs\Sugar\Contact;

class SugarApiTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->objSugarAPI = new SugarAPI('http://dev.roverstrust.brfcs.com/crm');
    }

    /**
     * @covers Class::Method
     */
    public function testLogin() {
        $this->objSugarAPI->login('admin', 'letmein');

        $this->assertNotNull($this->objSugarAPI->getID());
    }
    
    /**
     * @covers SugarAPI::login
     * @covers SugarAPI::call
     * @expectedException UnexpectedValueException
     * @expectedExceptionMessage Invalid username and/or password
     */
    public function testBadLoginDetailsThrowException() {
        $this->objSugarAPI->login('admin', 'badpassword');
    }
    
    /**
     * @covers SugarAPI::getAvailableModules
     */
    public function testGetModuleList() {
        $this->objSugarAPI->login('admin', 'letmein');

        $arrModules = $this->objSugarAPI->getAvailableModules();

        $this->assertGreaterThan(0,count($arrModules));
    }

    /**
     * @covers SugarAPI::getModuleFields
     */
    public function testGetContactFields() {
        $this->objSugarAPI->login('admin', 'letmein');

        $arrFields = $this->objSugarAPI->getModuleFields('Contacts');

        $this->assertGreaterThan(0,count($arrFields));
    }
    
    /**
     * @covers SugarAPI::getModuleFields
     * @expectedException UnexpectedValueException
     * @expectedExceptionMessage Unable to find module BadModule
     */
    public function testGetContactFieldsThrowsNotFound() {
        $this->objSugarAPI->login('admin', 'letmein');

        $arrFields = $this->objSugarAPI->getModuleFields('BadModule');
    }
    
    /**
     * @covers SugarAPI::createContact
     */
    public function testCreateContactCreated() {
        $this->objSugarAPI->login('admin', 'letmein');

        $objContact = new Contact();

        $objContact->strFirstName = 'Stuart';
        $objContact->strLastName = 'Grimshaw';

        $this->objSugarAPI->createContact($objContact);

    }
    
    
}
