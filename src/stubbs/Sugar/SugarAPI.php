<?php

/**
 * (c) Stuart M. Grimshaw 2013
 *
 * For full license details see ...
 */

namespace Stubbs\Sugar;

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
     * Constructore
     *
     * @return void
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function __construct($strRESTURL)
    {
        $this->strAPIUrl = $strRESTURL;
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
        $this->strAPIUrl = $strURL;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    private function callAPI($method, $arrParameters)
    {
        $curl_request = curl_init();
 
        curl_setopt($curl_request, CURLOPT_URL, $url);
        curl_setopt($curl_request, CURLOPT_POST, 1);
        curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl_request, CURLOPT_HEADER, 1);
        curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);
     
        $jsonEncodedData = json_encode($parameters);

        $post = array(
             "method" => $method,
             "input_type" => "JSON",
             "response_type" => "JSON",
             "rest_data" => $jsonEncodedData
        );

        curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($curl_request);
        curl_close($curl_request);
     
        $result = explode("\r\n\r\n", $result, 2);
        $response = json_decode($result[1]);
        ob_end_flush();
     
        return $response;
    }

    /**
     * Login to the API
     *
     * @return void
     * @author 
     **/
    public function login($strUsername, $strpassword)
    {
        $login_parameters = array(
            "user_auth"=>array(
                "user_name"=>$username,
                "password"=>md5($password),
                "version"=>"1"
            ),
            "application_name"=>"RestTest",
            "name_value_list"=>array(),
        );

        
    }
} // END class Sugar