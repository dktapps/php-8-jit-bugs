<?php

final class Message
{
    public $qr = false;

    public $opcode = 0;

    public $aa = false;
}

echo "Starting...\n";

function headerToBinary(Message $message)
{
	$flags = 0;
	$flags = ($flags << 1) | ($message->qr ? 1 : 0);
	$flags = ($flags << 4) | $message->opcode;
	var_dump($flags);
	$flags = ($flags << 1) | ($message->aa ? 1 : 0);
}

headerToBinary(new Message());

echo "PROBLEM NOT REPRODUCED !\n";
