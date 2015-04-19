<?php
/** @file
 * @cond 
 * @brief Unit tests for the class SudokuModel
 */
class SudokuModelTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$sudoku = new SudokuModel(1);
		$this->assertInstanceOf("SudokuModel", $sudoku);

		// Ensure we have 81 cells
		for($row = 0; $row < 9; $row++) {
			for($column = 0; $column < 9; $column++) {
				$this->assertInstanceOf("SudokuCell",$sudoku->getCell($row, $column));
			}
		}
	}

	public function test_getAnswerForCell() {
		$sudoku = new SudokuModel(0);
		$this->assertEquals(8, $sudoku->getAnswerForCell(0,0));
	}

	public function test_getDefaultValue() {
		$sudoku = new SudokuModel(0);
		$this->assertEquals(0, $sudoku->getDefaultValue(0,0));
	}

	public function test_getCell() {
		$sudoku = new SudokuModel(0);
		$this->assertInstanceOf("SudokuCell", $sudoku->getCell(0,0));
	}

	public function test_setUserGuessForCell() {
		$sudoku = new SudokuModel(0);

		$this->assertFalse($sudoku->setUserGuessForCell(3, 0, 0));
		$this->assertEquals(3, $sudoku->getUserGuessForCell(0,0));
	}

	public function test_checkForWin() {
		$sudoku = new SudokuModel(11);

		$this->assertFalse($sudoku->setUserGuessForCell(2, 0, 0));
		$this->assertFalse($sudoku->setUserGuessForCell(6, 0, 1));
		$this->assertFalse($sudoku->setUserGuessForCell(3, 0, 2));
		$this->assertFalse($sudoku->setUserGuessForCell(7, 0, 3));
		$this->assertFalse($sudoku->setUserGuessForCell(8, 0, 5));
		$this->assertFalse($sudoku->setUserGuessForCell(4, 0, 6));

		$this->assertFalse($sudoku->setUserGuessForCell(8, 1, 0));
		$this->assertFalse($sudoku->setUserGuessForCell(1, 1, 1));
		$this->assertFalse($sudoku->setUserGuessForCell(7, 1, 2));
		$this->assertFalse($sudoku->setUserGuessForCell(4, 1, 3));
		$this->assertFalse($sudoku->setUserGuessForCell(9, 1, 5));

		$this->assertFalse($sudoku->setUserGuessForCell(5, 2, 0));
		$this->assertFalse($sudoku->setUserGuessForCell(4, 2, 1));
		$this->assertFalse($sudoku->setUserGuessForCell(6, 2, 4));
		$this->assertFalse($sudoku->setUserGuessForCell(3, 2, 5));
		$this->assertFalse($sudoku->setUserGuessForCell(8, 2, 7));
		$this->assertFalse($sudoku->setUserGuessForCell(2, 2, 8));

		$this->assertFalse($sudoku->setUserGuessForCell(7, 3, 0));
		$this->assertFalse($sudoku->setUserGuessForCell(3, 3, 1));
		$this->assertFalse($sudoku->setUserGuessForCell(5, 3, 3));
		$this->assertFalse($sudoku->setUserGuessForCell(2, 3, 5));
		$this->assertFalse($sudoku->setUserGuessForCell(6, 3, 7));

		$this->assertFalse($sudoku->setUserGuessForCell(9, 4, 1));
		$this->assertFalse($sudoku->setUserGuessForCell(4, 4, 2));
		$this->assertFalse($sudoku->setUserGuessForCell(8, 4, 3));
		$this->assertFalse($sudoku->setUserGuessForCell(3, 4, 4));
		$this->assertFalse($sudoku->setUserGuessForCell(1, 4, 5));
		$this->assertFalse($sudoku->setUserGuessForCell(2, 4, 6));
		$this->assertFalse($sudoku->setUserGuessForCell(5, 4, 7));

		$this->assertFalse($sudoku->setUserGuessForCell(2, 5, 1));
		$this->assertFalse($sudoku->setUserGuessForCell(6, 5, 3));
		$this->assertFalse($sudoku->setUserGuessForCell(7, 5, 5));
		$this->assertFalse($sudoku->setUserGuessForCell(4, 5, 7));
		$this->assertFalse($sudoku->setUserGuessForCell(3, 5, 8));

		$this->assertFalse($sudoku->setUserGuessForCell(9, 6, 0));
		$this->assertFalse($sudoku->setUserGuessForCell(8, 6, 1));
		$this->assertFalse($sudoku->setUserGuessForCell(3, 6, 3));
		$this->assertFalse($sudoku->setUserGuessForCell(7, 6, 4));
		$this->assertFalse($sudoku->setUserGuessForCell(2, 6, 7));
		$this->assertFalse($sudoku->setUserGuessForCell(4, 6, 8));

		$this->assertFalse($sudoku->setUserGuessForCell(9, 7, 3));
		$this->assertFalse($sudoku->setUserGuessForCell(6, 7, 5));
		$this->assertFalse($sudoku->setUserGuessForCell(3, 7, 6));
		$this->assertFalse($sudoku->setUserGuessForCell(7, 7, 7));
		$this->assertFalse($sudoku->setUserGuessForCell(8, 7, 8));

		$this->assertFalse($sudoku->setUserGuessForCell(1, 8, 2));
		$this->assertFalse($sudoku->setUserGuessForCell(2, 8, 3));
		$this->assertFalse($sudoku->setUserGuessForCell(4, 8, 5));
		$this->assertFalse($sudoku->setUserGuessForCell(5, 8, 6));
		$this->assertFalse($sudoku->setUserGuessForCell(9, 8, 7));

		$this->assertTrue($sudoku->setUserGuessForCell(6, 8, 8));
	}

	public function test_isUserGuessCorrect() {
		$sudoku = new SudokuModel(0);
		$sudoku->setUserGuessForCell(3,0,0);

		$this->assertFalse($sudoku->isUserGuessCorrect(0,0));
	}

	public function test_addNoteForCell() {
		$sudoku = new SudokuModel(0);
		$this->assertEquals(0, count($sudoku->getNotesForCell(0,0)));

		$sudoku->addNoteForCell(7,0,0);
		$notes = $sudoku->getNotesForCell(0,0);

		$this->assertEquals(7, $notes[0]);
		$this->assertEquals(1, count($sudoku->getNotesForCell(0,0)));

		$sudoku->addNoteForCell(8,0,0);
		$notes = $sudoku->getNotesForCell(0,0);

		$this->assertEquals(8, $notes[1]);
		$this->assertEquals(2, count($sudoku->getNotesForCell(0,0)));

	}

	public function test_getNumNotes() {
		$sudoku = new SudokuModel(0);
		$this->assertEquals(0, $sudoku->getNumNotes());

		$sudoku->addNoteForCell(3, 0, 0);
		$this->assertEquals(1, $sudoku->getNumNotes());
	}
}

/// @endcond
?>
