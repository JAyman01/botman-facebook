<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\Drivers\Facebook\Extensions\QuickReplyButton;
use Illuminate\Support\Facades\Log;

class QuickReplyConversation extends Conversation
{


    public function run()
    {
        $this->askAboutMore();
    }

    private function askAboutMore()
    {
        $question = Question::create('Are you sure?')->addButtons([
            Button::create('Yes')->value('yes'),
            Button::create('No')->value('no'),
        ]);


        $this->ask($question, function (Answer $answer) {
            if ($answer->getValue() === 'yes') {
                $this->bot->reply('Awesome 🤘');
            } else
                $this->bot->reply('Okay 🤘:( ');
        });
    }
}
