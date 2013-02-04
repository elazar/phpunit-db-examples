<?php

namespace My\Dao;

class Foo
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getList()
    {
        return $this->db->query('SELECT * FROM foo')->fetchAll();
    }
    
    public function get($id)
    {
        $query = $this->db->prepare('SELECT * FROM foo WHERE id = ?');
        return $query->execute(array($id));
    }

    public function insert(array $data)
    {
        // some validation logic for $data
        $query = $this->db->prepare('INSERT INTO foo (bar, baz) VALUES (?, ?)');
        return $query->execute(array($data['bar'], $data['baz']));
    }

    public function update($id, array $data)
    {
        // some validation logic for $data
        $query = $this->db->prepare('UPDATE foo SET bar = ?, baz = ? WHERE id = ?');
        return $this->execute(array($data['bar'], $data['baz']), $id);
    }

    public function delete($id)
    {
        $query = $this->db->prepare('DELETE FROM foo WHERE id = ?');
        return $this->execute(array($id));
    }
}
