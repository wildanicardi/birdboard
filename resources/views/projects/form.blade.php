<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Title
    </label>
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        type="text" name="title" placeholder="Title" value="{{$project->title}}">
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Description
    </label>
    <textarea class="bg-white mr-4 p-5 rounded shadow w-full mb-4"
        name="description">{{$project->description}}</textarea>
</div>
<div class="flex items-center justify-between">
    <button
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        type="submit">
        {{$buttonText}}
    </button>
    <a href="{{$project->path()}}" class="button bg-red-500 font-bold py-2 px-4 rounded">Cancel</a>
</div>
@if ($errors->any())
    <div class="field mt-6 text-red-500">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </div>
@endif
