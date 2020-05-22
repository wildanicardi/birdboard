@if (count($activity->changes['after']) == 1)
{{$activity->user->name}} Updated the {{key($activity->changes['after'])}} of the project
@else
{{$activity->user->name}} Updated the project
@endif
