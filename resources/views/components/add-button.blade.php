<a  href="{{ route("$addition.create") }}"
            onclick="event.preventDefault();
            document.getElementById('{{$addition}}-form').submit();"
            {{$attributes}}>
            Crear {{ucfirst(substr($addition, 0, 9))}}
        </a>

        <form id="{{$addition}}-form" action="{{ route("$addition.create") }}" method="GET">
            @csrf
        </form>