@if(auth()?->user()?->is_admin)
    <div class="absolute left-4 right-4 bottom-4 bg-white rounded-full w-10 h-10 flex items-center justify-center text-center">
        <form action="{{ route('users.toggle-banned', $user) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="text-zinc-800 text-xl mx-auto block">
                <i class="fa-solid fa-gavel"></i>
            </button>
        </form>
    </div>
@endif