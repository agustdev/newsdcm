<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                clifford: '#da373d',
              }
            }
          }
        }
      </script>
<style>
   .toddler {
    font-size: 0.600rem; line-height: 1.25rem;
    }

    /* Cuando el ancho de la pantalla sea mediano (768px o mayor) */
    @media (min-width: 768px) {
      .bigletter {
        font-size: 24px; /* Cambia el tamaño a uno mayor */
      }
    }

    /* Para pantallas aún más grandes (1024px o mayor) */
    @media (min-width: 1024px) {
      .moreletter {
        font-size: 32px; /* Aumenta más el tamaño del texto */
      }
    } 

    [carrousel] {
  display: flex;
  position: relative;
  //paint
  background-color: #47cf73;
  border-radius: 10px;
  min-height: 40vh;
  
  &::before {
    content: '';
    display: block;
    padding-bottom: 12%;
  }

  
  [name~="carrousel"] {
    display: none;
    
    &:checked {
      + .slide {
        pointer-events: auto;
        opacity: 1;
        .slide-content {
          opacity: 1;
        }
      }
    }
  }
  
  
  .slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    opacity: 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .slide-content {
    opacity: 0;
    transition: opacity 1s;
  }
  
  .back,
  .forward {
    display: block;
    position: absolute;
    top: calc(50% - 2rem);
    height: 4rem;
    width:  2rem;
    display: flex;
    justify-content: center;
    align-items: center;
    user-select: none;
    //paint
    font-size: .5rem;
    background-color: lighten(#47cf73, 35%);
    border-radius: 100px;
    color: darken(#47cf73, 40%);
    box-shadow: 0 2px 0 0 rgba(black, .1);
    transform: scale(.9);
    transition: transform .2s;
    
    
    &:hover {
      transform: scale(1);
      background-color: white;
    }
  }
  
  .back {
    left: calc(0% + 1rem);
  }
  
  .forward {
    right: calc(0% + 1rem);
  }
}

//cool stuff stops here
body {
  padding: 1rem;
}
[carrousel] {
  h1 {
    font-size: 5rem;
    color: white;
    text-shadow: 0 3px 0 rgba(black, .2);
  }
}

</style>

</head>
<body class="bg-center md:h-screen md:bg-no-repeat md:bg-cover bg-[url('images/sea1.jpg')]">

    <!-- div principal -->
<div class="principal">


    <div class="grid grid-cols-3 md:grid-cols-4 mx-6 justify-center mb-5">
        <div class="flex justify-end h-12 mt-4 md:mr-4 md:col-span-3">
            @if (app()->getLocale() == '')
                <img src="{{ asset('images/do.svg') }}" alt="" class="">
            @endif
            @foreach (Config::get('languages') as $lang => $language)
                @if (app()->getLocale() === $language['flag'])
                    <img src="{{ asset('images/' . $language['image']) }}" alt="" class="mr-4">
                @endif
            @endforeach

        </div>
        <div class="flex col-span-2 md:col-span-1 justify-center lg:justify-start mt-4">
            <form class="flex justify-end items-center" action="{{ route('lang.switch') }}" method="POST">
                @csrf
                <select onchange="this.form.submit()" name="language" id="language"
                    class="form-select rounded-lg px-3 h-8 border-amber-400 w-full changeLang">
                    <option value="es" selected>Seleccione su idioma</option>
                    @foreach (Config::get('languages') as $lang => $language)
                        <option value="{{ $language['flag'] }}"
                            {{ app()->getLocale() === $language['flag'] ? 'selected' : '' }}
                            data-img="{{ asset('images/' . $language['image']) }}">
                            {{ $language['display'] }}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    



    <!-- div para la imagen de fondo -->

    <div class="grid grid-cols-1 mt-10 md:mt-0">

        <div class="flex justify-center">
            <img class="h-48 w-48 mt-08 mb-10" src="{{ asset('images/capitania de puerto1.png') }}"
            alt="" srcset="">
        </div>


        <div class="flex justify-center text-white">
            <h1 class="text-xl font-black -mt-6 mb-4 text-center">ARMADA DE REPÚBLICA
                DOMINICANA <br><span class="text-xl font-semibold">DESPACHO RD</span></h1>
        </div>
    </div>

    <section carrousel>
  
        <input id="slide-0" name="carrousel" type="radio" checked/>
        <div class="slide">
          <label for="slide-4" class="back text-white hover:text-black">◀</label>
          <div class="slide-content text-white">
            <p class="text-center text-lg pb-2 -mt-1 font-bold">Descripción del servicio</p>

<p class="mx-12 md:mx-20 text-justify toddler md:text-xl" style="">El Comando Naval de Capitanías de Puertos y Autoridad Marítima de la  Armada de República Dominicana, con el objetivo de eficientizar los servicios de solicitudes de Conduce y Despacho de Embarcaciones, ha decidido poner en funcionamiento la plataforma tecnológica de servicios en línea <span class="font-bold">DESPACHO-RD</span>, con la finalidad de que todos los propietarios de embarcaciones de recreo, puedan realizar sus solicitudes desde cualquier lugar donde se encuentren, ya sea nacional o internacional. </p>
          </div>
          <label for="slide-1" class="forward text-white hover:text-black">▶</label>
        </div>
        
        <input id="slide-1" name="carrousel" type="radio" />
        <div class="slide">
          <label for="slide-0" class="back text-white hover:text-black">◀</label>
          <div class="slide-content text-white">

            <p class="text-center text-lg pb-2 -mt-1 font-bold">Navegantes</p>
            <img src="{{ asset('images/soldier.png') }}"
                    class="h-24 w-24 md:h-48 md:w-48 "
                    alt="...">

          </div>
          <label for="slide-2" class="forward text-white hover:text-black">▶</label>
        </div>
        
        <input id="slide-2" name="carrousel" type="radio" />
        <div class="slide">
          <label for="slide-1" class="back text-white hover:text-black">◀</label>
          <div class="slide-content  text-white">

            <p class="text-center text-lg pb-2 -mt-1 font-bold">Conduce</p>
            <img src="{{ asset('images/conduce.png') }}"
                    class="h-24 w-24 md:h-48 md:w-48 "
                    alt="...">

          </div>
          <label for="slide-3" class="forward text-white hover:text-black">▶</label>
        </div>  
      
        <input id="slide-3" name="carrousel" type="radio" />
        <div class="slide">
          <label for="slide-2" class="back text-white hover:text-black">◀</label>
          <div class="slide-content text-white">

            <p class="text-center text-lg pb-2 -mt-1 font-bold">Despacho</p>
            <img src="{{ asset('images/ship-2.png') }}"
                    class="h-24 w-24 md:h-48 md:w-48 "
                    alt="...">

          </div>
          <label for="slide-4" class="forward text-white hover:text-black">▶</label>
        </div>
        
        <input id="slide-4" name="carrousel" type="radio" />
        <div class="slide">
          <label for="slide-3" class="back text-white hover:text-black">◀</label>
          <div class="slide-content text-white">

            <p class="text-center text-lg pb-2 -mt-1 font-bold">Asistencia</p>
            <img src="{{ asset('images/icono whatsapp.png') }}"
                    class="h-24 w-24 md:h-48 md:w-48 "
                    alt="...">

          </div>
          <label for="slide-0" class="forward text-white hover:text-black">▶</label>
        </div>


      </section>
    


    <!-- aqui es dodne termian el carrousel -->

    <div class="flex justify-center mt-16 md:mt-2 pb-8">

        <a href="{{ route('login') }}"
            class="px-8 py-4 text-lg text-white bg-blue-500 font-bold rounded-full transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg hover:bg-blue-600">
            Entrar
        </a>

    </div>

</div>    



<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
<script>
    
</script>
</body>
</html>
