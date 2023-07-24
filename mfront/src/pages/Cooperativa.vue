<template>
  <q-page>
  <q-table title="Registro de Cooperativas"
  :filter="cooperativaFilter"
  :columns="cooperativaColum"
  :rows="cooperativa"
  >
  <template v-slot:top-right>
      <q-btn @click="cooperativaDialog=true" color="green" icon="add_circle_outline" label="Registrar" no-caps />
        <q-input outlined dense debounce="300" v-model="cooperativaFilter" placeholder="Buscar">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
  </template>
  <template v-slot:body-cell-opcion="props">

    <q-td :props="props">
      <q-btn-dropdown color="red" label="OPCION">
        <q-list>
          <q-item clickable v-close-popup @click="cooperativaEdit (props.row)">
            <q-item-section>
              <q-item-label>
                  Editar
            </q-item-label>
            </q-item-section>
          </q-item>

          <q-item clickable v-close-popup @click="cooperativaDelete (props.row)">
            <q-item-section>
              <q-item-label>Eliminar</q-item-label>
            </q-item-section>
          </q-item>

          <q-item clickable v-close-popup @click="cooperativaDesc (props.row)">
            <q-item-section>
              <q-item-label>Activar</q-item-label>
            </q-item-section>
          </q-item>
          <q-item clickable v-close-popup @click="verDescuento(props.row)">
            <q-item-section>
              <q-item-label>Descuentos</q-item-label>
            </q-item-section>
          </q-item>
        </q-list>
      </q-btn-dropdown>


    </q-td>

  </template>
</q-table>
<q-dialog v-model="cooperativaDialog">
  <q-card>
    <q-card-section>
      <div class="text-h6">Agregar Cooperativa</div>
    </q-card-section>
    <q-card-section class="q-pt-none">
    <q-form @submit="cooperativaCreate">
      <q-input dense outlined v-model="cooperativ.nombre" label="Nombre Cooperativa"></q-input>
      <q-input dense outlined v-model="cooperativ.direccion" label="Direccion Cooperativa"></q-input>
      <q-input dense outlined v-model="cooperativ.representante" label="Representante Cooperativa"></q-input>
      <q-input dense outlined v-model="cooperativ.nim" label="NIM Cooperativa"></q-input>
      <q-input dense outlined v-model="cooperativ.nit" label="NIT Cooperativa"></q-input>
      <q-input dense outlined v-model="cooperativ.celular" label="Celular Cooperativa"></q-input>
<!--      <q-input dense outlined v-model="cooperativ.estado" label="Estado Cooperativa"></q-input>-->
      <q-select dense outlined v-model="cooperativ.estado" :options="estados" label="Estado"></q-select>

      <q-btn type="submit" class="full-width" color="green" label="Guardar" icon="check" ></q-btn>
    </q-form>
  </q-card-section>
  </q-card>
</q-dialog>

<q-dialog v-model="descuentoDialog">
  <q-card>
    <q-card-section>
      <div class="text-h6">Regsitro Descuento</div>
    </q-card-section>
    <q-card-section>
    <q-form @submit="descuentoCreate">
      <div class="row">
        <div class="col-3"><q-input dense outlined v-model="descuento.nombre" label="Nombre" required/></div>
        <div class="col-3"><q-input dense outlined v-model="descuento.porcentaje" step="0.01" type="number" label="Porcentaje" /></div>
        <div class="col-3"><q-input dense outlined v-model="descuento.fijo" step="0.1" type="number" label="fijo" /></div>
        <div class="col-3"><q-btn type="submit" class="full-width" color="green" label="Guardar" icon="check" dense /></div>
    </div>
    </q-form>
    <q-table  :rows="descuentos" :columns="columns" row-key="name" />


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
                columns:[
                  {field:'op',name:'op',label:'op'},
                  {field:'nombre',name:'nombre',label:'NOMBRE'},
                  {field:'porcentaje',name:'porcentaje',label:'PORCENT'},
                  {field:'fijo',name:'fijo',label:'FIJO'},
                  {field:'activo',name:'activo',label:'ACTIVO'},
                ],
                descuentos:[],
                descuento:{},
                descuentoDialog:false,
                estados:['ACTIVO', 'PASIVO'],
                cooperativaFilter:'',
                cooperativaDialog:false,
                cooperativa:[],
                cooperativ:{},
                coop:{},
                cooperativaColum:[
                {name:'opcion', label:'Opcion', field:'opcion', sortable:true},
                //{name:'id', label:'Numero', field:'id', sortable:true},
                {name:'nombre', label:'Nombre', field:'nombre', sortable:true},
                //{name:'direccion', label:'Direccion', field:'direccion', sortable:true},
                {name:'representante', label:'Representante', field:'representante', sortable:true},
                //{name:'nim', label:'NIM', field:'nim', sortable:true},
                //{name:'nit', label:'NIT', field:'nit', sortable:true},
                //{name:'celular', label:'Celular', field:'celular', sortable:true},
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
      descuentoCreate(){
        if(this.descuento.porcentaje=='' || this.descuento.porcentaje==undefined)
          this.descuento.porcentaje=0
        if(this.descuento.fijo=='' || this.descuento.fijo==undefined)
          this.descuento.fijo=0

        this.descuento.cooperativa_id=this.coop.id
        this.$api.post('descuento/',this.descuento).then((response)=>{
            console.log(response.data)
            this.verDescuento(this.coop)
            this.descuento={}
        })

      },
      verDescuento(cp){
        this.coop=cp
        this.$api.post('listDescuento/'+cp.id).then((response)=>{
          this.descuentos=response.data
          this.descuentoDialog=true;
        })
      },
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
        this.$q.dialog({
          title: 'Confirmar',
          message: 'Esta seguro de eliminar la cooperativa?',
          cancel: true,
          persistent: true
        }).onOk(() => {
          this.$api.delete('cooperativa/'+row.id).then((response)=>{
            this.cooperativaAll();
          })
        })
      },
      cooperativaEdit(row){
        this.cooperativ=row;
        this.cooperativaDialog=true;
      }

        }
  }
  </script>
