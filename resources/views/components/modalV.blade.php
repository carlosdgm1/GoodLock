

      {{-- Modal editar Personal--}}
      <div class="modal fade" id="modal-updateV-{{$itemR->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detalle de {{$itemR->nombre}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    
                <form method="post" action="{{route('update-visitantes',  $itemR->id)}}">
                    @csrf @method('put')

                    <div class="input-group mb-3">
                        <input readonly value="{{$itemR->nombre}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Nombre completo" name="nombre"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                
                        <div class="input-group mb-3">
                        <input readonly value="{{$itemR->telefono}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Telefono" name="telefono"  type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        <input readonly value="{{$itemR->ine}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="INE" name="ine"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                
                        <div class="input-group mb-3">
                        <input readonly value="{{$itemR->placa}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Placa" name="placa"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        <input value="{{$itemR->fecha}}" readonly style="margin: 2px" placeholder="Fecha" name="fecha"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                
                        <p>Clave de visitante que visita</p>
                        <div class="input-group mb-3">
                            <input readonly value="{{$itemR->idr}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Placa" name="placa"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>

                        <div class="input-group mb-3">
                          <img src="{{URL::asset("storage/ine/{$itemR->ine_foto}")}}" alt="profile Pic" height="200" width="200">
                        </div>
                        <div class="input-group mb-3">
                          <img src="{{URL::asset("storage/placa/{$itemR->placa_foto}")}}" alt="profile Pic" height="200" width="200">
                        </div>
                          <div class="input-group mb-3">

                          <img src="{{URL::asset("storage/cara/{$itemR->cara_foto}")}}" alt="profile Pic" height="200" width="200">
                        </div>
                
                        <div class="form-floating">
                        <textarea readonly name="motivo" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{$itemR->motivo}}</textarea>
                        </div>
                
             
    
            </div>
          </div>
        </div>
      </div>
    </form> 
      {{-- Fin modal editar personal--}}
    