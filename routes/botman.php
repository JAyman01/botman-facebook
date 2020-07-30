<?php

use App\Conversations\AttachmentConversation;
use App\Conversations\LocationConversation;
use App\Conversations\QuickReplyConversation;
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

$botman = resolve('botman');


$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('It just works', function ($bot) {
    $bot->reply('Yep 🤘');
});


$botman->hears('I want location', function ($bot) {
    $bot->startConversation(new LocationConversation());
});

$botman->hears('I want more', function ($bot) {
    $bot->startConversation(new QuickReplyConversation());
});

$botman->hears('I want file', function ($bot) {
    $bot->startConversation(new AttachmentConversation());
});

//$botman->hears('Start conversation', BotManController::class . '@startConversation');
