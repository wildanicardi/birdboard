@extends('layouts.app')
@section('content')
<div class="container flex justify-center">
    <div class="lg:w-1/2 lg:mx-auto p-6 md:py-12 md:px=16 shadow bg-card rounded">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Create You Project
        </h1>
        <form class="rounded px-12 pt-6 pb-8 mb-4"
        action="/projects" method="POST">
            @csrf
            @include('projects.form',['project' => new App\Project,'buttonText' => 'Create Project'])
        </form>
    </div>
</div>

@endsection
