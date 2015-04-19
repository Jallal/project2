<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class SudokuViewTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct(){

		$row = array('id' => 12,
			'userid' => 'dude',
			'name' => 'The Dude',
			'email' => 'dude@ranch.com',
			'password' => '12345678',
			'joined' => '2015-01-15 23:50:26',
			'role' => '1');
		$user = new User($row);
		$sudo= new Sudoku();
		$sudoku = new SudokuModel(11,$sudo,$user);
		$view = new SudokuView($sudoku);
		$this->assertInstanceOf('SudokuView',$view);
	}

	public function test_updateStatus()
	{
		$row = array('id' => 12,
			'userid' => 'dude',
			'name' => 'The Dude',
			'email' => 'dude@ranch.com',
			'password' => '12345678',
			'joined' => '2015-01-15 23:50:26',
			'role' => '1');
		$user = new User($row);
		$sudo= new Sudoku();
		$sudoku = new SudokuModel(11,$sudo,$user);


		$sudoku->setUserGuessForCell(2,0,0);
		$this->assertEquals(2,$sudoku->getUserGuessForCell(0,0));

		$sudoku->setUserGuessForCell(5,0,0);
		$this->assertNotEquals(2,$sudoku->getUserGuessForCell(0,0));
	}

	public function test_numberOfNotes()
	{
		$row = array('id' => 12,
			'userid' => 'dude',
			'name' => 'The Dude',
			'email' => 'dude@ranch.com',
			'password' => '12345678',
			'joined' => '2015-01-15 23:50:26',
			'role' => '1');
		$user = new User($row);
		$sudo= new Sudoku();
		$sudoku = new SudokuModel(11,$sudo,$user);
		$sudoku->addNoteForCell(9,0,0);
		$status = $sudoku->getNotesForCell(0,0);
		$this->assertContains('9',$status);
		$sudoku->addNoteForCell(5,1,1);
		$sudoku->addNoteForCell(1,1,1);
		$status = $sudoku->getNotesForCell(1,1);
		$this->assertContains('5 1',$status);

	}

	
}

/// @endcond
?>
