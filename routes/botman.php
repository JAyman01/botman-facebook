<?php

use App\Conversations\AttachmentConversation;
use App\Conversations\LocationConversation;
use App\Conversations\QuickReplyConversation;
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

$botman = resolve('botman');


$botman->hears('Hi', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->reply('Hello!');
});

$botman->hears('Heyheyhey', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->reply('Hello!');
});


$botman->hears('Get started', function ($bot) {
    $bot->typesAndWaits(3);
    $bot->reply('Hello bargouga!');
});
$botman->hears('It just works', function ($bot) {
    $bot->reply('Yep 🤘');
});


$botman->hears('I want location', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new LocationConversation());
});

$botman->hears('I want more', function ($bot) {
    $bot->typesAndWaits(3);
    $bot->startConversation(new QuickReplyConversation());
});

$botman->hears('I want file', function ($bot) {
    $bot->typesAndWaits(2);
    $bot->startConversation(new AttachmentConversation());
});

$botman->hears('I want list', function ($bot) {
    $bot->typesAndWaits(2);
    $attachment = new Image('https://botman.io/img/logo.png');

    // Build message object
    $message = OutgoingMessage::create('This is my text')
        ->withAttachment($attachment);

    // Reply message object
    $bot->reply($message);
});



$botman->hears('Start conversation', BotManController::class . '@startConversation');


$botman->fallback(function ($bot) {
    $bot->reply('Sorry, I did not understand these commands. try again');
});

// $botman->