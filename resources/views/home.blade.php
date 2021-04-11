@extends('layouts.page')
@section('content')
    <!--home-->
    <div class="flex flex-col w-full">
        <img src="{{asset('img/letter.jpg')}}" alt="Store letter" class="object-cover w-full h-1/2">
        
        <x-logout-button/>
            <livewire:modal-container/>
    </div>
@endsection 