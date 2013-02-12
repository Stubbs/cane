<?php

/**
 * Represents a Sugar CRM Lead
 */

namespace Stubbs\Sugar;

/**
 * Represents a SugarCRM Lead.
 *
 * The field names in these classes reflect what they are called in the API.
 *
 * @package default
 * @author 
 **/
class Lead
{
    /**
     * @var integer Unique identifier for this contact.
     **/
    public $id;
    
    /**
     * @var $strName Name of the lead.
     */
    public $name;

    /**
     * @var DateTime The date the contact was added to SugarCRM
     */
    public $date_entered;

    /**
     * @var DateTime The date/time the record was last modified.
     */
    public $date_modified;

    /**
     * @var string The username of the last person to modify the record.
     */
    public $modified_user_id;

    /**
     * @var string The display name of the last user to modify the record.
     */
    public $modified_by_name; 

    /**
     * @var string The username of the person who created the record.
     */
    public $created_by;

    /**
     * @var string The display name of the user who created the record.
     */
    public $created_by_name; 

    /**
     * @var string Description
     */
    public $description;

    /**
     * @var boolean Indicated if the record has been deleted.
     */
    public $deleted;

    /**
     * @var string The username of the person who the record is assigned to.
     */
    public $assigned_user_id;

    /**
     * @var string The display name of the person who the record is assigned to.
     */
    public $assigned_user_name; 

    /**
     * @var string Salutation
     */
    public $salutation;

    /**
     * @var string First Name
     */
    public $first_name;

    /**
     * @var string Last Name
     */
    public $last_name;

    /**
     * @var string Full name
     */
    public $full_name;

    /**
     * @var string contact's title
     */
    public $title;

    /**
     * @var string Department
     */
    public $department;

    /**
     * @var boolean Do not call this contact
     */
    public $do_not_call;

    /**
     * @var string Home phone number
     */
    public $phone_home;

    /**
     * @var string Email address
     */
    var $email;

    /**
     * @var string Alternative Email address
     */
    var $email1;

    /**
     * @var string Another email address (who has 3!!)
     */
    var $email2;

    /**
     * @var boolean Invalid email address.
     */
    var $invalid_email;

    /**
     * @var boolean Email opt out
     */
    var $email_opt_out;

    /**
     * @var string Mobile phone number
     */
    public $phone_mobile;

    /**
     * @var string Work phone number
     */
    public $phone_work;

    /**
     * @var string Other phone number
     */
    public $phone_other;

    /**
     * @var string Fax phone number
     */
    public $phone_fax;

    /**
     * @var string Primary street address.
     */
    public $primary_address_street;

    /**
     * @var string Primary street address line 2.
     */
    public $primary_address_street_2;

    /**
     * @var string Primary street address line 3.
     */
    public $primary_address_street_3;

    /**
     * @var string Primary address city.
     */
    public $primary_address_city;

    /**
     * @var string Primary address state.
     */
    public $primary_address_state;

    /**
     * @var string Primary post code.
     */
    public $primary_address_postalcode;

    /**
     * @var string Primary country.
     */
    public $primary_address_country;

    /**
     * @var string Alt street address.
     */
    public $alt_address_street;

    /**
     * @var string Alt street address line 2.
     */
    public $alt_address_street_2;

    /**
     * @var string Alt street address line 3.
     */
    public $alt_address_street_3;

    /**
     * @var string Alt address city.
     */
    public $alt_address_city;

    /**
     * @var string Alt address state.
     */
    public $alt_address_state;

    /**
     * @var string Alt post code.
     */
    public $alt_address_postal_code;

    /**
     * @var string Alt country.
     */
    public $alt_address_country;

    /**
     * @var string Assistant name
     */
    public $assistant;

    /**
     * @var string Assistant phone
     */
    public $assistant_phone;

    /**
     * @var string Lead source
     */
    public $lead_source;

    /**
     * @var string Lead source description.
     */
    public $lead_source_description;

    /**
     * @var string $strStatus Status of this lead.
     */
    public $status;

    /**
     * @var string $strStatusDescription Status of this lead.
     */
    public $status_description;

    /**
     * @var boolean $bolConverted Has the lead been converted
     */
    public $converted;

    /**
     * @var string $strReferredBy Referred by
     */
    public $referred_by;

    /**
     * @var string $reports_to_id The ID of the person this lead reports to.
     */
    private $reports_to_id;

    /**
     * @var string $reports_to_name The name of the person this lead reports to.
     */
    private $reports_to_name;

    /**
     * @var string $account_id ID of the account.
     */
    private $account_id;

    /**
     * @var string Account ID
     */
    public $account_name;

    /**
     * @var string $account_description Account description.
     */
    private $account_description;

    /**
     * @var string $campaign_id Campaign ID
     */
    public $campaign_id;

    /**
     * @var string Campaign Name
     */
    public $campaign_name;

    /**
     * @var string $contact_id The contact ascociated witht his lead.
     */
    public $contact_id;

    /**
     * @var string $opportunity_id ID of the opportunity
     */
    public $opportunity_id;

    /**
     * @var string $opportunity_name The name of the opportunity.
     */
    public $opportunity_name;

    /**
     * @var string $opportunity_amount The amount of this opportunity.
     */
    private $opportunity_amount;
} // END class Contact