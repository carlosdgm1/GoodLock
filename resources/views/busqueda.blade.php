<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Busqueda') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('components.menu-busqueda')
                    <div class="container text-center">
                        <main class="form-signin">
                            <form>
                                <center><img src="{{asset('img/logo.png')}}" style="width: 140px; height: 90px;"></center>
                                <br>
                              <h1 class="h3 mb-3 fw-normal">INTRANET</h1>
                                <p>Bienvenido {{Auth::user()->name}} al apartado de <p class="fw-bold">BUSQUEDA</p></p>
                              <p class="mt-5 mb-3 text-muted">GOODLOCK</p>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>