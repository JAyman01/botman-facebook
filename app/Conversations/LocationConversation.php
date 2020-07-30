<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\Drivers\Facebook\Extensions\QuickReplyButton;
use Illuminate\Support\Facades\Log;

class LocationConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function askLocation()
    {
        $this->askForLocation('Please send your location', function (Location $location) {
            // Log::info($location);
            $this->bot->reply('Awesome 🤘' . $location->getLatitude());
            $this->bot->reply('Awesome 🤘' . $location->getLongitude());
        });
    }

    public function run()
    {
        $this->askLocation();
    }
}
