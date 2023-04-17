<template>
  <q-page>
    <div class="q-pa-md">
    <h4>REGISTRO DE CLIENTES</h4>
    <q-table title="Clientes" :rows="clientes" :columns="colcliente" row-key="name" :filter="clienteFilter">
      <template v-slot:top-right>
        <q-btn @click="dialogCliente=true; cliente={}" color="green" icon="add" label="Registrar"  />
          <q-input borderless dense debounce="300" v-model="clienteFilter" placeholder="Buscar">
            <template v-slot:append>
              <q-icon name="search" />
            </template>
          </q-input>
    </template>
    <template v-slot:body-cell-opcion="props">
      <q-td :props="props">
        <q-btn dense @click="clienteEdit (props.row)" color="yellow" icon="edit"></q-btn>
        <q-btn dense @click="clienteDelete (props.row)" color="red" icon="delete"></q-btn>
        <q-btn dense @click="clienteDesc (props.row)" color="blue" icon="rule"></q-btn>
      </q-td>
  
    </template>
      </q-table>
      <q-dialog v-model="dialogCliente">
        <q-card>
          <q-card-section>
            <div class="text-h6">Agregar Cliente</div>
          </q-card-section>
          <q-card-section>
          <q-form @submit="clienteCreate">
            <q-input outlined v-model="cliente.ci" label="Cedula de Identidad"/>
            <q-input outlined v-model="cliente.nombre" label="Nombre Completo"/>
            <q-input outlined v-model="cliente.telefono" label="Telefono"/>
            <q-input outlined v-model="cliente.celular" label="Celular"/>
            <q-select outlined v-model="cooperativa" label=" Cooperativa" :options="cooperativas"/>
            
            <q-btn type="submit" class="full-width" color="green" label="Guardar" icon="check" ></q-btn>
          </q-form>
        </q-card-section>
        </q-card>
        
      </q-dialog>

      <q-dialog v-model="dialogEdit">
        <q-card>
          <q-card-section>
            <div class="text-h6">Modificar Cliente</div>
          </q-card-section>
          <q-card-section>
          <q-form @submit="clienteMod">
            <q-input outlined v-model="cliente2.ci" label="Cedula de Identidad"/>
            <q-input outlined v-model="cliente2.nombre" label="Nombre Completo"/>
            <q-input outlined v-model="cliente2.telefono" label="Telefono"/>
            <q-input outlined v-model="cliente2.celular" label="Celular"/>
            <q-select outlined v-model="cooperativa" label=" Cooperativa" :options="cooperativas"/>
            
            <q-btn type="submit" class="full-width" color="yellow" label="Guardar" icon="check" ></q-btn>
          </q-form>
        </q-card-section>
        </q-card>
        
      </q-dialog>
  </div>
    </q-page>
  </template>
  
  <script>
import {date} from 'quasar'
  export default{
    name: 'clientePage',
    data () {
    return{
      clienteFilter:'',
      dialogCliente:false,
      dialogEdit:false,
      clientes:[],
      cooperativas:[],
      cooperativa:{label:''},
      cliente:{},
      cliente2:{},
      colcliente:[
        {name:'opcion',field:'opcion',label:'opcion'},
        {name:'id',field:'id',label:'id'},
        {name:'nombre',field:'nombre',label:'nombre'},
        {name:'ci',field:'ci',label:'ci'},
        {name:'telefono',field:'telefono',label:'telefono'},
        {name:'celular',field:'celular',label:'celular'},
        {name:'activo',field:'activo',label:'activo'},
        {name:'cooperativa',field:row=>row.cooperativa.nombre,label:'cooperativa'},
      ]
          }
    },

    created(){
      this.getCooperativas()
      this.getCliente()
    },
    methods:{
      clienteMod(){
        if(this.cooperativa=={label:''})
        {
          return false
        }
        this.cliente2.cooperativa_id=this.cooperativa.id
        this.$api.put('cliente/'+this.cliente2.id,this.cliente2).then((response)=>{ 
          this.dialogEdit=false
          this.getCliente()
        })
      },
      clienteEdit(cl){
        this.cliente2=cl
        this.cooperativa=cl.cooperativa
        this.cooperativa.label=this.cooperativa.nombre
        console.log(this.cooperativa)
        this.dialogEdit=true
      },
      clienteDelete(row) {
      if(confirm('Esta seguro de eliminar la cliente')){
        this.$api.delete('cliente/'+row.id).then((response)=>{ 
        this.getCliente();
           })
            }         
         },
      clienteDesc(cp){
        this.$api.post('activarCliente/'+cp.id).then((response)=>{ 
            this.getCliente();
        })
      },
      clienteCreate(){
        if(this.cooperativa=={label:''})
        {
          return false
        }
        this.cliente.cooperativa_id=this.cooperativa.id
        this.cliente.fecha= date.formatDate( Date.now(),'YYYY-MM-DD HH:mm:ss.sss')
        this.$api.post('cliente',this.cliente).then((response)=>{ 
          this.dialogCliente=false
          this.getCliente()
        })

      },
      getCooperativas(){
        this.cooperativas=[]
        this.$api.get('cooperativa').then((response)=>{ 
          response.data.forEach(x => {
            x.label=x.nombre
            this.cooperativas.push(x)
          });
        })

      },
      getCliente(){
        this.$api.get('cliente').then((response)=>{ 
          this.clientes=response.data
        })

      }
            },
  }
  </script>
  