<?php
namespace EportalUser\Model;

use ZfcUser\Entity\User;

/**
 * Description of EportalUser
 *
 * @author imaleo
 */
class EportalUser extends User implements EportalUserInterface{
    protected $firstName;
    protected $middleName;
    protected $lastName;
    protected $gender;
    protected $dob;
    
    public function getFirstName() {
        return $this->firstName;
    }

    public function getMiddleName() {
        return $this->middleName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getDob() {
        return $this->dob;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    public function setMiddleName($middleName) {
        $this->middleName = $middleName;
        return $this;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }

    public function setDob($dob) {
        $this->dob = $dob;
        return $this;
    }
}
