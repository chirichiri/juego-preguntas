<?php

class User {
	private $id;
	private $user;
	private $mail;
	private $pass;
	private $puntaje;

	public function __construct($user, $mail, $pass, $puntaje = 0) {
		$this->setUser($user);
		$this->setMail($mail);
		$this->setPass($pass);
		$this->setPuntaje($puntaje);

		return $this;
	}


/**
* Get value of Id
* @return mixed
*/
public function getId() {
      return $this->id;
}

/**
* Set value of Id
* @param mixed id
* @return self
*/
public function setId($id) {
    $this->id = $id;

    return $this;
}

/**
* Get value of User
* @return mixed
*/
public function getUser() {
      return $this->user;
}

/**
* Set value of User
* @param mixed user
* @return self
*/
public function setUser($user) {
    $this->user = $user;

    return $this;
}

/**
* Get value of Mail
* @return mixed
*/
public function getMail() {
      return $this->mail;
}

/**
* Set value of Mail
* @param mixed mail
* @return self
*/
public function setMail($mail) {
    $this->mail = $mail;

    return $this;
}

/**
* Get value of Pass
* @return mixed
*/
public function getPass() {
      return $this->pass;
}

/**
* Set value of Pass
* @param mixed pass
* @return self
*/
public function setPass($pass) {
    $this->pass = $pass;

    return $this;
}

/**
* Get value of Puntaje
* @return mixed
*/
public function getPuntaje() {
      return $this->puntaje;
}

/**
* Set value of Puntaje
* @param mixed puntaje
* @return self
*/
public function setPuntaje($puntaje) {
    $this->puntaje = $puntaje;

    return $this;
}

public static function getAvatar() {
    $existe = GLOB("../..user/" . $_SESSION["user"] . "/avatar.{jpg,png,gif,jgeg,svg,bmp}", GLOB_BRACE);
    if ($existe != NULL) {
        return $existe[0];
    } else {
        return "user/default/avatar.png";
    }
}
}


 ?>
