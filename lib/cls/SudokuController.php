<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/7/15
 * Time: 11:58 PM
 */

class SudokuController {

    private $sudoku;                // The sudoku object we are controlling
    private $page ='game.php';     // The next page we will go to
    private $reset = false;
    private $cheatmode = false;
    private $loadDbase = false;
    private $setUsername = false;


    public function __construct($GameSudoku,$sudoku,$request) {

            $this->sudoku = $GameSudoku;

        if(isset($request['save'])){
            $save =  new SaveSudokuGame($GameSudoku,$sudoku);
            //needs a userid
            $save->processSave('elhazzat');
        }
        elseif(isset($request['load'])){

            $this->loadDbase = true;
        }

        elseif(isset($request['c'])){
            //activate the cheat mode
            $this->cheatmode = true;

        }

        elseif(isset($request['submit_button'])) {
                $row = $request['x'];
                $column = $request['y'];
                $guess = $request['cell_value'];
                $this->insert_into_cell($row, $column, $guess);
        }
        elseif(isset($request['note_button'])){
                $row = $request['x'];
                $column = $request['y'];
                $note = $request['cell_note'];
                $this->hint($note,$row, $column);
            }
        elseif(isset($request['n'])){
            //new game
            $this->reset = true;
        }

        elseif(isset($request['m'])){
            //activate the cheat mode
            $this->giveup();
        }


    }
    public function setUsername() {
        return $this->setUsername;
    }

    public function getPage(){
        return $this->page;
    }
    public function isReset(){
        return $this->reset;

    }

    public function IscheatMode(){
       return $this->cheatmode;
    }

    public function IsLoadfromdbase(){


        return $this->loadDbase;
    }

    /** Move request
     * @param $ndx Index of the cell in the sudoku */


    public function insert_into_cell($row, $column,$guess)
    {
        if ($this->sudoku->setUserGuessForCell($guess, $row, $column) === true) {
            $this->won();
        }

    }

    /** Move request
     * @param $ndx Index of the cell in to show the hint in */
    public function hint($note,$row, $column){
        $this->sudoku->addNoteForCell($note, $row, $column);
    }

    public function giveup(){
        $this->page = 'giveup.php';
    }
    public function won(){
        $this->page = 'win.php';

    }

}
