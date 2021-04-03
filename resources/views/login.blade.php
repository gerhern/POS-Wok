<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Wok</title>
</head>

<body>

    <!--container-->
    <div class="flex justify-center items-center w-screen h-screen bg-cover bg-top" style="background-image: url( '{{asset('img/log.jpg')}}')">

        <!--logform-->
        <div class="w-full h-full flex flex-row justify-between items-center bg-black bg-opacity-60 ">
            <div class="w-3/12 h-3/5 flex flex-col justify-evenly items-center mx-auto bg-white bg-opacity-90 " >
                <h2 class="text-4xl font-semibold">Ingresar</h2>
                <x-jet-validation-errors class="mb-4" />
                <!--form-->
                <form method="POST" action="{{ route('login') }}" class="w-4/5 h-4/5 flex flex-col justify-evenly items-center">
                @csrf

                    <label for="id" class="w-full flex flex-col justify-center ">
                        <span class="text-xl font-extrabold">Usuario</span>
                        <input id="id" type="text" class="font-semibold h-12 text-lg px-4 border-black border-2" name="id" value="{{old('id')}}" required autocomplete="id" autofocus placeholder="# de Usuario">
                    </label>

                    <label for="password" class="w-full flex flex-col justify-center ">
                        <span class="text-xl font-extrabold">Contraseña</span>
                        <input id = "password" type="password" class=" font-semibold h-12 text-lg px-4 border-black border-2" name="password" required autocomplete="current-password" placeholder="Contraseña">
                    </label>

                <input type="submit" value="Iniciar Sesion" class="text-lg border-black border-2 rounded-2xl px-2 bg-gray-100">
                </form>
            </div><!--logData-->

            <!--loginfo-->
            <div class="text-white w-3/6 h-4/5 mr-60 text-center text-4xl flex flex-col justify-between">
                <h2 class="mt-16">Punto de venta Wok</h2>
                <p class="italic font-extralight text-xl mb-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure quaerat dolorum, nulla eaque quo nemo impedit. Dolorem natus earum culpa soluta cum eius ad atque consequuntur, voluptatum excepturi officiis nam?</p>
            </div><!---logInfo-->


            
        </div>
    </div>
</body>

</html>