<div class="mt-8 w-full flex flex-row flex-wrap justify-evenly text-center flex-grow">
    <h1 class="w-full h-1/10 text-6xl">Point Of Sale Wok </h1>
    @foreach($modals as $clave => $modal)
    <div>
        <h2 class="text-5xl">{{ $clave }}</h2>
        <p class="text-3xl">{{ $modal }}</p>
    </div>
    @endforeach
</div>