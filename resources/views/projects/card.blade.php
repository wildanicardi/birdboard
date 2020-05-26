<div class="card flex flex-col">
    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
        <a href="{{ $project->path() }}" class="text-default no-underline">{{ $project->title }}</a>
    </h3>

    <div class="mb-4 flex-1">{{Illuminate\Support\Str::limit($project->description,100)}}</div>
    @can('manage', $project)
        <footer>
            <form action="{{$project->path()}}" method="post" class="text-right">
                @method('DELETE')
                @csrf
                <button type="submit" class="text-default text-xs">Delete</button>
            </form>
        </footer>
    @endcan
</div>
