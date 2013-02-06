<?php

/**
 * (c) Stuart M. Grimshaw 2013
 *
 * For full license details see ...
 */

namespace Stubbs\Sugar;

use UnexpectedValueException;
use Contact;

/**
 * Sugar provides conveinience methods for updating and reading data from a SugarCRM
 * instance.
 *
 * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
 **/
class SugarAPI
{
    /**
     * @var string The base URI to use for the API.
     **/
    private $strAPIUrl;

    /**
     * The unique login token all API calls after login must use.
     *
     * @var string
     **/
    private $strID;

    /**
     * Constructore
     *
     * @return void
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function __construct($strRESTURL)
    {
        $this->setAPIUri($strRESTURL);
    }

    /**
     * @return string The URL for the API.
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function getAPIUrl()
    {
        return $this->strAPIUrl;
    }

    /**
     * @param  string $strURI The URI of the API
     * @return void
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com> 
     **/
    public function setAPIUri($strURL)
    {
        $this->strAPIUrl = $strURL . '/service/v4/rest.php';
    }

    /**
     * Returns the login ID Token all API calls must use.
     *
     * @return String
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function getID()
    {
        return $this->strID;
    }

    /**
     * Sets the token ID for this instance of the API class.
     *
     * @return void
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function setID($strID)
    {
        $this->strID = $strID;
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
    private function callAPI($strMethod, $arrParameters)
    {
        $curl_request = curl_init();
 
        curl_setopt($curl_request, CURLOPT_URL, $this->strAPIUrl);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);
     
        $jsonEncodedData = json_encode($arrParameters);

        $arrPost = array(
             "method" => $strMethod,
             "input_type" => "JSON",
             "response_type" => "JSON",
             "rest_data" => $jsonEncodedData
        );

        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $arrPost);
        $result = curl_exec($curl_request);
        curl_close($curl_request);
     
        $result = explode("\r\n\r\n", $result, 2);

        $objResult = json_decode($result[1]);

        return $objResult;
    }

    /**
     * Login to the API
     *
     * @param String $strUsername The username to log in as.
     * @param String $strPassword The password to use for login.
     * @return bool
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function login($strUsername, $strPassword)
    {
        $arrLoginParameters = array(
            "user_auth"=>array(
                "user_name"=>$strUsername,
                "password"=>md5($strPassword),
                "version"=>"1"
            ),
            "application_name"=>"RestTest",
            "name_value_list"=>array(),
        );

        $objResponse = $this->callAPI('login', $arrLoginParameters);

        if($objResponse === null) {
            throw new UnexpectedValueException("Null response from login call. Check the URL you supplied.");
        }

        if (isset($objResponse->name) && isset($objResponse->number)) {
            throw new UnexpectedValueException("Invalid username and/or password");
        }
        $this->setID($objResponse->id);
    }

    /**
     * Returns a list of available modules.
     *
     * @return array
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function getAvailableModules($strFilter = "all")
    {
        $arrCallParameters = array(
            "session" => $this->getID(),
            "filter" => $strFilter
        );

        $objResponse = $this->callAPI("get_available_modules", $arrCallParameters);

        return $objResponse->modules;
    }

    /**
     * Returns a list of all the fields valid for this module.
     *
     * @return array
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function getModuleFields($strModuleName)
    {
        $arrCallParameters = array(
            "session" => $this->getID(),
            "module_name" => $strModuleName
        );

        $objResponse = $this->callAPI("get_module_fields", $arrCallParameters);

        if(isset($objResponse->name) && isset($objResponse->name)) {
            throw new UnexpectedValueException("Unable to find module " . $strModuleName);
        }

        return $objResponse->module_fields;
    }


    /**
     * Create a new contact.
     *
     * @return bool
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function createContact(Contact $objContact)
    {
    }
} // END class Sugar