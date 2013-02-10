<?php

/**
 * (c) Stuart M. Grimshaw 2013
 *
 * For full license details see ...
 */

namespace Stubbs\Sugar;

use UnexpectedValueException;

/**
 * Represents an Auth token for SugarCRM's REST API.
 *
 * @package  cane
 * @author   Stuart Grimshaw <stuart.grimshaw@gmail.com>
 */
class Auth {
    /**
     * @var $sessionid The ID of the session return by a succesfull login.
     */
    private $strSessionID;

    /**
     * Attempt a login.
     *
     * @param String $strPassword The password to use for login.
     * @param String $strURL The URL to use for login.
     * @param Transport $objTransport The Transport object to use to talk to SugarCRM.
     * 
     * @return boolean
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function login($strUsername, $strPassword, $objTransport)
    {
        if($strUsername == null || $strPassword == null || $objTransport == null) {
            throw new UnexpectedValueException("You must supply a username, password & URL to login.");
        }

        $arrLoginParameters = array(
            "user_auth"=>array(
                "user_name"=>$strUsername,
                "password"=>md5($strPassword),
                "version"=>"1"
            ),
            "application_name"=>"RestTest",
            "name_value_list"=>array(),
        );

        $objResponse = $objTransport->call('login', $arrLoginParameters);

        if($objResponse === null) {
            throw new UnexpectedValueException("Null response from login call. Check the URL you supplied.");
        }

        $this->strSessionID = $objResponse->id;

    }

    /**
     * Returns the session ID after a succesfull log in attempt
     *
     * @return string
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function getSessionID()
    {
        return $this->strSessionID;
    }
}