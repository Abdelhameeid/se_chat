@extends('site.layouts')
@section('content')
    <form class="box" action="{{ route('loginn') }}" method="post">
        @csrf
        <h1>Login</h1>
        <input type="text" name="" placeholder="Email">
        <input type="password" name="" placeholder="Password">
        <input type="submit" name="" value="Login">
    </form>
@endsection

