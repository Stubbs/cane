<?php

namespace Stubbs\Sugar;

/**
 * Represents a SugarCRM Account.
 *
 * The field names in these classes reflect what they are called in the API.
 *
 * @package cane
 * @author Stuart Grimshaw <stuart.grimshaw@gmail.com>
 **/
class Account
{
    /**
     * @var $intID The ID of the account.
     */
    public $intID;

    /**
     * @var $name The name of the account
     */
    public $name;

    /**
     * @var $dtmDateEntered The date the account was first entered.
     */
    public $dtmDateEntered;

    /**
     * @var $dtmModified The date the account was last modified.
     */
    public $dtmModified;

    /**
     * @var $strModifiedBy The username of the person to last modify the account.
     */
    public $strModifiedBy;

    /**
     * @var $strCreatedBy The user who originally created the account.
     */
    public $strCreatedBy;

    /**
     * @var $strDescription Description of the account.
     */
    public $strDescription;

    /**
     * @var $bolDeleted Has the account been deleted.
     */
    public $bolDeleted;

    /**
     * @var $strAssignedUserID The ID of the user this account is assigned to.
     */
    public $strAssignedUserID;

    /**
     * @var $strAssignedUserName The name of the assigned user.
     */
    public $strAssignedUserName;

    /**
     * @var $strAccountType The type of account.
     */
    public $strAccountType;

    /**
     * @var $strIndustry The type of industry this account is involved in.
     */
    public $strIndustry;

    /**
     * @var $strAnnualRevenue The annual revenure of this account.
     */
    public $strAnnualRevenue;

     /**
     * @var string Fax phone number
     */
    public $strFaxPhone;

        /**
     * @var string Billing street address.
     */
    public $strBillingStreetAddress;

    /**
     * @var string Billing street address line 2.
     */
    public $strBillingStreetAddress2;

    /**
     * @var string Billing street address line 3.
     */
    public $strBillingStreetAddress3;

    /**
     * @var string Billing street address line 4.
     */
    public $strBillingStreetAddress4;

    /**
     * @var string Billing address city.
     */
    public $strBillingCity;

    /**
     * @var string Billing address state.
     */
    public $strBillingState;

    /**
     * @var string Billing post code.
     */
    public $strBillingPostcode;

    /**
     * @var string Billing country.
     */
    public $strBillingCountry;

    /**
     * @var string Shipping street address.
     */
    public $strShippingStreetAddress;

    /**
     * @var string Shipping street address line 2.
     */
    public $strShippingStreetAddress2;

    /**
     * @var string Shipping street address line 3.
     */
    public $strShippingStreetAddress3;

    /**
     * @var string Shipping street address line 4.
     */
    public $strShippingStreetAddress4;

    /**
     * @var string Shipping address city.
     */
    public $strShippingCity;

    /**
     * @var string Shipping address state.
     */
    public $strShippingState;

    /**
     * @var string Shipping post code.
     */
    public $strShippingPostcode;

    /**
     * @var string Shipping country.
     */
    public $strShippingCountry;

    /**
     * @var $strRating A string for the rating.
     */
    public $strRating;

    /**
     * @var string Alt phone number
     */
    public $strAlternatePhone;

    /**
     * @var $strWebsite URL of the companies website.
     */
    public $strWebsite;

    /**
     * @var $strOwnership Ownership
     */
    public $strOwnership;

    /**
     * @var $strEmployees The number of employees at the cpmpany
     */
    public $strEmployees;

    /**
     * @var $strTickerSymbol Stock market ticker symbol.
     */
    public $strTickerSymbol;
    
    /**
     * @var string Email address
     */
    var $strEmail;

    /**
     * @var string Email address
     */
    var $strEmail1;

    /**
     * @var $intParentID ID of the parent account.
     */
    public $intParentID;

}