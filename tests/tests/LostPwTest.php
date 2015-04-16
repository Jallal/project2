<?php
/** @file
 * @cond
 * @brief Unit tests for the class NewUsers
 */

class EmailMockLostPw extends Email {
    public $to;
    public $subject;
    public $message;
    public $headers;

    public function mail($to, $subject, $message, $headers)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->headers = $headers;
    }
}

class LostPwTest extends \PHPUnit_Extensions_Database_TestCase
{
    private static $site;

    public static function setUpBeforeClass() {
        self::$site = new Sudoku();
        $localize  = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize(self::$site);
        }
    }

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        return $this->createDefaultDBConnection(self::$site->pdo(), 'madejekz');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/lostpw.xml');
    }

    public function test_construct() {
        $newUsers = new LostPw(self::$site);
        $this->assertInstanceOf('LostPw', $newUsers);
    }

    public function test_newPw() {
        $lp = new LostPw(self::$site);

        $mailer = new EmailMockLostPw();
        $this->assertContains("User ID does not exist",
            $lp->newPw("", "", "", $mailer));

        $this->assertContains("must be at least 8 characters long",
            $lp->newPw("dudette", "", "", $mailer));

        $this->assertContains("Passwords are not equal",
            $lp->newPw("dudette", "abcdefgh", "abcdefgg", $mailer));

        $lp->newPw("dudette", "87654321", "87654321", $mailer);
        $table = $lp->getTableName();
        $sql = <<<SQL
SELECT * from $table where userid=7
SQL;

        $stmt = $lp->pdo()->prepare($sql);
        $stmt->execute(array());
        $this->assertEquals(1, $stmt->rowCount());

        $this->assertEquals("dudess@dude.com", $mailer->to);
        $this->assertEquals("Confirm password reset", $mailer->subject);
    }


    public function test_removeNewUser() {
        $lp = new LostPw(self::$site);

        // This should get the user
        $newpw = $lp->removeLostPwUser("abcdefghijklmnopqrstuvwxyzaaaaaa");
        $this->assertEquals(7, $newpw['userid']);

        // Second time it should be removed
        $newpw = $lp->removeLostPwUser("abcdefghijklmnopqrstuvwxyzaaaaaa");
        $this->assertNull($newpw);
    }
}

/// @endcond
?>
