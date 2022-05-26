<template>
    <div class="container container-persons">
        <nav>
            <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="nuevo-paciente" data-toggle="tab" data-target="#nuevo-paciente-pane" type="button" role="tab" aria-controls="nuevo-paciente-pane" aria-selected="false" href="#nuevo-paciente-pane"><i class="fa-solid fa-user text-gray-1"></i> Nuevo paciente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="historial-tab" data-toggle="tab" data-target="#historial-tab-pane" type="button" role="tab" aria-controls="historial-tab-pane" aria-selected="true" href="#historial-tab-pane"><i class="fas fa-calendar-alt"></i> Historial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" id="agenda-tab" data-toggle="tab" data-target="#agenda-tab-pane" type="button" role="tab" aria-controls="agenda-tab-pane" aria-selected="false" href="#agenda-tab-pane"><i class="fa-solid fa-calendar-days text-gray-1"></i> Agenda</a>
                </li>
            </ul>
        </nav>
        <div class="tab-content" id="nav-tabContent">
           <div class="tab-pane fade" id="nuevo-paciente-pane" role="tabpanel" aria-labelledby="nuevo-paciente-tab" tabindex="0">
               <div class="contenido-tab">
                    <div class="form-group"><!-- Formulario para la creación o modificación de nuestras personas-->
                        <label>Nombre</label>
                        <input v-model="first_name" type="text" class="form-control">

                        <label>Apellido</label>
                        <input v-model="last_name" type="text" class="form-control">

                        <label>Documento</label>
                        <input v-model="document" type="text" class="form-control">

                        <!-- <label>Imagen de perfil</label>
                        <input type="file" class="form-control" @change="ima_profile" multiple>
                        <v-file-input accept="image/*" label="File input"></v-file-input> -->

                        <label>Tipo de perfil</label>
                        <div>Seleccionado el: {{ type_person }}</div>
                        <select v-model="type_person">
                          <option disabled value="">Please select one</option>
                          <option>0</option>
                          <option>1</option>
                        </select>
                    </div>
                    <div class="container-buttons">
                        <!-- Botón que añade los datos del formulario, solo se muestra si la variable update es igual a 0-->
                        <button v-if="update == 0" @click="savePersons()" class="btn btn-success bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Añadir</button>
                        <!-- Botón que modifica la tarea que anteriormente hemos seleccionado, solo se muestra si la variable update es diferente a 0-->
                        <button v-if="update != 0" @click="updatePersons()" class="btn btn-warning bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
                        <!-- Botón que limpia el formulario y inicializa la variable a 0, solo se muestra si la variable update es diferente a 0-->
                        <button v-if="update != 0" @click="clearFields()" class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-toggle="tab" data-target="#historial-tab-pane" type="button" role="tab" aria-controls="historial-tab-pane" aria-selected="true">Atrás</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="historial-tab-pane" role="tabpanel" aria-labelledby="historial-tab" tabindex="0">
                <div class="contenido-tab">
                    <div class="item-list" v-for="persons in arrayPersons" :key="persons.id">
                        <div class="image-item">
                            <img src="" v-text="persons.ima_profile">                            
                        </div>
                        <div class="info-item">
                            <span v-text="persons.first_name"></span>
                            <span v-text="persons.last_name"></span>
                        </div>
                        <div class="documento-item">
                            <span v-text="persons.document" class="text-gray-4"></span>
                            <!--span v-text="persons.type_person" class="text-gray-1"></span-->
                        </div>
                        <div class="button-item">
                            <button class="bg-transparent hover:bg-blue-500 font-semibold hover:text-white py-2 px-4 border  rounded" @click="deletePersons(persons)">Borrar</button>
                            <button data-toggle="tab" data-target="#nuevo-paciente-pane" type="button" role="tab" aria-controls="nuevo-paciente-pane" aria-selected="false" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="loadFieldsUpdate(persons)">Ver</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="agenda-tab-pane" role="tabpanel" aria-labelledby="agenda-tab" tabindex="0">
                <!-- ... -->
            </div>
       </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }


</script>
<script>
    export default {
        data(){
            return{
                first_name:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                last_name:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                document:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                type_person:"", //Esta variable, mediante v-model esta relacionada con el input del formulario
                update:0, /*Esta variable contrarolará cuando es una nueva persona o una modificación, si es 0 significará que no hemos seleccionado
                          ninguna persona, pero si es diferente de 0 entonces tendrá el id de la persona y no mostrará el boton guardar sino el modificar*/
                arrayPersons:[], //Este array contendrá las persons de nuestra bd
            }
        },
        methods:{
            getPersons(){
                let me =this;
                let url = '/persons' //Ruta que hemos creado para que nos devuelva todas las persons
                axios.get(url).then(function (response) {
                    //creamos un array y guardamos el contenido que nos devuelve el response
                    me.arrayPersons = response.data;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            savePersons(){
                let me =this;
                let url = '/persons/guardar' //Ruta que hemos creado para enviar una persona y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la persona
                    'first_name':this.first_name,
                    'last_name':this.last_name,
                    'document':this.document,
                    'type_person':this.type_person,
                }).then(function (response) {
                    me.getPersons();//llamamos al metodo getpersons(); para que refresque nuestro array y muestro los nuevos datos
                    me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });   

            },
            updatePersons(){/*Esta funcion, es igual que la anterior, solo que tambien envia la variable update que contiene el id de la
                persona que queremos modificar*/
                let me = this;
                axios.put('/persons/actualizar',{
                    'id':this.update,
                    'first_name':this.first_name,
                    'last_name':this.last_name,
                    'document':this.document,
                    'type_person':this.type_person,
                }).then(function (response) {
                   me.getPersons();//llamamos al metodo getpersons(); para que refresque nuestro array y muestro los nuevos datos
                   me.clearFields();//Limpiamos los campos e inicializamos la variable update a 0
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadFieldsUpdate(data){ //Esta función rellena los campos y la variable update, con la persona que queremos modificar
                this.update = data.id
                let me =this;
                let url = '/persons/buscar?id='+this.update;
                axios.get(url).then(function (response) {
                    me.first_name= response.data.first_name;
                    me.last_name= response.data.last_name;
                    me.document= response.data.document;
                    me.type_person= response.data.type_person;

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                }); 
            },
            deletePersons(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará la persona que hemos elegido
                let me =this;
                let persons_id = data.id
                if (confirm('¿Seguro que deseas borrar esta persona?')) {
                    axios.delete('/persons/borrar/'+persons_id
                    ).then(function (response) {
                        me.getPersons();
                    })
                    .catch(function (error) {
                        console.log(error);
                    }); 
                }
            },
            clearFields(){/*Limpia los campos e inicializa la variable update a 0*/
                this.first_name = "";
                this.last_name = "";
                this.document = "";
                this.type_person = "";
                this.update = 0;
            }
        },
        mounted() {
           this.getPersons();
        }
    }
</script>
