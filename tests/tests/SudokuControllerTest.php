<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class SudokuControllerTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$sudoku = new SudokuModel(11);
		$controller = new SudokuController($sudoku,array());
        $this->assertInstanceOf('SudokuController',$controller);
		$this->assertFalse($controller->isReset());
		$this->assertEquals('game.php', $controller->getPage());

	}

	public function test_insert_into_cell()
	{
		$sudoku = new SudokuModel(11);
		$controller = new SudokuController($sudoku,array());

		$controller->insert_into_cell(0,0,2);
		$this->assertEquals(2,$sudoku->getUserGuessForCell(0,0) );

		$controller->insert_into_cell(0,0,3);
		$this->assertEquals(3,$sudoku->getUserGuessForCell(0,0) );
	}

	public function test_NotesForCell()
	{
		$sudoku = new SudokuModel(11);
		$controller = new SudokuController($sudoku,array());
		$controller->hint(7,0,0);
		$num = $sudoku->getNotesForCell(0,0);
		$this->assertEquals(7,$num[0]);


	}

}

/// @endcond
?>
