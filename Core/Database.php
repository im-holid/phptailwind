<?php

namespace Core;

use Core\Response;

use PDO;

class Database
{

    public $connection;
    private $statement;

    public function __construct($config, $username = 'root', $password = 'root')
    {

        // config

        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function fetchAllPosts()
    {
        $query = "select * from posts";
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute();
        return $this;
    }

    public function fetchPostById($id)
    {
        $query = "select * from posts where id = :id";
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute([":id" => $id]);
        return $this;
    }

    public function fetchAllPostByUserId($userId)
    {
        $query = "select * from posts where user_id = ?";
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute([$userId]);
        return $this;
    }

    public function createPost($userId, $body, $title)
    {
        $query = "insert into posts (title, body, user_id) values (:title, :body, :user_id)";
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute([":user_id" => $userId, ":title" => $title, ":body" => $body]);
        return;
    }

    public function updatePost($id, $body, $title)
    {
        $query = "UPDATE `php101`.`posts` SET `title` = :title , `body` = :body WHERE `id` = :id;";
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute([":id" => $id, ":title" => $title, ":body" => $body]);
        return;
    }

    public function fetchUser($id)
    {
        $query = "select * from users where id = ?";
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute([$id]);
        return $this;
    }

    public function fetchAllUser()
    {
        $query = "select * from users";
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute();
        return $this;
    }

    public function fetch()
    {
        return $this->statement->fetch();
    }

    public function fetchAll()
    {
        return $this->statement->fetchALl();
    }

    public function fetchOrFail()
    {
        $result = $this->fetch();

        check(!$result, Response::NOT_FOUND);

        return $result;
    }

    public function fetchAllOrFail()
    {
        $result = $this->fetchAll();

        check(!$result, Response::NOT_FOUND);

        return $result;
    }

    public function deletePost($id)
    {
        $query = "DELETE FROM `posts` WHERE `id` = :id";
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute([":id" => $id,]);
        return;
    }
}
