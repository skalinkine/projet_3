<?php
class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=coursphp;charset=utf8', 'root', '');
        return $db;
    }
}