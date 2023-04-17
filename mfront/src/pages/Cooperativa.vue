<template>
  <q-page>
  <q-table title="Registro de Cooperativas" 
  :filter="cooperativaFilter"
  :columns="cooperativaColum" 
  :rows="cooperativa"
  
  >
  <template v-slot:top-right>
      <q-btn @click="cooperativaDialog=true" color="green" icon="add" label="Registrar"  />
        <q-input borderless dense debounce="300" v-model="cooperativaFilter" placeholder="Buscar">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
  </template>
  <template v-slot:body-cell-opcion="props">
    <q-td :props="props">
      <q-btn dense @click="cooperativaEdit (props.row)" color="yellow" icon="edit"></q-btn>
      <q-btn dense @click="cooperativaDelete (props.row)" color="red" icon="delete"></q-btn>
      <q-btn dense @click="cooperativaDesc (props.row)" color="blue" icon="rule"></q-btn>
    </q-td>

  </template>
</q-table>
<q-dialog v-model="cooperativaDialog">
  <q-card>
    <q-card-section>
      <div class="text-h6">Agregar Cooperativa</div>
    </q-card-section>
    <q-card-section>
    <q-form @submit="cooperativaCreate">
      <q-input outlined v-model="cooperativ.nombre" label="Nombre Cooperativa"></q-input>
      <q-input outlined v-model="cooperativ.direccion" label="Direccion Cooperativa"></q-input>
      <q-input outlined v-model="cooperativ.representante" label="Representante Cooperativa"></q-input>
      <q-input outlined v-model="cooperativ.nim" label="NIM Cooperativa"></q-input>
      <q-input outlined v-model="cooperativ.nit" label="NIT Cooperativa"></q-input>
      <q-input outlined v-model="cooperativ.celular" label="Celular Cooperativa"></q-input>
<!--      <q-input outlined v-model="cooperativ.estado" label="Estado Cooperativa"></q-input>-->
      <q-select outlined v-model="cooperativ.estado" :options="estados" label="Estado"></q-select>
      
      <q-btn type="submit" class="full-width" color="green" label="Guardar" icon="check" ></q-btn>
    </q-form>
  </q-card-section>
  </q-card>
  
</q-dialog>
  
  

    
    <div class="q-pa-md" hidden >
    <q-markup-table>
      <thead>
        <tr>
          <th class="text-left">Nro</th>
          <th class="text-left">Cooperativa</th>
          <th class="text-left">Direccion</th>
          <th class="text-left">Representante</th>
          <th class="text-left">NIM</th>
          <th class="text-left">NIT</th>
          <th class="text-left">CELULAR</th>
          <th class="text-left"> ESTADO</th>
          <th class="text-left">FECHA</th>
          <th class="text-left">OPCIONES</th>
        </tr>
      </thead>
      <thead v-for="(c,i) in cooperativa" :key="i">
        <tr>
            <th class="text-left">{{c.id}}</th>
            <th class="text-left">{{c.nombre}}</th>
            <th class="text-left"> {{c.direccion}}</th>
            <th class="text-left">{{c.representante}}</th>
            <th class="text-left">{{c.nim}}</th>
            <th class="text-left">{{c.nit}}</th>
            <th class="text-left">{{c.celular}}</th>
            <th class="text-left">{{c.estado}}</th>
            <th class="text-left">{{c.fecha}}</th>
            <th class="text-left"></th>
        </tr>
    </thead>
      <tbody>
       
      </tbody>
    </q-markup-table>
  </div>
</q-page>
  
  </template>
  
  <script>
import {date} from 'quasar'

  export default{
    name: 'IndexPage',
    data () {
              return{
                estados:['ACTIVO', 'PASIVO'],
                cooperativaFilter:'',
                cooperativaDialog:false,
                cooperativa:[],
                cooperativ:{},
                cooperativaColum:[
                {name:'opcion', label:'Opcion', field:'opcion', sortable:true},
                {name:'id', label:'Numero', field:'id', sortable:true},
                {name:'nombre', label:'Nombre', field:'nombre', sortable:true},
                {name:'direccion', label:'Direccion', field:'direccion', sortable:true},
                {name:'representante', label:'Representante', field:'representante', sortable:true},
                {name:'nim', label:'NIM', field:'nim', sortable:true},
                {name:'nit', label:'NIT', field:'nit', sortable:true},
                {name:'celular', label:'Celular', field:'celular', sortable:true},
                {name:'estado', label:'Estado', field:'estado', sortable:true},
               
                ]  
                    }
            },
    
    created(){
      //this.$api.get('http://localhost:8000/api/cooperativa').then((response)=>{ 
       // this.cooperativa=response.data
       //})
       this.cooperativaAll();
    },
    methods:{
      cooperativaDesc(cp){
        this.$api.post('activar/'+cp.id).then((response)=>{ 
            this.cooperativaAll();

        })

      },
      cooperativaAll(){
      //this.q.loading.show()  
      this.$api.get('cooperativa').then((response)=>{ 
        this.cooperativa=response.data
           })
            },
      cooperativaCreate(){
        if(this.cooperativ.id=='' || this.cooperativ.id==undefined){
      this.$api.post('cooperativa' , this.cooperativ).then((response)=>{ 
        this.cooperativaDialog=false;
        this.cooperativaAll();
           })
          }
           else{
            this.$api.put('cooperativa/'+this.cooperativ.id , this.cooperativ).then((response)=>{ 
        this.cooperativaDialog=false;
        this.cooperativaAll();
           })
           }
            },
      cooperativaDelete(row) {
      if(confirm('Esta seguro de eliminar la cooperativa')){
        this.$api.delete('cooperativa/'+row.id).then((response)=>{ 
        this.cooperativaAll();
           })
            }         
         },
      cooperativaEdit(row){
        this.coopeerativ=row;
        this.cooprativaDialog=true;
      }  

        }   
  }
  </script>