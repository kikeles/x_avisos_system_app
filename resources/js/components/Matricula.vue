<template>
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Matricula
                <button type="button" @click="abrirModal('matricula', 'registrar')" class="btn btn-secondary">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </button>
            </div>
            <div class="card-body">
                <!--
                    Buscar
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <select class="form-control col-md-3" v-model="criterio">
                                    <option value="nombre">Carrera</option>
                                    <option value="num_grados">No. Grados</option>
                                </select>
                                <input type="text" v-model="buscar" @keyup.enter="listarMatricula(1, buscar, criterio)" class="form-control" placeholder="Texto a buscar">
                                <button type="submit" @click="listarMatricula(1, buscar, criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </div>
                -->
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>Matricula</th>
                            <th>Carrera</th>
                            <th>Condicion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- vista de los elementos de la tabla Carreras -->
                        <tr v-for="matricula in arrayMatricula" :key="matricula.id">
                            <td>
                                <!--
                                    <button type="button" @click="abrirModal('matricula', 'actualizar', matricula)" class="btn btn-warning btn-sm">
                                        <i class="icon-pencil"></i>
                                    </button> &nbsp;
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar">
                                        <i class="icon-trash"></i>
                                    </button>
                                -->
                            </td>
                            <th v-text="matricula.matricula"></th>
                            <th v-text="matricula.carrera_id"></th>
                            <th>
                                <div v-if="matricula.condicion">
                                    <button type="button" class="badge badge-success" id="btn-activo">
                                        Activo
                                    </button>
                                </div>
                                <div v-else>
                                    <button type="button" class="badge badge-danger">
                                        Desactivado
                                    </button>
                                </div>
                            </th>
                        </tr>
                        <!-- vista de los elementos de la tabla Carreras -->
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <li class="page-item" v-if="pagination.current_page > 1">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1, buscar, criterio)">Ant</a>
                        </li>
                        <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(page, buscar, criterio)" v-text="page"></a>
                        </li>
                        <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                            <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1, buscar, criterio)">Sig</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar/actualizar-->
    <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" v-text="tituloModal"></h4>
                    <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <!-- inputs del Modal agregar -->
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Matricula</label>
                            <div class="col-md-9">
                                <input type="text" v-model="matricula" class="form-control" placeholder="Matricula del alumno">
                            </div>
                        </div>
                        <!-- inputs del Modal agregar -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                    <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarMatricula()">Guardar</button>
                    <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarMatricula()">Actualizar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
    <!-- Inicio del modal Eliminar -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar matricula</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Estas seguro de eliminar la matricula?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Fin del modal Eliminar -->
    
</main>
</template>

<script>
    export default {
        data(){
            return{
                matricula_id : 0,
                matricula : '',
                carrera_id : '',
                condicion: 0, // edit only
                   
                arrayMatricula : [],            
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorMatricula : 0,
                errorMostrarMsjMatricula : [],
                pagination:{
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'nombre',
                buscar : ''
            }
        },
        computed : {
            isActived: function(){
                return this.pagination.current_page;
            },
            //calcula los elementos de la funcion
            pagesNumber: function(){
                if(!this.pagination.to){
                    return [];
                }

                var from = this.pagination.current_page - this.offset;
                if(from < 1){
                    from = 1;
                }

                var to = from + (this.offset * 2);
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }

                var pagesArray = [];
                while(from <= to){
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        methods : {
            listarMatricula(page, buscar, criterio){
                let me = this;
                var url = '/matricula?page=' + page + '&buscar=' + buscar + '&criterio=' + criterio;
                //devuelve lo que regresa el controlador de la url /matricula
                axios.get(url).then(function (response) {
                    var respuesta = response.data;
                    me.arrayMatricula = respuesta.matriculas.data;
                    me.pagination = respuesta.pagination;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
            cambiarPagina(page, buscar, criterio){
                let me = this;
                //actualiza la pagina actual
                me.pagination.current_page = page;
                //Envia la peticion para visualizar la data de esa pagina
                me.listarMatricula(page, buscar, criterio);
            },
            obtenerPlanEstudio(event){
                this.tipo_plan = event.target.value;
            },
            registrarMatricula(){
                if(this.validarMatricula()){
                    return;
                }
                
                let me = this;
                axios.post('/matricula/registrar', {
                    'matricula' : this.matricula,
                    'carrera_id' : 1
                }).then(function (response){
                    me.cerrarModal();
                    me.listarMatricula(1, '', 'matricula');
                }).catch(function (error){
                    console.log(error)
                });
            },
            actualizarMatricula(){
                if(this.validarMatricula()){
                    return;
                }
                
                let me = this;
                axios.put('/matricula/actualizar', {
                    'matricula' : this.matricula,
                    'carrera_id' : this.carrera_id,
                    'condicion' : this.condicion,
                    'id' : this.matricula_id
                }).then(function (response){
                    me.cerrarModal();
                    me.listarMatricula(1, '', 'matricula');
                }).catch(function (error){
                    console.log(error)
                });
            },
            validarMatricula(){
                this.errorMatricula = 0;
                this.errorMostrarMsjMatricula = [];

                if(!this.matricula){
                    this.errorMostrarMsjMatricula.push("La matricula no puede estar vacío");
                }

                if(this.errorMostrarMsjMatricula.length){
                    this.errorMatricula = 1;
                }

                return this.errorMatricula;

            },
            cerrarModal(){
                this.modal = 0;
                this.tituloModal = '';
                this.matricula = '';
                this.carrera_id = '';
                this.condicion = 0;
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "matricula":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Matricula';
                                this.nombre = '';
                                this.tipo_plan = '';
                                this.num_grados = '';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                this.modal=1;
                                this.tituloModal = 'Actualizar Matricula';
                                this.tipoAccion = 2;
                                this.matricula_id = data['id'];
                                this.matricula = data['matricula'];
                                this.carrera_id = data['carrera_id'];
                                this.condicion = data['condicion'];
                                break;
                            }
                        }

                    }
                }

            }
        },
        mounted() {
            this.listarMatricula(1, this.buscar, this.criterio);
        }
    }
</script>

<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #110f0fc0  !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
    button{
        background: none;
        color: inherit;
        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        outline: inherit;
    }
</style>
