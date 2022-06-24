var ruta = document.querySelector("[name=route]").value;

var apiAutor=ruta + '/api/apiAutor';


new Vue({

	http: {
      headers: {
        'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
      }
    },


	el:"#autor",

	data:{
		autores:[],
		nombre:'',
		apellidos:'',
		agregando:true,
		id_autor: '',
		buscar:'',
		




	},

	//AL CREARSE LA PAGINA
	created:function(){
		this.obtenerAutores();
	;
		

			},

	methods:{
		obtenerAutores:function (){
			this.$http.get(apiAutor).then(function(json){
				this.autores=json.data;
				console.log(json.data);
			}).catch(function(json){
				console.log(json);
			})
		},
	

		mostrarModal:function(){
			this.agregando=true;
			this.nombre='';
			this.apellidos='';
			
			

			

			$('#modalAutor').modal('show');
		},

		guardarAutor:function(){

			// se construye el json para enviar al controlador
			var autor={nombre:this.nombre,
				apellidos:this.apellidos
			

			};

			//se envia los datos del json al controlador
			this.$http.post(apiAutor,autor).then(function(j){
				this.obtenerAutores();
				this.nombre='';
				this.apellidos='';
			
		

			}).catch(function(j){
				console.log(j);
			});


			$('#modalAutor').modal('hide');

			console.log(autor);



		},

			//funcion para eliminar
		eliminarAutor:function(id){
			var confir= confirm('¿Esta seguro de eliminar el autor?');

			if (confir)
			{
				this.$http.delete(apiAutor + '/' + id).then(function(json){
					this.obtenerAutores();
				}).catch(function(json){

				});
			}
		},


		editandoAutor:function(id){
			this.agregando=false;
			this.id_autor=id;

			this.$http.get(apiAutor + '/' + id).then(function(json){
				this.nombre=json.data.nombre;
				this.apellidos=json.data.apellidos;
				

			});

			$('#modalAutor').modal('show');

		},

		actualizarAutor:function(){
			
			var jsonAutor = {nombre:this.nombre,
								apellidos:this.apellidos	
	
								};

			this.$http.patch(apiAutor + '/' + this.id_autor,jsonAutor).then(function(json){
				this.obtenerAutores();

			});

			$('#modalAutor').modal('hide');
		},

		

	},
	//FIN DE MITHODS

	//inicio de reaccion automatica
	computed: {
		//filtrar a los autores
		filtroAutores: function () {
			return this.autores.filter((autor) => {
				return autor.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) ||
					autor.apellidos.toLowerCase().match(this.buscar.toLowerCase().trim())
			});
		}


	}
	//fin computed

});
