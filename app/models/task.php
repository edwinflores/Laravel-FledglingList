<?php

class Task
{
    public function AddTask()
    {
        $params = [
            'user_id' => Auth::id(),
            'title' => $this->title,
            'status' => 1,
            'due_date' => date('Y-m-d', strtotime($this->due_date))
        ];

        $this->id = DB::table('tasks')->insertGetId($params);
//        $this->id = DB::insert_get_id('INSERT INTO tasks (user_id, title, status, due_date) VALUES (? , ?, ?, ?)',
//            array($params['user_id'], $params['title'], $params['status'],$params['due_date']));

        $this->status = $params['status'];

    }

    public static function Get($id)
    {
        return DB::table('tasks')->where('id', '=', $id)->first();
//        return DB::select('SELECT * FROM tasks WHERE id = ?', [$id])[0];
    }

    public static function GetAll()
    {
        self::CheckOverdue();
        return DB::select('SELECT * FROM tasks WHERE user_id = ? ORDER BY status DESC, created_at DESC', [Auth::user()->id]);
    }

    public static function DeleteTask($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
    }

    public static function CheckOverdue()
    {
        $tasks = DB::table('tasks')->get();
        $today = date("Y-m-d");
        foreach($tasks as $task) {
            if ($task->due_date < $today) {
                DB::table('tasks')
                    ->where('id', $task->id)
                    ->update(array('status' => 2));
            }
        }
    }
}

