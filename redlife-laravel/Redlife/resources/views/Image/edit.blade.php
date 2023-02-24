<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Redlife
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- CONTENIDO -->
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        Editar Imagen
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('image.update', ['image' => $image->id])}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <!-- -->

                                            <input type="hidden" name="image_id" value="{{$image->id}}"/>

                                            <div class="row justify-content-center">
                                                    
                                                @if ($errors->has('image_path'))
                                                    <div class="alert alert-darger">
                                                        <strong>Danger! </strong> {{ $errors->first('image_path')}}
                                                    </div>
                                                @endif

                                                <div class="col-lg-2">
                                                        <img id="image_edit"
                                                                src="{{ route('image.file', ['filename' => $image->image_path]) }}" />
                                                </div>
                                            </div>

                                            <div class="row justify-content-lg-center">
                                                <div class="col-lg-1">
                                                    <label for="image_path" class="form-label">Imagen</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="file" class="form-control" id="image_path" name="image_path" value="{{$image->image_path}}"/>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- -->
                                            <div class="row justify-content-lg-center">
                                                @if ($errors->has('description'))
                                                    <div class="alert alert-darger">
                                                        <strong>Danger! </strong> {{ $errors->first('description')}}
                                                    </div>
                                                @endif
                                                <div class="col-lg-1">
                                                    <label for="description"
                                                        class="form-label text-lg-left">Descripccion</label>
                                                </div>
                                                <div class="col-lg-8" id="description">
                                                    <textarea class="form-control" name="description">{{ $image->description}}</textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row justify-content-lg-center">
                                                <div class="col-lg-1">
                                                    <input  type="submit" class="btn btn-primary " value="Submit" />
                                                </div>
                                                <div class="col-lg-6"></div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

</x-app-layout>
