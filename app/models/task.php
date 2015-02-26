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

    public function UpdateTask(array $data)
    {
        DB::table('tasks')
            ->where('id', $data['id'])
            ->update(array('title' => $data['task'],
                'due_date' => date('Y-m-d', strtotime($data['task_due']))));
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

    public static function GetAllUnfinished()
    {
        self::CheckOverdue();
        $tasks = DB::table('tasks')->where('status', 1)->orWhere('status', 2)->orderBy('status', 'desc')->get();
        return $tasks;
    }

    public static function DeleteTask($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
    }

    public static function CompleteTask($id)
    {
        DB::table('tasks')
            ->where('id', $id)
            ->update(['status' => 0]);
    }

    public static function CheckOverdue()
    {
        $tasks = DB::table('tasks')->where('status', 1)->orWhere('status', 2)->orderBy('status', 'desc')->get();
        //$today = new DateTime(date("Y-m-d"));
        foreach($tasks as $task) {
            if (strtotime($task->due_date) < time()) {
                DB::table('tasks')
                    ->where('id', $task->id)
                    ->update(array('status' => 2));
            } else {
                DB::table('tasks')
                    ->where('id', $task->id)
                    ->update(array('status' => 1));
            }
        }
    }
}

