@extends('layouts.page')
@section('content')
    <!--home-->
    <div class="flex flex-col w-full">
        <img src="{{asset('img/letter.jpg')}}" alt="Store letter" class="object-cover w-full h-1/2">

            @guest
            @else
                <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    class="text-red-600 text-lg font-bold py-1 px-4 self-end absolute m-4 border-2 border-red-600 rounded-3xl">
                    Salir
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            @endguest

            <livewire:modal-container/>
    </div>
@endsection 