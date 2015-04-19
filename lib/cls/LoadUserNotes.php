

<?php
class LoadUserNotes  extends Table
{private $notes = array();  // Empty initial array


    public function __construct(Sudoku $sudoku)
    {
        parent::__construct($sudoku, "notes");

    }




    function LoadNotes($userid)
    {
        $sql = <<<SQL
SELECT * FROM $this->tableName
WHERE userid =?

SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid));


        foreach ($statement as $row) {
            $ro = (int)($row['ro']);
            $col = (int)($row['col']);
            $this->notes[$ro][$col][]= (int)($row['note']);
        }
        return $this->notes;

    }
    function  GameExist($userid)
    {
        $sql = <<<SQL
SELECT * FROM $this->tableName

WHERE userid=?

SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid));
        if ($statement->rowCount() === 0) {
            return false;
        } else {
            return true;
        }
    }
}

