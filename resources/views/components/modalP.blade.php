  
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
  </head>
  <body>

      {{-- Modal editar Personal--}}
  <div class="modal fade" id="modal-update-{{$itemR->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalle de {{$itemR->nombre}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form method="post" action="{{route('update-pa',  $itemR->id)}}">
                @csrf @method('put')

            <div class="input-group mb-3">
                <input value="{{$empleado}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Nombre completo" name="nombre"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
        
                <div class="input-group mb-3">
                <input value="{{$itemR->direccion}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Direccion" name="direccion"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
        
                <div class="input-group mb-3">
                <input value="{{$itemR->ine}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Ine" name="ine"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
        
                <div class="input-group mb-3">
                <input value="{{$itemR->telefono}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Telefono" name="telefono"  type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                <input value="{{$itemR->tipo}}" onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Tipo" name="tipo"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
        
                <div class="input-group mb-3">
                <select name="servicio"  style="margin: 2px;" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                <option value="{{$itemR->servicio}}">{{$itemR->servicio}}</option>
                <option value="OFICIAL">OFICIAL</option>
                <option value="JARDINERO">JARDINERO</option>
                <option value="MUCAMA">MUCAMA</option>
                </select>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <input type="submit" value="GUARDAR CAMBIOS" class="btn btn-primary">
          {{-- <button type="submit" class="btn btn-primary">Guardar cambios</button> --}}
        </div>
      </div>
    </div>
  </div>
</form> 
  {{-- Fin modal editar personal--}}
  </body>
  </html>
  