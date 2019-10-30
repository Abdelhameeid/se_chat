@extends('site.layouts')
@section('content')  
    <form class="box" method="POST" action="{{ route('login') }}">
        @csrf                     
        <h1>Login</h1>
        <input value="{{ old('email') }}" type="text" name="email" placeholder="Email">
        <input value="{{ old('password') }}" type="password" name="password" placeholder="Password">
        <input type="submit" name="" value="Login">
    </form>
@endsection