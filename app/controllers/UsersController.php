<?php

class UsersController extends BaseController
{
    private $error_message = '';

    public function login()
    {
        if (Auth::check()) {
            return Redirect::to('/index');
        }
        return View::make('users.login');
    }

    public function logout()
    {
        if(Auth::check()) {
            Auth::logout();
        }

        return Redirect::to('/');
    }

    public function form_handler()
    {
        $data = Input::all();
        $page = '';

        switch ($data['submit_type'])
        {
            case 'Login':
                $page = $this->authenticate_user($data);
                break;
            case 'Register':
                $page = $this->register_user($data);
                break;
            default:
                break;
        }

        return Redirect::to($page)->with('msg', $this->error_message);
    }

    public function authenticate_user($data)
    {
        $user = new User;
        $user->email = $data['email'];
        $user->password = $data['password'];

        try {
            $user->Authenticate();
        } catch (Exception $e) {
            $this->error_message = "Invalid email or password" ;
            return '/';
        }
       return '/index';
    }

    public function register_user($data)
    {
        $user = new User;
        $user->email = $data['email'];
        $user->password = $data['password'];
        try {
            $user->Register();
        } catch (Exception $e) {
            $this->error_message = "Email Address is already registered";
            return '/';
        }
        $user->Authenticate();
        return '/index';
    }
}