@extends('layouts.app')
@section('content')
<div class="container flex justify-center">
    <div class="lg:w-1/2 lg:mx-auto p-6 md:py-12 md:px=16 shadow bg-white rounded">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Edit You Project
        </h1>
        <form class="rounded px-12 pt-6 pb-8 mb-4"
        action="{{$project->path()}}" method="POST">
            @csrf
            @method('PATCH')
        @include('projects.form',['buttonText' => 'Update Project'])
        </form>
    </div>
</div>

@endsection
