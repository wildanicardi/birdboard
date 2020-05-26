<div class="card mb-3 mt-3">
    <ul class="text-xs list-reset text-default">
        @foreach ($project->activity as $activity)
            <li class="{{$loop->last?'':'pb-2'}}">
                @include("projects.activity.{$activity->description}")
               <span class="text-muted">{{$activity->created_at->diffForHumans(null,true)}}</span>
            </li>
        @endforeach
    </ul>
</div>
