<?php
/** @file
 * @cond 
 * @brief Unit tests for the class SudokuGame
 */
class SudokuGameTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$sudokuGame = new SudokuGame();

		$this->assertInstanceOf("SudokuGame", $sudokuGame);
		$this->assertEquals(10, count($sudokuGame->getGames()));
		$this->assertEquals(10, count($sudokuGame->getAnswers()));
		$this->assertEquals(9, count($sudokuGame->getCheatGame()));
		$this->assertEquals(9, count($sudokuGame->getCheatAnswer()));
	}
}

/// @endcond
?>
