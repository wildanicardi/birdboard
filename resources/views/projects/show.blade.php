@extends('layouts.app')
@section('content')
<header class="flex items-center mb-3 py-2">
    <div class="flex justify-between items-end w-full">
        <p class="text-grey text-sm font-normal"><a href="/projects" class="text-grey text-sm font-normal">My Projects</a>/ {{$project->title}}</p>
        <a href="/projects/create"
            class="button bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold py-2 px-4 rounded-lg">New
            Project</a>
    </div>

</header>
<main>
    <div class="lg:flex -mx-3">
        <div class="lg:w-3/4 px-3 mb-6">
            <div class="mb-8">
                <h2 class="text-lg text-grey font-normal mb-3">Task</h2>
                <div class="bg-white mr-4 p-5 rounded shadow mb-3">Lorem Ipsum</div>
            </div>
            <div class="mb-6">
                <h2 class="text-lg text-grey font-normal mb-3">General Notes</h2>
                <textarea class="bg-white mr-4 p-5 rounded shadow w-full">Lorem Ipsum</textarea>
            </div>
        </div>
        <div class="lg:w-1/4 px-3">
            @include('projects.card')
        </div>
    </div>
</main>

@endsection
