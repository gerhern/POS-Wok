<nav>
    <!--navcontainerUl-->
    <ul class="flex flex-col h-screen">
        <!--Muestra de forma dinamica las tabs del navbar-->
        @foreach($tabs as $clave => $tab)
        <li class="w-full flex-grow text-xl">
            <a href="{{$tab}}" class="w-full h-full flex justify-center items-center hover:underline hover:bg-white hover:text-black hover:transition duration-1000">{{$clave}}</a>
        </li>
        @endforeach
    </ul>
</nav>