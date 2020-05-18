@extends('layouts.app')
@section('content')
<header class="flex items-center mb-3 py-2">
    <div class="flex justify-between items-end w-full">
        <h2 class="text-grey text-sm font-normal">My Projects</h2>
        <a href="/projects/create"
            class="bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold py-2 px-4 rounded-lg">New
            Project</a>
    </div>

</header>
<main class="lg:flex lg:flex-wrap -mx-3">
    @forelse ($projects as $project)
    <div class="lg:w-1/3 px-3 pb-6">
        <div class="bg-white mr-4 p-5 rounded shadow">
            <h3 class="text-lg py-4 font-bold text-xl mb-6 -ml-5 border-l-4 border-blue-400 pl-4">
                <a href="{{$project->path()}}">{{$project->title}}</a>
            </h3>

            <div class="text-grey">{{Illuminate\Support\Str::limit($project->description,100)}}</div>

        </div>
    </div>
    @empty
    <div>No Project Yet.</div>
    @endforelse
</main>
@endsection
