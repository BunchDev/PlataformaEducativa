@extends('profesor.perfil')
{!! Html::script('bower_components/jquery/dist/jquery.min.js')!!}
{!! Html::style('bower_components/bootstrap-material-design-icons/css/material-icons.css') !!}
{!! Html::style('css/adaptaciones.css') !!}
{!! Html::style('css/actividades.css') !!}
{!! Html::script('https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js')!!}


@section('content')

<div class="se-pre-con-irCurso"></div>

<h1>Actividades del Curso</h1>
<br>
<p > Detalles del curso seleccionado:
	{{$DatosCurso->Nombre}}
{{$DatosCurso->Descripcion}}


<div id="ir"></div>

   
<div class="row">
  <div class="col-md-8">
    <div class="round-button"><div class="round-button-circle btn-primary"><a href="javascript:mostrarFormAgregarActividad()" class="round-button"><i class="material-icons">add</i></a></div></div>
  </div>
  <div class="col-md-3 form-group">
 <div class="inner-addon left-addon">
    <i class="fa fa-search"></i>
    <input type="text" id="search" class="form-control" placeholder="Buscar una actividad"/>
</div>
  </div>
</div>


    
  <div class="row-fluid">  
    @foreach($actividades as $actividad)
   
		   <div class="col-md-6"> 
        <div class="actividad" onClick="irActividad({{$actividad->tipo_tecnica}},{{$actividad->idActividad}})">
          <div class="circular">
            @if($actividad->tipo_tecnica == 1)
              <img src="../images/tecnicas/abp.png">
            @endif
            @if($actividad->tipo_tecnica == 2)
              <img  src="../images/tecnicas/ai.png">
            @endif
            @if($actividad->tipo_tecnica == 3)
              <img src="../images/tecnicas/abi.png">
            @endif
            @if($actividad->tipo_tecnica == 4)
              <img  src="../images/tecnicas/resumen.png">
            @endif
            @if($actividad->tipo_tecnica == 5)
              <img src="../images/tecnicas/mapamental.png">
            @endif
            @if($actividad->tipo_tecnica == 6)
              <img src="../images/tecnicas/mapaconceptual.png">
            @endif


            
          </div>

          <h4 class="list-group-item-heading">{{$actividad->Nombre}}</h4>
          <p class="list-group-item-text">{{$actividad->Descripcion}}</p>
          <br>
          <br>
         </div>
         </div>
         
         
      
     
		@endforeach
  </div>
  



<!-- MODAL PARA LA ACTIVIDAD -->
<div class="modal fade large" id="nuevaActividadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel">Nueva Actividad</h3>
      </div>
      <div class="modal-body">
       
<!-- Cuerpo del form -->
<form action="./crearCurso" method="post" id='formCrearCurso'>
  <div id="avisos"></div>
<div class="form-group fmodal">
      <label class="col-md-2 control-label">Nombre *</label>

      <div class="col-md-10" id="actividad">
        <div id="status">
        <input type="text" class="form-control" id="nombreActividad" name="nombre">
        </div>
      </div>

</div>

<!-- Selector de tecnicas -->
<div class="form-group fmodaltec">
      <label class="col-md-2 control-label">Técnica de enseñanza *</label>

      <div class="col-md-10">
        <div id="status">
        <select class="selectpicker" data-width="100%" id="tecnicas" data-size="20">
         
          <option data-content='<div class="row"><div class="col-md-4"><div class="circular"><img src="../images/tecnicas/abp.png"></div></div><div class="col-md-6"><h3>ABP</h3><h5>Aprendizaje Basado en Problemas</h5></div></div>'>1</option>
          <option data-content='<div class="row"><div class="col-md-4"><div class="circular"><img src="../images/tecnicas/ai.png"></div></div><div class="col-md-6"><h3>AI</h3><h5>Aula Invertida</h5></div></div>'>2</option>
          <option data-content='<div class="row"><div class="col-md-4"><div class="circular"><img src="../images/tecnicas/abi.png"></div></div><div class="col-md-6"><h3>ABI</h3><h5>Aprendizaje Basado en Investigación</h5></div></div>'>3</option>
          <option data-content='<div class="row"><div class="col-md-4"><div class="circular"><img src="../images/tecnicas/resumen.png"></div></div><div class="col-md-6"><h3>RESUMEN</h3><h5>Resumen</h5></div></div>'>4</option>
          <option data-content='<div class="row"><div class="col-md-4"><div class="circular"><img src="../images/tecnicas/mapamental.png"></div></div><div class="col-md-6"><h3>MAPA MENTAL</h3><h5>Mapa Mental</h5></div></div>'>5</option>
          <option data-content='<div class="row"><div class="col-md-4"><div class="circular"><img src="../images/tecnicas/mapaconceptual.png"></div></div><div class="col-md-6"><h3>MAPA CONCEPTUAL</h3><h5>Mapa Conceptual</h5></div></div>'>6</option>
        </select>
        </div>
      </div>

</div>

<br>
<br>

<!-- Descripcion texarea-->
<div class="form-group fmodal">
  <div class="row">
  <div class="col-md-2">
    <label class="control-label" for="descripcionActividad">Descripción</label>
  </div>
  <div class="col-md-10">
    <div id="statusTArea">
      <textarea class="form-control col-md-6" rows="3" id="descripcionActividad" name="descripcion"></textarea>
    </div>

  </div>
  </div>
</div>




      <!--Date Picker-->
<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
              <label class="col-md-4 control-label">Fecha de Vencimiento *</label>
                <div class='input-group date' id='fecha'>
                    <input type='text' class="form-control" id="fechaVencimiento">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
      
    </div>
</div>

    <!-- Boton Guardar-->  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar <i class="material-icons">clear</i></button>
        <button type="button" onclick="guardar({{$DatosCurso->idCurso}})" class="btn btn-raised btn-danger" id="guardarActividad">Guardar Actividad <i class="material-icons">save</i></button>
      </div>
      </form>
    </div>
  </div>
</div>
	{!! Html::script('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js')!!}
  {!! Html::script('scripts/validatorJQB.js')!!}
  {!! Html::script('scripts/actividades.js')!!}
  {!! Html::script('scripts/fecha.js')!!}




@endsection





