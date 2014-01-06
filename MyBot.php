<?php

class MyBot
{
    function channel_hello(&$irc, &$data)
    {
	    $messages = array('Hi!','Hey Hey!','Hola');
        $irc->message(SMARTIRC_TYPE_CHANNEL, $data->channel, $data->nick.': '. $messages[array_rand($messages)]);
    }

}