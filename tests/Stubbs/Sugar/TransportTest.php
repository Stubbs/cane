<?php

/**
 * Unit tests for the Transport class.
 */

namespace Stubbs\Sugar\SugarAPI\Tests;

use Stubbs\Sugar\Transport;

class TransportTest extends \PHPUnit_Framework_TestCase
{
    /**
     * undocumented class variable
     *
     * @var string
     **/
    private $response = '{"id":"ab97f7db-fc1e-6523-5422-511fae1e470e","entry_list":{"modified_by_name":{"name":"modified_by_name","value":"admin"},"id":{"name":"id","value":"ab97f7db-fc1e-6523-5422-511fae1e470e"},"name":{"name":"name","value":" "},"date_entered":{"name":"date_entered","value":"2013-02-16 16:04:47"},"date_modified":{"name":"date_modified","value":"2013-02-16 16:04:47"},"modified_user_id":{"name":"modified_user_id","value":"1"},"created_by":{"name":"created_by","value":"1"},"deleted":{"name":"deleted","value":0},"full_name":{"name":"full_name","value":" "},"do_not_call":{"name":"do_not_call","value":false}}}';

    /**
     * @covers Stubbs\Sugar\Transport::__construct
     * @expectedException UnexpectedValueException
     * @expectedExceptionMessage You must supply a URL to call.
     */
    public function testNullURLThrowsException() {
        $objTransport = new Transport(null, null);
    }

    /**
     * @covers Stubbs\Sugar\Transport::call
     */
    public function testCallReturnsStdObject() {
        $objTransport = $this->getMockBuilder('Stubbs\Sugar\Transport')
           ->setMethods(array('curlExec'))
           ->disableOriginalConstructor()
           ->getMock();

        $objTransport->expects($this->once())
            ->method('curlExec')
            ->will($this->returnValue($this->response));

        $arrParameters = array("first_name" => "Stuart");

        $objResult = $objTransport->call('set_entry', $arrParameters);

        $this->assertEquals('ab97f7db-fc1e-6523-5422-511fae1e470e', $objResult->id);
    }
    
}