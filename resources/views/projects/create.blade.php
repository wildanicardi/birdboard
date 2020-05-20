@extends('layouts.app')
@section('content')
<div class="container flex justify-center">
    <div class="w-full max-w-lg mx-auto rounded">
        <form class="bg-white shadow-md rounded px-12 pt-6 pb-8 mb-4" action="/projects" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Title
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="title" placeholder="Title">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Description
                </label>
                <textarea class="bg-white mr-4 p-5 rounded shadow w-full mb-4" name="description"></textarea>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Create Project
                </button>
                <a href="/projects" class="button bg-red-500 font-bold py-2 px-4 rounded">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
