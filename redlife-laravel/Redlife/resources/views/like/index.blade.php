<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Redlife
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- CONTENIDO -->
                    <div class="container ">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <h1 id="favoritas">Mis Imagenes Favoritas</h1>
                                @foreach ($likes as $like)
                                    @include('includes.image', ['image'=>$like->image])
                                @endforeach
                                <!--paginacion-->
                                <div>
                                    {{ $likes->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
