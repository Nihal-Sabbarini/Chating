@extends('layout')

@section('content')
    <div style="text-align: center; margin-top: 50px;">
        <h2>User Registration</h2>

        <form action="{{ route('register.post') }}" method="post" style="width: 300px; margin: 0 auto; text-align: left;">
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block;">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required style="width: 100%;">
             @if($errors->has('name'))
            <div class="text-red-700 text-sm mt-1">{{$errors->first('name')}}</div>
            @endif
            </div>


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

            <button type="submit" style="width: 100%;">Register</button>
        </form>
    </div>
@endsection
