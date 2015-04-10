<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/12/15
 * Time: 5:05 PM
 */

class SudokuCell {
    private $answer;       // The answer for the given cell
    private $showAnswer = false;   // Whether or not to show the answer
    private $userGuess;
    private $notes = array();  // Notes of possible answers for the cell
    private $row;              // Row index for the cell 0-8
    private $column;           // Column index for the cell 0-8
    private $defaultValue;
    private $currentValue;

    public function __construct($answer, $row, $column, $defaultValue) {
        $this->answer = $answer;
        $this->row = $row;
        $this->column = $column;
        $this->defaultValue = $defaultValue;
    }


    public function getAnswer() {
        return $this->answer;
    }

    public function getDefaultValue() {
        return $this->defaultValue;
    }

    public function getRow() {
        return $this->row;
    }

    public function getColumn() {
        return $this->column;
    }

    public function addNote($note) {
        $this->notes[] = $note;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function setUserGuess($guess) {
        $this->userGuess = $guess;
    }

    public function getUserGuess() {
        return $this->userGuess;
    }

    public function isUserGuessCorrect() {
        if ($this->answer == $this->userGuess) {
            return true;
        } else {
            return false;
        }
    }

}