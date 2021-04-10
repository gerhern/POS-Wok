<a  href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            class="text-red-600 text-lg font-bold py-1 px-4 self-end absolute m-4 border-2 border-red-600 rounded-3xl">
            Salir
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>