@extends('layouts.app')

@section('content')
<h1>Add Employee</h1>

<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <label>First Name:</label>
    <input type="text" name="name" required>
    <br>
    <label>Last Name:</label>
    <input type="text" name="name" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <label>Phone:</label>
    <input type="text" name="name" required>
    <br>
    <label>Position:</label>
    <input type="text" name="position">
    <br>
    <label>Salary:</label>
    <input type="Number" name="Amount" required>
    <br>
    <label>Date of joining:</label>
    <input type="Date" name="name" required>
    <br>
    <label>Department:</label>
    <input type="text" name="name" required>
    <br>
    <button type="submit">Save</button>
</form>
@endsection
