<?php

/**
 * Represents a Sugar CRM Contact
 */

namespace Stubbs\Sugar;

/**
 * Represents a SugarCRM Contact.
 *
 * @package default
 * @author 
 **/
class Contact
{
    /**
     * @var integer Unique identifier for this contact.
     **/
    public $intID;
    
    /**
     * @var DateTime The date the contact was added to SugarCRM
     */
    public $dtmEntered;

    /**
     * @var DateTime The date/time the record was last modified.
     */
    public $dtmModified;

    /**
     * @var string The username of the last person to modify the record.
     */
    public $strModifiedByUsername;

    /**
     * @var string The display name of the last user to modify the record.
     */
    public $strModifiedByDisplayName; 

    /**
     * @var string The username of the person who created the record.
     */
    public $strCreatedByUsername;

    /**
     * @var string The display name of the user who created the record.
     */
    public $strCreatedByDisplayName; 

    /**
     * @var string Description
     */
    public $strDescription;

    /**
     * @var boolean Indicated if the record has been deleted.
     */
    public $bolDeleted;

    /**
     * @var string The username of the person who the record is assigned to.
     */
    public $strAssignedToUsername;

    /**
     * @var string The display name of the person who the record is assigned to.
     */
    public $strAssignedToDisplayName; 

    /**
     * @var string Salutation
     */
    public $strSalutation;

    /**
     * @var string First Name
     */
    public $strFirstName;

    /**
     * @var string Last Name
     */
    public $strLastName;

    /**
     * @var string Full name
     */
    public $strFullName;

    /**
     * @var string contact's title
     */
    public $strTitle;

    /**
     * @var string Department
     */
    public $strDepartment;

    /**
     * @var boolean Do not call this contact
     */
    public $bolDoNotCall;

    /**
     * @var string Home phone number
     */
    public $strHomePhone;

    /**
     * @var string Email address
     */
    var $strEmail;

    /**
     * @var string Alternative Email address
     */
    var $strOtherEmail;

    /**
     * @var boolean Invalid email address.
     */
    var $bolInvalidEmail;

    /**
     * @var boolean Email opt out
     */
    var $bolEmailOptOut;

    /**
     * @var string Mobile phone number
     */
    public $strMobilePhone;

    /**
     * @var string Work phone number
     */
    public $strWorkPhone;

    /**
     * @var string Other phone number
     */
    public $strOtherPhone;

    /**
     * @var string Fax phone number
     */
    public $strFaxPhone;

    /**
     * @var string Primary street address.
     */
    public $strPrimaryStreetAddress;

    /**
     * @var string Primary street address line 2.
     */
    public $strPrimaryStreetAddress2;

    /**
     * @var string Primary street address line 3.
     */
    public $strPrimaryStreetAddress3;

    /**
     * @var string Primary address city.
     */
    public $strPrimaryCity;

    /**
     * @var string Primary address state.
     */
    public $strPrimaryState;

    /**
     * @var string Primary post code.
     */
    public $strPrimaryPostcode;

    /**
     * @var string Primary country.
     */
    public $strPrimaryCountry;

    /**
     * @var string Alt street address.
     */
    public $strAltStreetAddress;

    /**
     * @var string Alt street address line 2.
     */
    public $strAltStreetAddress2;

    /**
     * @var string Alt street address line 3.
     */
    public $strAltStreetAddress3;

    /**
     * @var string Alt address city.
     */
    public $strAltCity;

    /**
     * @var string Alt address state.
     */
    public $strAltState;

    /**
     * @var string Alt post code.
     */
    public $strAltPostcode;

    /**
     * @var string Alt country.
     */
    public $strAltCountry;

    /**
     * @var string Assistant name
     */
    public $strAssistantName;

    /**
     * @var string Assistant phone
     */
    public $strAssistantPhone;

    /**
     * @var string Lead source
     */
    public $strLeadSource;

    /**
     * @var string Account name
     */
    public $strAccountName;

    /**
     * @var string Account ID
     */
    public $strAccountID;

    /**
     * @var integer Opportunity role ID
     */
    public $intOpportunityRoleID;

    /**
     * @var string Opportunity role
     */
    public $strOpportunityRole;

    /**
     * @var integer Reports to ID
     */
    public $intReportsToID;

    /**
     * @var string Reports to.
     */
    public $strReportsTo;

    /**
     * @var DateTime Date of birth
     */
    public $dtmBirthDate;

    /**
     * @var integer Campaign ID
     */
    public $intCampaignID;

    /**
     * @var string Campaign Name
     */
    public $strCampaignName;
} // END class Contact