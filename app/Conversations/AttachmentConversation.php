<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Exception;

class AttachmentConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function askFile()
    {
        try {
            $question = Question::create('which type you want to send?')->addButtons([
                Button::create('Image')->value('image'),
                Button::create('Video')->value('video'),
            ]);


            $this->ask($question, function (Answer $answer) {
                if ($answer->getValue() === 'image') {
                    $this->askForImages('Please send an image', function ($images) {
                        foreach ($images as $image) {
                            $this->bot->reply('URL file 🤘' . $image->getUrl());
                        }
                    });
                } else   if ($answer->getValue() === 'video') {
                    $this->askForVideos('Please send a video', function ($videos) {
                        foreach ($videos as $video) {
                            $this->bot->reply('URL file 🤘' . $video->getUrl());
                        }
                    });
                }
            });
        } catch (Exception $e) {
            $this->bot->reply('Oops something went wrong !! try again later');
        }
    }

    public function run()
    {
        $this->askFile();
    }
}
