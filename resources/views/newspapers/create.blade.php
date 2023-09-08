@extends('layouts.app')

@section('title', 'Create Newspaper')

@section('content')
<div class="container">
    <h2>Create New Newspaper</h2>
    <form action="{{ route('newspapers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputPrice">Categorey</label>
            <select class="form-select" name="cat_id" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
        </div>
        <br>
        <div class="form-group">
            <input type="file" name="upload_image" class="form-control" id="customFile" />
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create newspaper</button>
    </form>
</div>
</body>
</html>


<style>
.container {
    margin-top: 20px;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #007bff;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn {
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
    cursor: pointer;
    border: none;
}

.btn-primary {
    background-color: #007bff;
}
</style>
