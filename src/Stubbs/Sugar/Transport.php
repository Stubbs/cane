<?php

/**
 * (c) Stuart M. Grimshaw 2013
 *
 * For full license details see ...
 */

namespace Stubbs\Sugar;

use Stubbs\Sugar\Transport;
use UnexpectedValueException;

/**
 * Used to send the calls to the SugarAPI
 *
 * @package  cane
 * @author   Stuart Grimshaw <stuart.grimshaw@gmail.com>
 */
class Transport {
    /**
     * @var $strURL URL of the REST API endpoint
     */
    private $strURL;

    /**
     * The Authentication token for this transport.
     *
     * @var Stubbs\Sugar\Auth
     **/
    private $objAuth;

    /**
     * Create a new instance of the Transport class.
     *
     * @param String $strURL The URL endpoint for the API.
     * 
     * @return void
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function __construct($strURL, $objAuth = null)
    {
        if($strURL == null) {
            throw new UnexpectedValueException("You must supply a URL to call.");
        }

        $this->strURL = $strURL . "/service/v4/rest.php";
        $this->objAuth = $objAuth;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    protected function curlExec($objCurlRequest, $arrPost)
    {
        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $arrPost);
        $result = curl_exec($curl_request);
        curl_close($curl_request);
        
        $result = explode("\r\n\r\n", $result, 2);

        return $result[1];
    }

    /**
     * Calls the API for the given method
     *
     * @todo  The way it figures out which element of the response array to use is very brittle.
     * @param String $strMethod The method on the API to call.
     * @param String $arrParameters The array of parameters for this operation.
     * @return Object
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function call($strMethod, $arrParameters)
    {
        $curl_request = curl_init();
 
        curl_setopt($curl_request, CURLOPT_URL, $this->strURL);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);
     
        if($this->objAuth !== null) {
            $arrParameters = array_merge(array("session" => $this->objAuth->getSessionID()), $arrParameters);
        }

        $jsonEncodedData = json_encode($arrParameters);

        $arrPost = array(
             "method" => $strMethod,
             "input_type" => "JSON",
             "response_type" => "JSON",
             "rest_data" => $jsonEncodedData
        );

        $result = $this->curlExec($curl_request, $arrPost);

        $objResult = json_decode($result);

        if (isset($objResult->name) && isset($objResult->number)) {
            throw new Transport\Exception($objResult->name, $objResult->number);
        }

        return $objResult;
    }

}