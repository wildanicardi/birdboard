@extends('layouts.app')

@section('content')
<div class="container mx-auto flex justify-center">
    <form class="w-full max-w-sm mt-4" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    {{ __('Name') }}
                </label>
            </div>
            <div class="md:w-2/3">
                <input
                    class="{{ $errors->has('name') ? ' is-invalid' : '' }} border border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    name="name" type="text">
            </div>

        </div>
        <div class="md:flex md:items-center">
            @if ($errors->has('name'))
            <span class="invalid-feedback md:w-2/3 text-red-500 text-sm" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    {{ __('Email') }}
                </label>
            </div>
            <div class="md:w-2/3">
                <input
                    class="{{ $errors->has('email') ? ' is-invalid' : '' }} border border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="inline-full-name" name="email" type="text">
            </div>
        </div>
        <div class="md:flex md:items-center">
            @if ($errors->has('email'))
            <span class="invalid-feedback md:w-3/4 text-red-500 text-sm" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    {{ __('Password') }}
                </label>
            </div>
            <div class="md:w-2/3">
                <input
                    class="border border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    name="password" type="password">
            </div>
        </div>

        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    {{ __('Confirm Password') }}
                </label>
            </div>
            <div class="md:w-2/3">
                <input
                    class="border border-gray-400 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    name="password_confirmation" type="password">
            </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button
                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
