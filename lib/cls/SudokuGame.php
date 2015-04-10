<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/12/15
 * Time: 5:05 PM
 */

class SudokuGame {
    private $games = array();   // array of games, 10 in total
    private $answers = array(); // array of answers, 10 in total
    private $cheatGame;  // the cheat game
    private $cheatAnswer;  // answer for the cheat game


    public function __construct() {
        $this->games[] = array(                // game 1
            array(0, 0, 0, 9, 0, 0, 0, 0, 0),
            array(7, 0, 1, 0, 0, 3, 5, 6, 0),
            array(0, 6, 4, 0, 0, 0, 0, 3, 0),
            array(5, 1, 0, 4, 6, 0, 0, 0, 2),
            array(9, 0, 0, 0, 3, 0, 0, 0, 4),
            array(4, 0, 0, 0, 5, 2, 0, 1, 9),
            array(0, 2, 0, 0, 0, 0, 1, 8, 0),
            array(0, 8, 9, 3, 0, 0, 7, 0, 6),
            array(0, 0, 0, 0, 0, 8, 0, 0, 0)
        );

        $this->answers[] = array(              // answer 1
            array(8, 5, 3, 9, 1, 6, 4, 2, 7),
            array(7, 9, 1, 2, 4, 3, 5, 6, 8),
            array(2, 6, 4, 5, 8, 7, 9, 3, 1),
            array(5, 1, 8, 4, 6, 9, 3, 7, 2),
            array(9, 7, 2, 8, 3, 1, 6, 5, 4),
            array(4, 3, 6, 7, 5, 2, 8, 1, 9),
            array(3, 2, 7, 6, 9, 4, 1, 8, 5),
            array(1, 8, 9, 3, 2, 5, 7, 4, 6),
            array(6, 4, 5, 1, 7, 8, 2, 9, 3)
        );

        $this->games[] = array(                // game 2
            array(0, 0, 4, 0, 0, 3, 0, 0, 1),
            array(0, 0, 0, 0, 2, 0, 0, 0, 9),
            array(0, 8, 3, 0, 9, 4, 0, 2, 0),
            array(1, 0, 0, 0, 0, 0, 0, 7, 0),
            array(9, 0, 8, 2, 4, 7, 6, 0, 5),
            array(0, 4, 0, 0, 0, 0, 0, 0, 8),
            array(0, 7, 0, 9, 6, 0, 5, 3, 0),
            array(3, 0, 0, 0, 5, 0, 0, 0, 0),
            array(8, 0, 0, 7, 0, 0, 9, 0, 0)
        );

        $this->answers[] = array(               // answer 2
            array(2, 9, 4, 6, 7, 3, 8, 5, 1),
            array(6, 1, 7, 8, 2, 5, 3, 4, 9),
            array(5, 8, 3, 1, 9, 4, 7, 2, 6),
            array(1, 2, 6, 5, 8, 9, 4, 7, 3),
            array(9, 3, 8, 2, 4, 7, 6, 1, 5),
            array(7, 4, 5, 3, 1, 6, 2, 9, 8),
            array(4, 7, 1, 9, 6, 8, 5, 3, 2),
            array(3, 6, 9, 4, 5, 2, 1, 8, 7),
            array(8, 5, 2, 7, 3, 1, 9, 6, 4)
        );

        $this->games[] = array(                // game 3
            array(0, 7, 6, 0, 0, 0, 3, 0, 0),
            array(0, 0, 1, 0, 4, 0, 2, 0, 0),
            array(0, 4, 0, 9, 5, 0, 0, 0, 8),
            array(0, 6, 4, 5, 0, 7, 0, 0, 9),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(7, 0, 0, 8, 0, 1, 4, 3, 0),
            array(9, 0, 0, 0, 3, 5, 0, 2, 0),
            array(0, 0, 2, 0, 7, 0, 9, 0, 0),
            array(0, 0, 7, 0, 0, 0, 8, 4, 0)
        );

        $this->answers[] = array(               // answer 3
            array(5, 7, 6, 1, 8, 2, 3, 9, 4),
            array(8, 9, 1, 7, 4, 3, 2, 6, 5),
            array(2, 4, 3, 9, 5, 6, 7, 1, 8),
            array(3, 6, 4, 5, 2, 7, 1, 8, 9),
            array(1, 8, 9, 3, 6, 4, 5, 7, 2),
            array(7, 2, 5, 8, 9, 1, 4, 3, 6),
            array(9, 1, 8, 4, 3, 5, 6, 2, 7),
            array(4, 3, 2, 6, 7, 8, 9, 5, 1),
            array(6, 5, 7, 2, 1, 9, 8, 4, 3)
        );

        $this->games[] = array(                // game 4
            array(0, 4, 0, 0, 7, 0, 0, 0, 9),
            array(0, 2, 3, 0, 0, 0, 6, 0, 0),
            array(7, 0, 0, 4, 0, 8, 5, 3, 0),
            array(0, 0, 0, 9, 0, 6, 4, 5, 0),
            array(0, 0, 0, 0, 4, 0, 0, 0, 0),
            array(0, 9, 6, 2, 0, 1, 0, 0, 0),
            array(0, 3, 8, 7, 0, 5, 0, 0, 4),
            array(0, 0, 4, 0, 0, 0, 3, 9, 0),
            array(9, 0, 0, 0, 6, 0, 0, 7, 0)
        );

        $this->answers[] = array(               // answer 4
            array(5, 4, 1, 6, 7, 3, 8, 2, 9),
            array(8, 2, 3, 5, 1, 9, 6, 4, 7),
            array(7, 6, 9, 4, 2, 8, 5, 3, 1),
            array(1, 8, 7, 9, 3, 6, 4, 5, 2),
            array(3, 5, 2, 8, 4, 7, 9, 1, 6),
            array(4, 9, 6, 2, 5, 1, 7, 8, 3),
            array(2, 3, 8, 7, 9, 5, 1, 6, 4),
            array(6, 7, 4, 1, 8, 2, 3, 9, 5),
            array(9, 1, 5, 3, 6, 4, 2, 7, 8)
        );

        $this->games[] = array(                // game 5
            array(0, 0, 0, 0, 0, 1, 0, 5, 0),
            array(8, 0, 0, 0, 2, 0, 3, 0, 0),
            array(7, 4, 6, 0, 0, 8, 2, 0, 1),
            array(9, 3, 4, 0, 0, 0, 1, 0, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 0, 8, 0, 0, 0, 4, 2, 9),
            array(2, 0, 5, 3, 0, 0, 8, 1, 7),
            array(0, 0, 9, 0, 6, 0, 0, 0, 4),
            array(0, 8, 0, 1, 0, 0, 0, 0, 0)
        );

        $this->answers[] = array(               // answer 5
            array(3, 9, 2, 6, 4, 1, 7, 5, 8),
            array(8, 5, 1, 9, 2, 7, 3, 4, 6),
            array(7, 4, 6, 5, 3, 8, 2, 9, 1),
            array(9, 3, 4, 2, 8, 6, 1, 7, 5),
            array(5, 2, 7, 4, 1, 9, 6, 8, 3),
            array(6, 1, 8, 7, 5, 3, 4, 2, 9),
            array(2, 6, 5, 3, 9, 4, 8, 1, 7),
            array(1, 7, 9, 8, 6, 2, 5, 3, 4),
            array(4, 8, 3, 1, 7, 5, 9, 6, 2)
        );

        $this->games[] = array(                // game 6
            array(0, 0, 9, 0, 0, 0, 5, 0, 0),
            array(0, 6, 8, 7, 0, 2, 4, 0, 0),
            array(0, 0, 1, 9, 0, 0, 0, 0, 2),
            array(3, 8, 0, 6, 9, 0, 0, 4, 0),
            array(0, 0, 0, 0, 0, 0, 0, 0, 0),
            array(0, 9, 0, 0, 4, 1, 0, 7, 5),
            array(9, 0, 0, 0, 0, 6, 8, 0, 0),
            array(0, 0, 3, 4, 0, 7, 1, 9, 0),
            array(0, 0, 2, 0, 0, 0, 7, 0, 0)
        );

        $this->answers[] = array(               // answer 6
            array(4, 2, 9, 1, 6, 8, 5, 3, 7),
            array(5, 6, 8, 7, 3, 2, 4, 1, 9),
            array(7, 3, 1, 9, 5, 4, 6, 8, 2),
            array(3, 8, 7, 6, 9, 5, 2, 4, 1),
            array(1, 4, 5, 2, 7, 3, 9, 6, 8),
            array(2, 9, 6, 8, 4, 1, 3, 7, 5),
            array(9, 7, 4, 5, 1, 6, 8, 2, 3),
            array(8, 5, 3, 4, 2, 7, 1, 9, 6),
            array(6, 1, 2, 3, 8, 9, 7, 5, 4)
        );

        $this->games[] = array(                // game 7
            array(0, 1, 0, 3, 2, 0, 0, 8, 0),
            array(6, 0, 0, 0, 5, 0, 0, 0, 2),
            array(0, 0, 0, 9, 0, 4, 5, 0, 0),
            array(0, 8, 6, 4, 7, 0, 0, 0, 0),
            array(0, 0, 9, 0, 0, 0, 6, 0, 0),
            array(0, 0, 0, 0, 9, 5, 1, 4, 0),
            array(0, 0, 2, 7, 0, 8, 0, 0, 0),
            array(4, 0, 0, 0, 1, 0, 0, 0, 7),
            array(0, 9, 0, 0, 3, 6, 0, 2, 0)
        );

        $this->answers[] = array(              // answer 7
            array(9, 1, 5, 3, 2, 7, 4, 8, 6),
            array(6, 3, 4, 8, 5, 1, 7, 9, 2),
            array(8, 2, 7, 9, 6, 4, 5, 3, 1),
            array(1, 8, 6, 4, 7, 3, 2, 5, 9),
            array(5, 4, 9, 1, 8, 2, 6, 7, 3),
            array(2, 7, 3, 6, 9, 5, 1, 4, 8),
            array(3, 6, 2, 7, 4, 8, 9, 1, 5),
            array(4, 5, 8, 2, 1, 9, 3, 6, 7),
            array(7, 9, 1, 5, 3, 6, 8, 2, 4)
        );

        $this->games[] = array(                // game 8
            array(6, 2, 9, 8, 0, 0, 0, 7, 3),
            array(0, 0, 4, 0, 6, 0, 0, 5, 0),
            array(0, 0, 0, 0, 0, 9, 0, 1, 2),
            array(2, 0, 0, 0, 0, 7, 0, 6, 0),
            array(0, 0, 0, 0, 4, 0, 0, 0, 0),
            array(0, 9, 0, 3, 0, 0, 0, 0, 7),
            array(9, 7, 0, 2, 0, 0, 0, 0, 0),
            array(0, 3, 0, 0, 8, 0, 7, 0, 0),
            array(8, 4, 0, 0, 0, 5, 3, 2, 1)
        );

        $this->answers[] = array(               // answer 8
            array(6, 2, 9, 8, 5, 1, 4, 7, 3),
            array(3, 1, 4, 7, 6, 2, 9, 5, 8),
            array(7, 5, 8, 4, 3, 9, 6, 1, 2),
            array(2, 8, 3, 5, 9, 7, 1, 6, 4),
            array(5, 6, 7, 1, 4, 8, 2, 3, 9),
            array(4, 9, 1, 3, 2, 6, 5, 8, 7),
            array(9, 7, 5, 2, 1, 3, 8, 4, 6),
            array(1, 3, 2, 6, 8, 4, 7, 9, 5),
            array(8, 4, 6, 9, 7, 5, 3, 2, 1)
        );

        $this->games[] = array(                 // game 9
            array(0, 0, 7, 0, 0, 0, 9, 8, 0),
            array(9, 0, 0, 0, 0, 1, 0, 0, 0),
            array(3, 0, 0, 4, 0, 9, 7, 0, 1),
            array(7, 9, 0, 0, 0, 0, 0, 1, 4),
            array(0, 0, 0, 7, 2, 4, 0, 0, 0),
            array(8, 4, 0, 0, 0, 0, 0, 2, 7),
            array(2, 0, 4, 8, 0, 7, 0, 0, 5),
            array(0, 0, 0, 6, 0, 0, 0, 0, 3),
            array(0, 5, 9, 0, 0, 0, 4, 0, 0)
        );

        $this->answers[] = array(              // answer 9
            array(4, 1, 7, 5, 6, 3, 9, 8, 2),
            array(9, 8, 5, 2, 7, 1, 3, 4, 6),
            array(3, 2, 6, 4, 8, 9, 7, 5, 1),
            array(7, 9, 2, 3, 5, 8, 6, 1, 4),
            array(5, 6, 1, 7, 2, 4, 8, 3, 9),
            array(8, 4, 3, 9, 1, 6, 5, 2, 7),
            array(2, 3, 4, 8, 9, 7, 1, 6, 5),
            array(1, 7, 8, 6, 4, 5, 2, 9, 3),
            array(6, 5, 9, 1, 3, 2, 4, 7, 8)
        );

        $this->games[] = array(                // game 10
            array(0, 2, 0, 9, 0, 1, 6, 4, 0),
            array(0, 0, 4, 0, 0, 2, 0, 0, 0),
            array(9, 0, 0, 0, 0, 0, 0, 2, 0),
            array(0, 0, 0, 0, 0, 8, 7, 3, 5),
            array(1, 0, 5, 0, 4, 0, 2, 0, 8),
            array(7, 8, 2, 3, 0, 0, 0, 0, 0),
            array(0, 6, 0, 0, 0, 0, 0, 0, 3),
            array(0, 0, 0, 1, 0, 0, 8, 0, 0),
            array(0, 4, 8, 5, 0, 9, 0, 6, 0)
        );

        $this->answers[] = array(               // answer 10
            array(8, 2, 3, 9, 5, 1, 6, 4, 7),
            array(6, 1, 4, 7, 3, 2, 5, 8, 9),
            array(9, 5, 7, 4, 8, 6, 3, 2, 1),
            array(4, 9, 6, 2, 1, 8, 7, 3, 5),
            array(1, 3, 5, 6, 4, 7, 2, 9, 8),
            array(7, 8, 2, 3, 9, 5, 4, 1, 6),
            array(5, 6, 1, 8, 2, 4, 9, 7, 3),
            array(2, 7, 9, 1, 6, 3, 8, 5, 4),
            array(3, 4, 8, 5, 7, 9, 1, 6, 2)
        );

        $this->cheatGame = array(                // the cheat game
            array(0, 0, 0, 0, 5, 0, 0, 1, 9),
            array(0, 0, 0, 0, 2, 0, 6, 3, 5),
            array(0, 0, 9, 1, 0, 0, 7, 0, 0),
            array(0, 0, 8, 0, 4, 0, 9, 0, 1),
            array(6, 0, 0, 0, 0, 0, 0, 0, 7),
            array(1, 0, 5, 0, 9, 0, 8, 0, 0),
            array(0, 0, 6, 0, 0, 5, 1, 0, 0),
            array(4, 5, 2, 0, 1, 0, 0, 0, 0),
            array(3, 7, 0, 0, 8, 0, 0, 0, 0)
        );

        $this->cheatAnswer = array(               // the answer for the cheat game
            array(2, 6, 3, 7, 5, 8, 4, 1, 9),
            array(8, 1, 7, 4, 2, 9, 6, 3, 5),
            array(5, 4, 9, 1, 6, 3, 7, 8, 2),
            array(7, 3, 8, 5, 4, 2, 9, 6, 1),
            array(6, 9, 4, 8, 3, 1, 2, 5, 7),
            array(1, 2, 5, 6, 9, 7, 8, 4, 3),
            array(9, 8, 6, 3, 7, 5, 1, 2, 4),
            array(4, 5, 2, 9, 1, 6, 3, 7, 8),
            array(3, 7, 1, 2, 8, 4, 5, 9, 6)
        );
    }

    public function getGames() {
        return $this->games;
    }

    public function getCheatGame() {
        return $this->cheatGame;
    }

    public function getAnswers() {
        return $this->answers;
    }

    public function getCheatAnswer() {
        return $this->cheatAnswer;
    }
}