<?php

use \App\Deck;

require_once 'app/Deck.php';

$num_people = $argv[1];

// check for invalid input
if (!is_numeric($num_people) || $num_people < 0) {
    echo "Input value does not exist or value is invalid";
    exit();
}

$deck = new Deck();
$deck->buildDeck();
$deck->shuffleDeck();
$distributed_cards = $deck->distributeCards($num_people);

foreach ($distributed_cards as $cards) {
    echo $cards . "\n";
}
