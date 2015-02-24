<?php

class User
{
    public $email;
    public $password;

    public function Authenticate()
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $row = DB::select('SELECT * FROM users WHERE BINARY email = ?', [$this->email]);
            return $row[0];
        } else {
            throw new Exception('Invalid login credentials');
        }
    }

    public function Register()
    {
        if ($this->getByEmailAddress()) {
            throw new Exception('Email already registered');
        }
        $pass = Hash::make($this->password);

        DB::insert("INSERT INTO users (email, password)  VALUES (? , ?)", [$this->email, $pass]);
    }

    public function GetByEmailAddress()
    {
        return DB::select('SELECT * FROM users WHERE BINARY email = ?', [$this->email]);
    }
}