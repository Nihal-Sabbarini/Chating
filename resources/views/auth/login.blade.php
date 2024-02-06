@extends('layout')

@section('content')
    <div style="text-align: center; margin-top: 50px;">
        <h2>Login</h2>
    <div class="shadow sm-overflow-hidden sm:rounded-md">
        @if(Session::has('error'))
                <div class="text-red-500 mt-2 mx-4">{{Session::get('error')}}</div>
                @endif


        <form action="{{ route('login.post') }}" method="post" style="width: 300px; margin: 0 auto; text-align: left;">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block;">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required style="width: 100%;">
                @if($errors->has('email'))
                <div class="text-red-700 text-sm mt-1">{{$errors->first('email')}}</div>
                @endif
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block;">Password:</label>
                <input type="password" id="password" name="password" required style="width: 100%;">
                @if($errors->has('passsword'))
                <div class="text-red-700 text-sm mt-1">{{$errors->first('password')}}</div>
                @endif
            </div>

            <button type="submit" style="width: 100%;">Login</button>
        </form>
    </div>
    </div>
@endsection
