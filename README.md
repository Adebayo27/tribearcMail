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
$response = $tribearc->tribearcSendBulkMail('Subject', 'Email body', 'ade@mail.com,bayo@mail.com,koya@mail');


//send instant sms 
$response = $tribearc->tribearcSMSInstant(
    [
        "from" => "Kent",
        "to" => "+2348012345678",
        "message" => "Hello Adebayo",
    ]
);

//check sms balance
$response = $tribearc->tribearcCheckSMSBalance();

//check from email status
$response = $tribearc->tribearcCheckFromEmailStatus('hello@adebayo.com');

//send email to saved list
$response = $tribearc->tribearcSendEmailToSavedList(
    [        
        'title' => 'Campaign',
        'subject' => 'subject',
        'html_text' => 'Hello',
        'plain_text' => '', //optional
        'list_ids' => 'your list ids', //Required only if you set send_campaign to 1 and no segment_ids are passed in. List IDs should be single or comma-separated. The encrypted & hashed ids can be found under View all lists section named ID.
        'exclude_list_ids' => '', //Lists to exclude from your campaign. List IDs should be single or comma-separated. The encrypted & hashed ids can be found under View all lists section named ID. (optional)
        'track_opens' => '1', //Set to 0 to disable, 1 to enable and 2 for anonymous opens tracking.
        'query_string' => '', //eg. Google Analytics tags (optional)
        'brand_id' => '', //Required only if you are creating a 'Draft' campaign (send_campaign set to 0 or left as default). Brand IDs can be found under 'Brands' page named ID
        'track_clicks' => '1', //Set to 0 to disable, 1 to enable and 2 for anonymous opens tracking.
        'send_campaign' => '1', //Set to 1 if you want to send the campaign as well and not just create a draft. Default is 0.
        'segment_ids' => '', //Required only if you set send_campaign to 1 and no list_ids are passed in. Segment IDs should be single or comma-separated. Segment ids can be found in the segments setup page.
        'schedule_date_time' => '', //Campaign will be scheduled if a valid date/time is passed. Date/time format eg. June 15, 2021 6:05pm. The minutes part of the time has to be in increments of 5, eg. 6pm, 6:05pm, 6:10pm, 6:15pm.
        'schedule_timezone' => '', //Eg. 'America/New_York'. See the list of PHP's supported timezones. This parameter only applies if you're scheduling your campaign with schedule_date_time parameter. TribeArc will use your default timezone if this parameter is empty.
    ]

);

//subscribe to list
$response = $tribearc->tribearcSubscribeToList(
    [
        "name" => "Kent",
        "email" => "hello@adebayo.com",
        "list" => "your list id",
        "country" => "NG",
    ]
);


```
