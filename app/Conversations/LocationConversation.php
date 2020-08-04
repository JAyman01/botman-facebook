<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Conversations\Conversation;
use Exception;

class LocationConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function askLocation()
    {
        try {
            $this->askForLocation('Please send your location', function (Location $location) {
                $this->bot->reply('Awesome 🤘your lat is: ' . $location->getLatitude());
                $this->bot->reply('Awesome 🤘your long is: ' . $location->getLongitude());
            });
        } catch (Exception $e) {
            $this->bot->reply('Oops something went wrong !! try again later');
        }
    }

    public function run()
    {
        $this->askLocation();
    }
}
