@extends('layouts.app')
@section('content')
<form action="/projects" method="POST" class="container">
    @csrf
    <h1 class="heading is-1">Create Project</h1>
    <div class="field">
        <label for="title" class="label">Title</label>
        <div class="control">
            <input type="text" class="input" name="title" placeholder="Title">
        </div>
    </div>
    <div class="field">
        <label for="description" class="label">Description</label>
        <div class="control">
            <textarea class="textarea" name="description"></textarea>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Create Project</button>
            <a href="/projects" class="button">Cancel</a>
        </div>
    </div>
</form>
@endsection
