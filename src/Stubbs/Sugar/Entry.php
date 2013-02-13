<?php

namespace Stubbs\Sugar;

/**
 * Base level class that all SugarCRM "Entry" type classes must derive from.
 *
 * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
 */
class Entry {
    /**
     * Holds all the decoded data on an entry.
     *
     * @var Object
     **/
    private $objPayload;

    /**
     * Unserializes a JSON message into a local store.
     *
     * @return void
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function __construct($strPayload)
    {
        $this->objPayload = json_decode($strPayload);
    }

    /**
     * Serialize this object to JSON
     *
     * @return String
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function toJSON()
    {
        return json_encode($this->objPayload);
    }

    /**
     * Returns the payload as an array.
     *
     * @return Array
     * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
     **/
    public function toArray()
    {
        return (array) $this->objPayload;
    }
};