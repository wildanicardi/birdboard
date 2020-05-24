@extends('layouts.app')
@section('content')
<header class="flex items-center mb-3 py-2 px-4">
    <div class="flex justify-between items-end w-full">
        <p class="text-grey text-sm font-normal"><a href="/projects">My Projects</a>/ {{$project->title}}</p>
        <div class="flex items-center">
            @foreach ($project->members as $member)
                <img
                    src="{{ gravatar_url($member->email) }}"
                     alt="{{ $member->name }}'s avatar"
                    class="rounded-full w-8 mr-2">
            @endforeach

                <img
                    src="{{ gravatar_url($project->owner->email) }}"
                    alt="{{ $project->owner->name }}'s avatar"
                    class="rounded-full w-8 mr-2">
            <a href="{{$project->path().'/edit'}}"
                class="button bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold py-2 px-4 rounded-lg ml-4">
                Edit Project</a>
        </div>

    </div>

</header>
<main>
    <div class="lg:flex -mx-3">
        <div class="lg:w-3/4 px-3 mb-6">
            <div class="mb-8">
                <h2 class="text-lg text-grey font-normal mb-3">Task</h2>
                @foreach ($project->tasks as $task)

                <div class="bg-white mr-4 p-5 rounded shadow mb-3">
                    <form action="{{$task->path()}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="flex">
                            <input type="text" name="body" value="{{$task->body}}" class="w-full {{$task->completed ? 'text-green-200' : ''}}">
                            <input type="checkbox" name="completed" onchange="this.form.submit()"{{$task->completed ? 'checked' : ''}} >
                        </div>
                    </form>
                </div>
                @endforeach
                <div class="bg-white mr-4 p-5 rounded shadow mb-3">
                    <form action="{{$project->path().'/tasks'}}" method="post">
                        @csrf
                        <input placeholder="Add new tasks...." name="body" class="w-full">
                    </form>
                </div>

            </div>
            <div class="mb-6 mr-4">
                <h2 class="text-lg text-grey font-normal mb-3">General Notes</h2>
                <form action="{{$project->path()}}" method="POST">
                        @method('PATCH')
                        @csrf
                    <textarea
                        class="bg-white p-4 rounded shadow w-full mb-4"
                        style="min-height:200px"
                        placeholder="Anything special that you want to make a note off" name="notes">
                        {{$project->notes}}
                    </textarea>
                    <button type="submit" class="button bg-blue-500 text-white font-bold py-3 px-6 rounded-lg">
                        Save
                    </button>
                </form>
            </div>
        </div>
        <div class="lg:w-1/4 px-3 py-8">
            @include('projects.card')
            @include('projects.activity.card')
        </div>
    </div>
</main>

@endsection
