@extends('admin.layout')

@section('content')
    <h1>Admin</h1>
    <a href="{{ route('logout') }}"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
   Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
   @csrf
</form>
@endsection
