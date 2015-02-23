<?php

class Task
{
    public function AddTask()
    {
        $params = [
            'user_id' => 1,
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => date('Y-m-d')
        ];

        DB::insert('INSERT INTO tasks (user_id, title, description, due_date) VALUES (? , ?, ?, ?)',
            array($params['user_id'], $params['title'], $params['description'], $params['due_date']));
    }

    public static function Get($id)
    {
        return DB::select('SELECT * FROM tasks WHERE id = ?', [$id]);
    }

    public static function GetAll()
    {
        return DB::select('SELECT * FROM tasks ORDER BY status DESC');
    }
}

