<!--Css Datatables-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">


<div  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Visitas pendientes de salida</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="fs-2">Visitas abiertas</p>
            <table id="example" class="table table-striped">
              <thead>
                  <tr>
                  <th>Folio</th>
                  <th>Nombre</th>
                  <th>Ine</th>
                  <th>Motivo</th>
                  <th>Estatus</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($BV as $itemR)
                  <tr>
                  <td>{{$itemR->id}}</td>
                  <td>{{$itemR->nombre}}</td>
                  <td>{{$itemR->ine}}</td>
                  <td>{{$itemR->motivo}}</td>
                  <td>
                    <form method="Post" action="{{route('estatusV', $itemR)}}">
                      @csrf @method('put')
                      <input type="submit" class="btn btn-warning" value="Cerrar Visita">
                    </form>
                  </td>
                  </tr>
                  @include('components.modalV')
                  @endforeach
              </tbody>
          </table> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

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