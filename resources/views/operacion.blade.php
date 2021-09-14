<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Operacion') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <main class="form-signin">
                            <p class="fs-2">Nueva Visita</p>
                                <div class="card-group">

                                    <div class="card">
                                            <div class="video-wrap">
                                                <video id="video" controls="controls" playsinline autoplay>
                                                    <source src=".mp4" />
                                                </video>
                                            </div>
                                                                                
                                    <div class="card-body">
                                        <center><h5 class="card-title">Camara Ine</h5></center>
                                        <center><button id="snap" class="btn btn-dark">CAPTURAR</button></center>

                                        <!-- Webcam video snapshot -->
                                        

                                    </div>
                                    </div>
                                    
                                    <div class="card">

                                        <video style="background: black url(loader.gif) center no-repeat;" id="remoteVideo" width="800" height="450" autoplay="" playsinline="" muted="" controls=""></video>

                                    <div class="card-body">
                                        <center><h5 class="card-title">Camara Placas</h5></center>
                                        <center><input type="submit" value="CAPTURAR" name="guardar" class="btn btn-dark"</center>
                                    </div>
                                    </div>
                                    <div class="card">
                                        <video style="background: black url(loader.gif) center no-repeat;" id="remoteVideo2" width="800" height="450" autoplay="" playsinline="" muted="" controls=""></video>
                                        
                                        <div class="card-body">
                                        <center><h5 class="card-title">Frente de calle</h5></center>
                                        <center><input type="submit" value="CAPTURAR" name="guardar" class="btn btn-dark"</center>
                                    </div>
                                    </div>  
                                </div>
                                <br>



                                <div class="card-group">
                                    <div class="card">
                                    <canvas id="canvas" width="640" height="480"></canvas>
                                    <div class="card-body">
                                        <center><h5 class="card-title">Foto ine</h5></center>
                                        <center><button id="snap" class="btn btn-dark">GUARDAR</button></center>
                                    </div>
                                    </div>
                                    <div class="card">
                                    </div>
                                    <div class="card">
                                    </div>
                                </div>


                                <form method="POST" class="formulario_guardar" action="{{route('crear-visitante')}}">
                                    @csrf
                                    <div class="input-group mb-3">
                                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Nombre completo" name="nombre"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    </div>

                                    <div class="input-group mb-3">
                                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Telefono" name="telefono"  type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="INE" name="ine"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    </div>

                                    <div class="input-group mb-3">
                                    <input onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px" required placeholder="Placa" name="placa"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    <input readonly value="<?php echo date('Y-m-d');?>" style="margin: 2px" placeholder="Fecha" name="fecha"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    </div>

                                    <div class="input-group mb-3">
                                        <select name="idr"  style="margin: 2px;" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                        <option selected>Seleccione al residente que visita</option>
                                
                                        @foreach ($idr as $item)    
                                        <option value="{{ $item['id'] }}">{{ $item['nombre'] }} vive en {{ $item['direccion'] }}</option>
                                        @endforeach   
                                    
                                
                                        
                                        </select>
                                    </div>

                                    <div class="form-floating">
                                    <textarea name="motivo" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Motivo de la visita</label>
                                    </div>

                                    <br>
                                    <center><input type="submit" value="GUARDAR DATOS" name="guardar" class="btn btn-dark"</center>
                                </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
   
<script>

'use strict';

const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const snap = document.getElementById("snap");
const errorMsgElement = document.querySelector('span#errorMsg');

const constraints = {
  audio: true,
  video: {
    width: 1280, height: 720
  }
};

// Access webcam
async function init() {
  try {
    const stream = await navigator.mediaDevices.getUserMedia(constraints);
    handleSuccess(stream);
  } catch (e) {
    errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
  }
}

// Success
function handleSuccess(stream) {
  window.stream = stream;
  video.srcObject = stream;
}

// Load init
init();

// // Draw image
// var context = canvas.getContext('2d');
// snap.addEventListener("click", function() {
//         context.drawImage(video, 0, 0, 640, 480);
// });
// Draw image
var context = canvas.getContext('2d');
snap.addEventListener("click", function() {
        context.drawImage(video, 0, 0, 640, 480);
});

</script>

