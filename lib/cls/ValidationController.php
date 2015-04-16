<?php


class ValidationController {
    private $site;

    /**
     * Constructor
     * @param Sudoku $site The site object
     */
    public function __construct(Sudoku $site) {
        $this->site = $site;
    }

    /**
     * Validate a user
     * @param $validator string validator string
     * @return null or an error message
     */
    public function validate($validator) {
        $users = new Users($this->site);
        $nu = new NewUsers($this->site);

        $user = $nu->removeNewUser($validator);
        if($user === null) {
            return "Invalid validator";
        }

        $users->add($user);
        return null;
    }

    /**
     * Validate a user
     * @param $validator string validator string
     * @return null or an error message
     */
    public function validateNewPw($validator) {
        $users = new Users($this->site);
        $lp = new LostPw($this->site);

        $newpw = $lp->removeLostPwUser($validator);
        if($newpw === null) {
            return "Invalid validator";
        }

        $users->updatePw($newpw);
        return null;
    }
}