 <!--Css Datatables-->
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

                            <p class="fs-2">Asignar coresidentes</p>
  
   
                            <form method="POST" action="{{ route('crear-coresidente') }}">
                                @csrf
                        
                                <div class="input-group mb-3">
                                <input readonly value="{{$diag}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Nombre completo" name="idr"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                        
                                <div class="input-group mb-3">
                                <input onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Nombre completo" name="nombre"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                                
                                <div class="input-group mb-3">
                                <input onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Relacion" name="relacion"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                        
                                <center><input type="submit" value="GUARDAR DATOS" name="guardar" class="btn btn-dark"</center>
                        
                            </form>
                        </div>
                        <br>
                        <br>
                        <div class="container">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <tr>
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Relacion</th>
                                      <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($meca as $item)
                                    <tr>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->relacion}}</td>
                                    <td>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </td>  
                                    </tr>
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

<!--Js Datatables-->
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