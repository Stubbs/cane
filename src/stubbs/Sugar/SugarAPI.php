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
    private $strAPIUri;

    /**
     * @return string The URL for the API.
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function getAPIUri()
    {
        return $this->strAPIUri;
    }

    /**
     * @param  string $strURI The URI of the API
     * @return void
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com> 
     **/
    public function setAPIUri($strURI)
    {
        $this->strAPIUri = $strURI;
    }
} // END class Sugar