<?php
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class SudokuControllerTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
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
		$controller = new SudokuController($sudoku,$sudo,$user,array());
        $this->assertInstanceOf('SudokuController',$controller);
		$this->assertFalse($controller->isReset());
		$this->assertEquals('game.php', $controller->getPage());

	}

	public function test_insert_into_cell()
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
		$controller = new SudokuController($sudoku,$sudo,$user,array());

		$controller->insert_into_cell(0,0,2);
		$this->assertEquals(2,$sudoku->getUserGuessForCell(0,0) );

		$controller->insert_into_cell(0,0,3);
		$this->assertEquals(3,$sudoku->getUserGuessForCell(0,0) );
	}

	public function test_NotesForCell()
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
		$controller = new SudokuController($sudoku,$sudo,$user,array());
		$controller->hint(7,0,0);
		$num = $sudoku->getNotesForCell(0,0);
		$this->assertEquals(7,$num[0]);


	}

}

/// @endcond
?>
