<div class="relative">
    @if (Route::has('login'))
        <div class="hidden fixed px-6 py-4 sm:block">
            @auth
                <a href="{{ route("logout") }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Log out</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
