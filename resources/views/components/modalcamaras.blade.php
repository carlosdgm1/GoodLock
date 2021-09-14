      {{-- Modal editar Personal--}}
      <div class="modal fade" id="modal-updateC-{{$cam->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">IP actuales de camaras</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    
                <form method="post" action="{{route('update-configuracion', $cam->id)}}">
                    @csrf @method('put')
               
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Frente de calle</label>
                      <input type="text" name="frente" class="form-control" id="frente">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Camara Placas</label>
                      <input type="text" name="placa" class="form-control" id="placa">
                    </div>
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
              <input type="submit" value="GUARDAR CAMBIOS" class="btn btn-primary">
              {{-- <button type="submit" class="btn btn-primary">Guardar cambios</button> --}}
            </div>
          </div>
        </div>
      </div>
    </form> 
      {{-- Fin modal editar personal--}}
      
    
    
        