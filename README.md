# Tribearc Mail

A wrapper for sending mail and sms with tribearc mail api

## Installation

Require `adebayo27/tribearcmail` using composer.

## Usage

Add the following to the .env file

`TRIBEARC_MAIL_API_KEY="Your api key gotten from tribearc mail"`<br/>
`TRIBEARC_MAIL_FROM_NAME="Your from name"`<br/>
`TRIBEARC_MAIL_FROM_EMAIL="your from email"`<br/>
`TRIBEARC_MAIL_REPLY_TO="your reply to email"`<br/>
`TRIBEARC_MAIL_BUSINESS_ADDRESS="your business address (registered with tribe)"`<br/>
`TRIBEARC_MAIL_BUSINESS_NAME="your business name (registered with tribe)"`<br/>


### Example: using the library

```php
<?php

use Adebayo27\Tribearcmail\TribearcMail;

$tribearc = new TribearcMail();

//send transactional email 
$response = $tribearc->tribearcSendMail('Subject', 'Email body', 'email address');

//send bulk email
$responseBulk = $tribearc->tribearcSendBulkMail('Subject', 'Email body', 'ade@mail.com,bayo@mail.com,koya@mail');


//send instant sms 
coming soon

```
