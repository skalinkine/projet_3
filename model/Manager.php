<?php
class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=blog_forteroche;charset=utf8', 'root', '');
        return $db;
    }
}