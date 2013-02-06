# Cane
## A PHP Libary for the SugarCRM REST Interface

### Installation

Install Cane with composer:

    composer require stubbs/cane:dev

### Usage

### Todo

* The unit tests need an instance of SugarCRM up & running :-/
* Write usage examples above.
* Abstract login credentials into a seperate object.
* The way SugarAPI class figure out which element is the data from the API reply can be brittle, it needs a better way to work it out if possible.
* Put an exception in SugarAPI::callAPI than gets thrown when the API returns an error.