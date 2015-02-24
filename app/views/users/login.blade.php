@extends('layout')
@section('content')
    <section class="header">
        <div class="container">
            <div class="header-text">
                <br><br>
                <h2 style="text-align:center;">Welcome to the Fledgling List!</h2>
            </div>
        </div>
    </section>
    <section class="body">
        <div class="container">
                <br>
                @if(Session::get('msg'))
                    <p style="text-align:center; font-size: 18px" class="bg-danger">{{ Session::get('msg') }}</p>
                @endif
                {{ Form::open(array('url' => 'form_submit', 'method' => 'post')) }}
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', null, array('class' => 'form-control')) }}
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-control')) }}
                <div class="crc_btn_wrap">
                    {{ Form::submit('Login', array('name' => 'submit_type', 'class' => 'crc_btn_clicker faster')) }}
                    <div class="crc_btn_circle crc_btn_angled second"></div>
                </div>
                <div class="crc_btn_wrap">
                    {{Form::submit('Register', array('name' => 'submit_type', 'class' => 'crc_btn_clicker faster')) }}
                    <div class="crc_btn_circle crc_btn_angled third"></div>
                </div>
                {{ Form::close() }}
                </div>
        </div>
    </section>
@stop