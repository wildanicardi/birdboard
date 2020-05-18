<div class="bg-white mr-4 p-5 rounded shadow">
    <h3 class="text-lg py-4 font-bold text-xl mb-6 -ml-5 border-l-4 border-blue-400 pl-4">
        <a href="{{$project->path()}}">{{$project->title}}</a>
    </h3>

    <div class="text-grey">{{Illuminate\Support\Str::limit($project->description,100)}}</div>
</div>
