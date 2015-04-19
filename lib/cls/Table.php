<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 3/5/15
 * Time: 3:30 PM
 */


/**
 * Class Table base class for all the table classes
 */
class Table {
    /**
     * Constructor
     * @param Site $site The site object
     * @param $name The base table name
     */
    public function __construct(Sudoku $sudoku, $name) {
        $this->site = $sudoku;
        $this->tableName = $sudoku->getTablePrefix() . $name;
    }



    /**
     * Get the database table name
     * @return The table name
     */
    public function getTableName() {
        return $this->tableName;
    }

    /**
    /**
     * Database connection function
     * @returns PDO object that connects to the database
     */
    public function pdo() {
        return $this->site->pdo();
    }



    protected $site;        ///< The Site object
    protected $tableName;   ///< The table name to use







}