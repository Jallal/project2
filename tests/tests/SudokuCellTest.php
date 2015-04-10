<?php
/** @file
 * @cond 
 * @brief Unit tests for the class SudokuCell
 */
class SudokuCellTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$cell = new SudokuCell(7, 0, 0, 0);
		$this->assertInstanceOf("SudokuCell", $cell);
	}

	public function test_getAnswer() {
		$cell = new SudokuCell(5, 0, 0, 0);
		$this->assertEquals(5, $cell->getAnswer());
	}

	public function test_getDefaultValue() {
		$cell = new SudokuCell(1, 0, 0, 7);
		$this->assertEquals(7, $cell->getDefaultValue());
	}

	public function test_getRow() {
		$cell = new SudokuCell(7, 3, 8, 0);
		$this->assertEquals(3, $cell->getRow());
	}

	public function test_getColumn() {
		$cell = new SudokuCell(4, 3, 8, 0);
		$this->assertEquals(8, $cell->getColumn());
	}

	public function test_addNote() {
		$cell = new SudokuCell(1, 2, 3, 0);

		$cell->addNote(2);
		$cell->addNote(1);
		$cell->addNote(3);

		$cellNotes = $cell->getNotes();

		$this->assertEquals(2, $cellNotes[0]);
		$this->assertEquals(1, $cellNotes[1]);
		$this->assertEquals(3, $cellNotes[2]);
	}

	public function test_setUserGuess() {
		$cell = new SudokuCell(1, 2, 3, 0);

		$cell->setUserGuess(4);

		$this->assertEquals(4, $cell->getUserGuess());
	}

	public function test_isUserGuessCorrect() {
		$cell = new SudokuCell(1, 2, 3, 0);
		$cell->setUserGuess(3);

		$this->assertFalse($cell->isUserGuessCorrect());
	}
}

/// @endcond
?>
