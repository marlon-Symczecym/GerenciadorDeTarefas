<?php

namespace models;

class Usuario
{
    private int $id;
    private string $name;
    private string $password;

    public function getId() {
        return $this->id;
    }

    public function setId($newId) {
        $this->id = $newId;
    }

    public function getName() {
        return trim($this->name, ' ');
    }

    public function setName($newName) {
        $this->name = $newName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($newPassword) {
        $this->password = trim($newPassword);
    }
}