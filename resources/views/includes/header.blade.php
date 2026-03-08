<p class="flex items-center">@yield('title')</p>

@auth
    <div class="relative group inline-block cursor-pointer active:cursor-grabbing">
        <div class="flex gap-6 hover:bg-stone-950/25 p-2 px-4 transition rounded-full">
            <p class="text-ellipsis overflow-hidden whitespace-nowrap">{{auth()->user()->full_name}}</p>
            <div class="w-8 h-8 rounded-full bg-cyan-950"></div>
        </div>

        <div class="absolute text-black top-full right-0 w-47 bg-stone-200 shadow/50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-200 rounded-lg px-2">
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="cursor-pointer active:cursor-grabbing">Выйти</button>
            </form>
        </div>
    </div>
@endauth
