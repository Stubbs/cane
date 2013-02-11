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
     * @var $objAuth The authenticaton token for this API
     */
    private $objAuth;

    /**
     * @var $objTransport The transport layer to use for this API.
     */
    private $objTransport;

    /**
     * Constructore
     *
     * @return void
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function __construct($objTransport)
    {
        $this->objTransport = $objTransport;
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
            "filter" => $strFilter
        );

        $objResponse = $this->objTransport->call("get_available_modules", $arrCallParameters);

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
            "module_name" => $strModuleName
        );

        $objResponse = $this->objTransport->call("get_module_fields", $arrCallParameters);

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