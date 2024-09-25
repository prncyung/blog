<?php

class Customer
{
    private $id;
    private $username;
    public $name;

    public function __construct(int $id, string $username, string $name)
    {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
    }
}
