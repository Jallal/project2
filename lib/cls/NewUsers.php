<?php

class NewUsers extends Table {
    /**
     * Constructor
     * @param $site Sudoku object
     */
    public function __construct(Sudoku $site) {
        parent::__construct($site, "newuser");
    }

    /**
     * Create a new user.
     * @param $userid string user ID
     * @param $name string user name
     * @param $email string user email address
     * @param $password1 string new password
     * @param $password2 string new password second copy
     * @param Email $mailer An Email object we will use to send email
     * @returns string Error message or null if no error
     */
    public function newUser($userid, $name, $email, $password1, $password2, Email $mailer) {
        // Ensure the passwords are valid and equal
        if(strlen($password1) < 8) {
            return "Passwords must be at least 8 characters long";
        }

        if($password1 !== $password2) {
            return "Passwords are not equal";
        }

        // Ensure we have no duplicate user ID or email address
        $users = new Users($this->site);
        if($users->exists($userid)) {
            return "User ID already exists. Please choose another one.";
        }

        // Ensure the user didnt create user name of 'guest'
        if($userid === "guest") {
            return "Don't use that username.";
        }

        if($users->exists($email)) {
            return "Email address already exists.";
        }

        // Create a validator key
        $validator = $this->createValidator();

        // Create salt and encrypted password
        $salt = self::random_salt();
        $hash = hash("sha256", $password1 . $salt);

        // Add a record to the newuser table
        $sql = <<<SQL
REPLACE INTO $this->tableName(userid, name, email, password, salt, joined, validator)
values(?, ?, ?, ?, ?, ?, ?)
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userid, $name, $email, $hash, $salt, date("Y-m-d H:i:s"), $validator));

        // Send email with the validator in it
        $link = "http://webdev.cse.msu.edu"  . $this->site->getRoot() . '/newuser-validate.php?v=' . $validator;

        $from = $this->site->getEmail();

        $subject = "Confirm your email";
        $message = <<<MSG
<html>
<p>Greetings, $name,</p>

<p>Welcome to Super Sudoku. In order to complete your registration,
please verify your email address by visiting the following link:</p>

<p><a href="$link">$link</a></p>
</html>
MSG;
        $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso=8859-1\r\nFrom: $from\r\n";
        $mailer->mail($email, $subject, $message, $headers);

    }

    /**
     * @brief Generate a random validator string of characters
     * @param $len int Length to generate, default is 32
     * @returns string Validator string
     */
    private function createValidator($len = 32) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $l = strlen($chars) - 1;
        $str = '';
        for ($i = 0; $i < $len; ++$i) {
            $str .= $chars[rand(0, $l)];
        }
        return $str;
    }

    /**
     * @brief Generate a random salt string of characters for password salting
     * @param $len int Length to generate, default is 16
     * @returns string Salt string
     */
    public static function random_salt($len = 16) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789`~!@#$%^&*()-=_+';
        $l = strlen($chars) - 1;
        $str = '';
        for ($i = 0; $i < $len; ++$i) {
            $str .= $chars[rand(0, $l)];
        }
        return $str;
    }

    /**
     * Get a new user record, removing it when we are done.
     * @param $validator string validator string
     * @returns Array with key for each column or null if the validator does not exist.
     */
    public function removeNewUser($validator) {
        $sql =<<<SQL
SELECT * from $this->tableName
where validator=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($validator));

        if($statement->rowCount() === 0) {
            return null;
        }

        $result = array();
        foreach($statement as $row) {
            $result['userid'] = $row['userid'];
            $result['name'] = $row['name'];
            $result['email'] = $row['email'];
            $result['password'] = $row['password'];
            $result['joined'] = $row['joined'];
            $result['salt'] = $row['salt'];
        }

        $sql = <<<SQL
DELETE FROM $this->tableName
where validator=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($validator));

        return $result;
    }
}