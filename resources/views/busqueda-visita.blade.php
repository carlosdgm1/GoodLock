<!--Css-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">

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
                    <div class="container">
                        <main class="form-signin">
                            <p class="fs-2">Buscar Personal</p>
    
                            <br>
                
                            <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                <th>Folio</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Ine</th>
                                <th>Motivo</th>
                                <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($BV as $itemR)
                                <tr>
                                <td>{{$itemR->id}}</td>
                                <td>{{$itemR->nombre}}</td>
                                <td>{{$itemR->telefono}}</td>
                                <td>{{$itemR->ine}}</td>
                                <td>{{$itemR->motivo}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-updateV-{{$itemR->id}}">
                                        Detalle
                                    </button>
                                </td>
                                </tr>
                                @include('components.modalV')
                                @endforeach
                            </tbody>
                        </table>        
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 

<!--Js-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script>
    $('#example').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontro el resultado",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontro el resultado",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            'search': "Buscar:"
        }
    });  
</script>