    
<div id="info-hotel-{{ $hotel->id }}" data-modal-backdrop="static" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                Más información
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="info-hotel-{{ $hotel->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-10 space-y-4">
                <div class="flex justify-start gap-10 mb-5">

                    {{-- <img src={{'storage/'.$imagen->foto}} alt="" class="rounded-lg flex lg:w-2/5 sm:w-1/2 lg:place-self-start sm:place-self-center" style="aspect-ratio:400/267"> --}}

                    
                    <div id="controls-carousel" class="relative lg:w-2/5 sm:w-1/2" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-64 overflow-hidden rounded-lg">
                            @php  
                                    $num_img = 0;
                                @endphp

                                @foreach ($imagenes as $imagen)                                    
                                    @if ($hotel->id == $imagen->hotel_id)
                                        <?php
                                            $num_img ++;
                                        ?>
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                            <img src={{'storage/'.$imagen->foto}} class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded" alt="..." style="aspect-ratio:400/267">
                                        </div>
                                    @endif
                                @endforeach
                            
                        </div>

                        @if ($num_img > 1)    
                            <!-- Slider controls -->
                            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-2 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-2 h-2 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-2 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-2 h-2 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        @endif
                    </div>


                    {{-- <img src={{'storage/'.$imagen->foto}} alt="" class="rounded-lg flex lg:w-2/5 sm:w-1/2 lg:place-self-start sm:place-self-center" style="aspect-ratio:400/267"> --}}

                    <div class="grid grid-cols-1 pe-5">
    
                        <span class="text-xl h-min mb-2">{{ $hotel->nombre }}</span>
    
                        <x-static_star_rating ></x-static_star_rating>
    
                        <div class="flex align-center">
                            <div class="bg-gray-300 rounded flex items-center shadow h-min px-2 gap-2 sm:mb-2 mt-4  ">
                                <span class="fi fi-{{ $hotel->bandera }} fa-sm"></span> 
                                <span class="my-1">Ciudad: {{ $hotel->ciudad }}, {{ $hotel->pais }}</span>
                            </div>
                        </div>
                        
                        <span class="text-2xl">
                            Distancia al centro: 
                        </span>
                        
                        
                        <span class="text-2xl">
                            A {{ $hotel->distancia }} km del centro de la ciudad.
                        </span>

                        <span class="text-2xl text-green-400">
                            Disponible
                        </span>
                    </div>                    
                </div>

                <div class="flex items-center">
                    <span class="font-semibold me-5 w-auto whitespace-nowrap">Servicios Extra:</span>
                    <div class="h-min grid sm:grid-cols-4 lg:grid-cols-5 gap-2 justify-around w-full">
                        @foreach ($serviciosHoteles as $hServicio)
                            @if ($hServicio->id_hotel == $hotel->id)
                                
                                <span class="whitespace-nowrap w-min">
                                    <i class="fa-solid fa-{{ $hServicio->icono }} ms-1 fa-xs"></i>
                                    <span class="sm:text-sm">
                                        {{ $hServicio->nom_servicio }}
                                    </span>
                                </span>
                            @endif
                        @endforeach
                    </div>
                </div>
                
                <div class="flex">
                    <div class="w-3/5">

                        <div class="">
                            <span class="font-semibold text-2xl mb-1">Descripción</span>
                            <p>
                                {{ $hotel->descripcion }}
                            </p>
                        </div>
                        <div class="my-5">
                            <span class="font-semibold">Políticas de Cancelación</span>
                            <p>
                                {{ $hotel->politicas }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="w-2/5 flex flex-col items-center h-min  px-5">
                        
                        {{-- asd --}}
                        <div id="date-range-picker" date-rangepicker class="flex flex-col items-center text-center justify-center" datepicker-format="dd-mm-yyyy">
                            <span class="mb-2">Fecha de llegada</span>
                            <div class="relative max-w-sm w-2/3 mb-4">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 " placeholder="Inicio" >
                            </div>
                            
                            <span class="mb-2">Fecha de Partida</span>
                            <div class="relative max-w-sm mb-4 w-2/3">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Fin" >
                            </div>
                        </div>

                        <div class="relative max-w-sm flex flex-col items-center  mb-4">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Habitaciones</label>
                            <select id="countries" class="w-min bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    
                        <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-2 mb-2">
                            Agregar al carro
                            <i class="fa-solid fa-cart-shopping ms-1"></i>
                        </button>
                    </div>
                    
                </div>
            </div>

                <div class="border-t-4 border-t-orange-800 p-8">

                    <div class="text-center">
                        <span class="text-2xl font-semibold">Comentarios</span>
                    </div>

                    <div class="flex mt-5">
                        <div class="aspect-square sm:w-2/4 md:w-1/4 me-5">
                            <img src="{{ asset('images/pfp.jpg') }}" class="rounded-full"  alt="">
                            
                        </div>
                        <div class="">
                            {{-- <div class="rating-wrapper-hl mb-1">
            
                                <!-- star 5 -->
                                
                                <label for="5-star-rating" class="star-rating">
                                <i class="fas fa-star fa-2xs d-inline-block"></i>
                                </label>
                                
                                <!-- star 4 -->
                                <input type="radio" disabled checked>
                                <label for="4-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block fa-2xs"></i>
                                </label>
                                
                                <!-- star 3 -->
                                
                                <label for="3-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block fa-2xs"></i>
                                </label>
                                
                                <!-- star 2 -->
                                
                                <label for="2-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block fa-2xs"></i>
                                </label>
                                
                                <!-- star 1 -->
                                
                                <label for="1-star-rating" class="star-rating star">
                                <i class="fas fa-star d-inline-block fa-2xs"></i>
                                </label>
                                
                            </div> --}}

                            <x-static_star_rating></x-static_star_rating>
                            <p class="mt-2">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>