<div class="bg-white mr-4 p-5 rounded shadow flex flex-col mt-3">
    <h3 class="text-lg py-4 font-bold text-xl mb-6 -ml-5 border-l-4 border-accent pl-4">
        Invite User
    </h3>
    <form action="{{$project->path().'/invitations'}}" method="post">
            @csrf
            <div class="mb-3">
                <input type="email" name="email"
                class="border border-muted rounded w-full py-2 px-3"
                placeholder="Email Address">
            </div>
            <button type="submit" class="button bg-blue-400 text-white font-bold py-2 px-4 rounded-lg">
                Invite
            </button>
    </form>
    @include('errors',['bag'=>'invitations'])
</div>
