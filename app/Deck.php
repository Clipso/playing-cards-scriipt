<?php

namespace App;

class Deck {
    private $deck;
    private $suits;
    private $faces;

    public function __construct() {
        $this->deck = array();
        $this->suits = array("S", "H", "D", "C");
        $this->faces = array("A", "2", "3", "4", "5", "6", "7", "8", "9", "X", "J", "Q", "K");
    }

    public function buildDeck() {
        foreach ($this->suits as $suit) {
            foreach ($this->faces as $face) {
                $card = $suit . "-" . $face;
                array_push($this->deck, $card);
            }
        }
    }

    public function shuffleDeck() {
        shuffle($this->deck);
    }

    public function distributeCards($num_people) {
        $cards_per_person = (int) (52 / $num_people);
        $distributed_cards = array();
        for ($i = 0; $i < $num_people; $i++) {
            $distributed_cards[$i] = "";
            for ($j = 0; $j < $cards_per_person; $j++) {
                $distributed_cards[$i] .= array_pop($this->deck) . ",";
            }
            $distributed_cards[$i] = rtrim($distributed_cards[$i], ",");
        }
        return $distributed_cards;
    }
}
