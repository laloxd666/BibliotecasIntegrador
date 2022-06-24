@extends('layout.master')
@section('titulo','CRUD AUTORES')
@section('contenido')

<!-- inicia vue -->
<div id="autor">

	<!-- <div class="row">
			<div class="col-md-8">
				<input type="number" placeholder="cantidad" class="form-control" v-model="cantidad"><br>
				<input type="number" placeholder="precio" class="form-control" v-model="precio"><br>

				<h5>TOTAL: @{{total}}</h5>
			</div>
			</div> -->

	<div class="row">
		<div class="col-md-8">

		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card card-secondary">
				<div class="card-header">
					<h3>CRUD AUTOR
						<span class="btn btn-sm btn-primary" @click="mostrarModal()">
							<i class="fas fa-plus"></i>
						</span>
					</h3>
					<div class="col-md-6">
						<input type="text" placeholder="Escriba el nombre de un autor" class="form-control" v-model="buscar">
					</div>
				</div>

				<div class="card-body">

					<!-- inicio de la tabla-->
					<table class="table table-bordered table-striped">
						<thead>
							<th hidden="">ID AUTOR</th>
							<th>NOMBRE</th>
							<th>APELLIDOS</th>

						</thead>

						<tbody>
							<tr v-for="autor in filtroAutores">
								<td hidden="">@{{autor.id_autor}}</td>
								<td>@{{autor.nombre}}</td>
								<td>@{{autor.apellidos}}</td>


								<td>
									<button class="btn btn-sm" @click="editandoAutor(autor.id_autor)">
										<i class="fas fa-pen"></i>
									</button>

									<button class="btn btn-sm" @click="eliminarAutor(autor.id_autor)">
										<i class="fas fa-trash"></i>
									</button>
								</td>
							</tr>
						</tbody>
					</table>
					<!--fin de tabla-->
				</div>

			</div>
			<!--fin de col-md-12-->
		</div>

		<!--inicio ventana Modal -->
		<div class="modal fade" id="modalAutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel" v-if="agregando==true">AGREGANDO AUTOR</h5>
						<h5 class="modal-title" id="exampleModalLabel" v-if="agregando==false">EDITANDO AUTOR</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">


						<input type="text" class="form-control" placeholder="Nombre del autor" v-model="nombre"><br>
						<input type="text" class="form-control" placeholder="Apellidos del autor" v-model="apellidos"><br>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary" @click="guardarAutor" v-if="agregando==true">Guardar</button>
						<button type="button" class="btn btn-primary" @click="actualizarAutor" v-if="agregando==false">Guardar</button>
					</div>
				</div>
			</div>
		</div>
		<!--final de modal-->
	</div>
	<!-- termina vue-->
	@endsection

	@push('scripts')
	<script type="text/javascript" src="js/vue-resource.js"></script>
	<script type="text/javascript" src="js/apis/apiAutor.js"></script>
	@endpush

	<input type="hidden" name="route" value="{{url('/')}}">