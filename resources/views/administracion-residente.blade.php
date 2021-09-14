<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administracion') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('components.menu-administracion')
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                              CREAR PERSONAL
                            </div>
                            <div class="card-body">

                            <form method="POST" class="formulario_guardar" action="{{route('crear-administracionR')}}">

                                @csrf

                                <div class="input-group mb-3">
                                <input onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Nombre completo" name="nombre"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                        
                                <div class="input-group mb-3">
                                <input onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Direccion" name="direccion"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                        
                                <div class="input-group mb-3">
                                <input onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Telefono" name="telefono"  type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                <input style="margin: 2px" required placeholder="Correo" name="correo"  type="email" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                        
                                <div class="input-group mb-3">
                                <select name="tipo"  style="margin: 2px;" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                <option selected value="No definido">Escoja el tipo de residente...</option>
                                <option value="RENTA">RENTA</option>
                                <option value="DUEÑO">DUEÑO</option>
                                </select>
                                </div>

                                <center><input type="submit" value="GUARDAR" name="guardar" class="btn btn-dark"</center>

                            </form>

                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>