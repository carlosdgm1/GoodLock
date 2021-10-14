<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuracion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <main class="form-signin">
                            <p class="fs-2">Configuracion</p>
                            <form>
                                <p class="fs-4">Cambio de camaras</p>
                                <br>
                                <table id="example" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Frente de calle</th>
                                            <th>Camara de placas</th>
                                            <th>Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($camara as $cam)
                                            <tr>
                                                <td>{{ $cam->frente }}</td>
                                                <td>{{ $cam->placa }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modal-updateC-{{ $cam->id }}">
                                                        Modificar
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('components.modalcamaras')
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <p class="fs-4">Puertos arduino</p>
                                <br>
                                <form method="Post" action="{{ route('estatus-arduino') }}">
                                    @csrf @method('put')
                                    <div class="row">
                                        <div class="col-3">
                                            <select class="form-select" name="relay" id="relay"
                                                aria-label="Default select example">
                                                <option selected>Que relevador quieres usar</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <input type="submit" class="btn btn-sm btn-primary" value="Guardar">
                                        </div>
                                    </div>


                                </form>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
