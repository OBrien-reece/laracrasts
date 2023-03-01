<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class NewsLetter {

    public function subscribe(string $email) {

        return $this->client()->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }

    protected function client() {
        $mailchimp = new ApiClient();

        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21'
        ]);
    }

}
