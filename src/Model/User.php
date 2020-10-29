<?php

namespace Src\Model;

class User
{

    private $db = null;

    public function __construct( $db )
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT
                id, firstname, lastname, mobilephone, email, admin
            FROM
                user;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function find($id)
    {
        $statement = "
            SELECT
                id, firstname, lastname, mobilephone, email, admin
            FROM
                user
            WHERE id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function insert(Array $input)
    {
        $statement = "
            INSERT INTO user
                (firstname, lastname, mobilephone, email, admin)
            VALUES
                (:firstname, :lastname, :mobilephone, :email, :admin);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'firstname' => $input['firstname'],
                'lastname'  => $input['lastname'],
                'mobilephone' => $input['mobilephone'] ?? null,
                'email' => $input['email'],
                'admin' => $input['admin'] ?? false
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE user
            SET
                firstname = :firstname,
                lastname  = :lastname,
                mobilephone = :mobilephone,
                email = :email,
                admin = :admin
            WHERE id = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'id' => (int) $id,
                'firstname' => $input['firstname'],
                'lastname'  => $input['lastname'],
                'mobilephone' => $input['mobilephone'] ?? null,
                'email' => $input['email'],
                'admin' => $input['admin'] ?? false
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM user
            WHERE id = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array('id' => $id));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }


}