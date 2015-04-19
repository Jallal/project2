<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 2/7/15
 * Time: 11:33 PM
 */

class SudokuView {

    private $sudoku;    // The sudoku object



    public function __construct($GameSudoku) {
       $this->sudoku = $GameSudoku;

    }

    public function updatedStatus() {



        $html = <<<HTML
<table>
  <colgroup><col><col><col>
  <colgroup><col><col><col>
  <colgroup><col><col><col>
  <tbody>
HTML;


        for ($x = 0; $x < 9; $x++) {
            if ($x % 3 == 0) {
                $html .= '<tbody>';
            }

            $html .= '<tr>';

            for($y = 0; $y < 9; $y++)
            {
                if ($this->sudoku->getDefaultValue($x,$y) != 0) {
                    $html .= <<<HTML
                    <td><div class="cell">{$this->sudoku->getDefaultValue($x,$y)}</div>
HTML;
                } else if ($this->sudoku->getUserGuessForCell($x,$y)) {

                    if ($this->sudoku->isUserGuessCorrect($x,$y)){
                        $html .= <<<HTML
                    <td><a class="cell guess" href="cell.php?x=$x&y=$y">{$this->sudoku->getUserGuessForCell($x,$y)}</a>
HTML;
                    } else {
                        $html .= <<<HTML
                    <td><a class="cell guess wrong" href="cell.php?x=$x&y=$y">{$this->sudoku->getUserGuessForCell($x,$y)}</a>
HTML;
                    }




                } else if ($this->sudoku->getNotesForCell($x,$y) != array()){

                    //$html .= '<td class="notes"><div class=""><a class="guess-right" href="cell.php?x=' . $x . '&y=' . $y . '">';
                    $notes = $this->sudoku->getNotesForCell($x, $y);
                    $html .= '<td class="notes">';
                    for ($i = 0; $i < count($notes); $i++) {
                        if ($i%3 == 0) {
                            $html .= '<div class="note-div">';
                        }
                        $html .= '<span class="note-span"><a class="guess-right" href="cell.php?x=' . $x . '&y=' . $y . '">';
                        $html .= $notes[$i];
                        $html .= '</a></span>';
                        if (($i+1)%3 == 0) {
                            $html .= '</div>';
                        }
                    }
                    /*foreach ($this->sudoku->getNotesForCell($x,$y) as $note){
                        $html .= $note;
                    }*/
                    //$html .= '</a></div>';
                    //$html .= '<br><a class="" href="cell.php?x=' . $x . '&y=' . $y . '">Guess</a></div>';
                } else {
                    $html .= <<<HTML
                    <td><a class="cell blank-cell" href="cell.php?x=$x&y=$y">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
HTML;
                }


            }

        }




        $html .= <<<HTML
</table>
HTML;


        return $html;
    }

    public function showAnswer() {
        $html = <<<HTML
<table>
  <colgroup><col><col><col>
  <colgroup><col><col><col>
  <colgroup><col><col><col>
  <tbody>
HTML;
        for ($i = 0; $i < 9; $i++) {
            if ($i % 3 == 0) {
                $html .= '<tbody>';
            }
            $html .= <<<HTML
   <tr>
   <td><div class="cell">{$this->sudoku->getAnswerForCell($i,0)}</div>
   <td><div class="cell">{$this->sudoku->getAnswerForCell($i,1)}</div>
   <td><div class="cell">{$this->sudoku->getAnswerForCell($i,2)}</div>
   <td><div class="cell">{$this->sudoku->getAnswerForCell($i,3)}</div>
   <td><div class="cell">{$this->sudoku->getAnswerForCell($i,4)}</div>
   <td><div class="cell">{$this->sudoku->getAnswerForCell($i,5)}</div>
   <td><div class="cell">{$this->sudoku->getAnswerForCell($i,6)}</div>
   <td><div class="cell">{$this->sudoku->getAnswerForCell($i,7)}</div>
   <td><div class="cell">{$this->sudoku->getAnswerForCell($i,8)}</div>

HTML;
        }


        $html .= <<<HTML
</table>
HTML;


        return $html;
    }


    public function numberOfNotes(){
        return $this->sudoku->getNumNotes();
    }
    public function playerName(){
        return  '';
    }


}