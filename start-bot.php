<?php
set_time_limit(0); // ignore max_execution_time.

include_once __DIR__ . '/config.php';
include_once __DIR__ . '/Net/SmartIRC.php';
include_once __DIR__ . '/MyBot.php';

// Init the bot.
$bot = new mybot();
$irc = new Net_SmartIRC();
$irc->setDebug(SMARTIRC_DEBUG_ALL);
$irc->setUseSockets(TRUE);
// Simple Hello Handler.
$irc->registerActionhandler(SMARTIRC_TYPE_CHANNEL, '^(Hi|hi|hello|HELLO)', $bot, 'channel_hello');
// connect to server.
$irc->connect('irc.freenode.net', 6667);
// login.
$irc->login($config['nick'], 'Net_SmartIRC Client '.SMARTIRC_VERSION, 0, 'phplist.com');
// Join the channels.
$irc->join($config['chan']);
// Set default topics.
foreach($config['chan'] as $chan) {
  $irc->setTopic($chan, $config['topic']); 
}
$irc->listen();
$irc->disconnect();
