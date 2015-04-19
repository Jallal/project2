<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class SudokuViewTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct(){

		$sudoku = new SudokuModel(11);
		$view = new SudokuView($sudoku);
		$this->assertInstanceOf('SudokuView',$view);
	}

	public function test_updateStatus()
	{
		$sudoku = new SudokuModel(11);


		$sudoku->setUserGuessForCell(2,0,0);
		$this->assertEquals(2,$sudoku->getUserGuessForCell(0,0));

		$sudoku->setUserGuessForCell(5,0,0);
		$this->assertNotEquals(2,$sudoku->getUserGuessForCell(0,0));
	}

	public function test_numberOfNotes()
	{
		$sudoku = new SudokuModel(11);
		$sudoku->addNoteForCell(9,0,0);
		$status = $sudoku->getNotesForCell(0,0);
		$this->assertContains('9',$status);
		$sudoku->addNoteForCell(5,1,1);
		$sudoku->addNoteForCell(1,1,1);
		$status = $sudoku->getNotesForCell(1,1);
		$this->assertContains('5 1',$status);

	}


	public function test_playerName(){
		$sudoku = new SudokuModel(11);
		$sudoku->Setusername("David");
		$name = $sudoku->getusername();
		$this->assertContains("David",$name);

	}
}

/// @endcond
?>
