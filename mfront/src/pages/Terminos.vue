<template>
    <q-page>
    <q-table title="Registro de Terminos de Compra"
              :filter="terminoFilter"
              :columns="terminoColum"
              :rows="termino"
              :rows-per-page-options="[0]"
    >
    <template v-slot:top-right>
        <q-btn @click="terminoDialog=true; moditerm=true" color="green" icon="add_circle_outline" label="Registrar" no-caps />
          <q-input outlined dense debounce="300" v-model="terminoFilter" placeholder="Buscar">
            <template v-slot:append>
              <q-icon name="search" />
            </template>
          </q-input>
    </template>
    <template v-slot:body-cell-opcion="props">
  
      <q-td :props="props" auto-width>
        <q-btn-dropdown color="red" label="OPCION">
          <q-list>
            <q-item clickable v-close-popup @click="terminoEdit (props.row)" >
              <q-item-section>
                <q-item-label>
                    Editar
              </q-item-label>
              </q-item-section>
            </q-item>
  
            <q-item clickable v-close-popup @click="terminoDelete (props.row)">
              <q-item-section>
                <q-item-label>Eliminar</q-item-label>
              </q-item-section>
            </q-item>
  
         
          </q-list>
        </q-btn-dropdown>
  
  
      </q-td>
  
    </template>
  </q-table>
  <q-dialog v-model="terminoDialog">
    <q-card>
      <q-card-section>
        <div class="text-h6">Agregar Terminos de Compra</div>
      </q-card-section>
      <q-card-section class="q-pt-none">
      <q-form @submit="terminoCreate">
        <q-input color="teal" dense outlined v-model="termin.nombre" label="Nombre Termino"></q-input>
        <q-input color="purple-12" dense outlined v-model="termin.plataPagable" label="Plata pagable"></q-input>
        <q-input dense outlined v-model="termin.plomoPagable" label="Plomo pagable"></q-input>
        <q-input dense outlined v-model="termin.zincPagable" label="Zinc pagable"></q-input>
        <q-input dense outlined v-model="termin.refino" label="Refinacion"></q-input>
        <q-input dense outlined v-model="termin.maquila" label="Maquila"></q-input>
        <q-input dense outlined v-model="termin.base" label="Base"></q-input>
        <q-input dense outlined v-model="termin.transporte" label="Transporte"></q-input>
        <q-btn type="submit" class="full-width" color="green" label="Guardar" icon="check" ></q-btn>
      </q-form>
    </q-card-section>
    </q-card>
  </q-dialog>
  
  
  
  
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
                    {field:'plomoPagable',name:'Plomo Pagable',label:'PLOMO'},
                    {field:'zincPagable',name:'Zinc',label:'ZINC'},
                    {field:'plataPagable',name:'Plata',label:'PLATA'},
                    {field:'refino',name:'Refinacion',label:'REFINACION'},
                    {field:'maquila',name:'Maquila',label:'MAQUILA'},
                    {field:'transporte',name:'Transporte',label:'TRANSPORTE'},
                    {field:'base',name:'Base',label:'BASE'},
                  ],
                   termino:[],
                   //termino:{},
                   //terminoDialog:false,
                   estados:['ACTIVO', 'PASIVO'],
                   terminoFilter:'',
                   terminoDialog:false,
                   moditerm:false,
                  // termin:[],
                   termin:{},
                   //termin2:{},
                   //term:{},
                   terminoColum:[
                   {name:'opcion', label:'Opcion', field:'opcion', sortable:true},
                   //{name:'id', label:'Numero', field:'id', sortable:true},
                   {name:'nombre', label:'Nombre', field:'nombre', sortable:true},
                   {name:'plataPagable', label:'Plata', field:'plataPagable', sortable:true},
                   {name:'plomoPagable', label:'Plomo', field:'plomoPagable', sortable:true},
                   {name:'zincPagable', label:'Zinc', field:'zincPagable', sortable:true},
                   {name:'refino', label:'Refinacion', field:'refino', sortable:true},
                   {name:'maquila', label:'Maquila', field:'maquila', sortable:true},
                   {name:'transporte', label:'Transporte', field:'transporte', sortable:true},
                   {name:'base', label:'Base', field:'base', sortable:true},
                   ]
                       }
              },
  
      created(){
        //this.$api.get('http://localhost:8000/api/cooperativa').then((response)=>{
         // this.cooperativa=response.data
         //})
         this.terminoAll();
      },
      methods:{
        // descuentoCreate(){
        //   if(this.descuento.porcentaje=='' || this.descuento.porcentaje==undefined)
        //     this.descuento.porcentaje=0
        //   if(this.descuento.fijo=='' || this.descuento.fijo==undefined)
        //     this.descuento.fijo=0
  
        //   this.descuento.cooperativa_id=this.coop.id
        //   this.$api.post('descuento/',this.descuento).then((response)=>{
        //   this.$api.post('descuento/',this.descuento).then((response)=>{
        //       console.log(response.data)
        //       this.verDescuento(this.coop)
        //       this.descuento={}
        //   })
  
        // },
        // verDescuento(cp){
        //   this.coop=cp
        //   this.$api.post('listDescuento/'+cp.id).then((response)=>{
        //     this.descuentos=response.data
        //     this.descuentoDialog=true;
        //   })
        // },
        // cooperativaDesc(cp){
        //   this.$api.post('activar/'+cp.id).then((response)=>{
        //       this.cooperativaAll();
  
        //   })
  
        // },
       terminoAll(){
        //this.q.loading.show() 
        this.$api.get('termino').then((response)=>{
          this.termino=response.data
             })
              },
        terminoCreate(){
          //this.$q.loading.show()
          if (this.moditerm)
          //{
            //if(this.cooperativ.id=='' || this.cooperativ.id==undefined)
            {
        this.$api.post('termino' , this.termin).then((response)=>{
          this.terminoAll();
          this.terminoDialog=true;
          this.termin={};
          this.terminoDialog=false;
          
              })
             }
            //}
            else
             {
              this.$api.put('termino/'+this.termin.id , this.termin).then((response)=>{
              //this.cooperativaAll();
              this.terminoDialog=false;
              this.termin={};
              this.moditerm=true;
              
              
                    
             })}
            
  
          //if(this.cooperativ.id=='' || this.cooperativ.id==undefined)
           //  else
          },
        terminoDelete(row) {
          this.$q.dialog({
            title: 'Confirmar',
            message: 'Esta seguro de eliminar los terminos?',
            cancel: true,
            persistent: true
          }).onOk(() => {
            this.$api.delete('termino/'+row.id).then((response)=>{
              this.terminoAll();
            })
          })
        },
        terminoEdit(row){
          this.termin=row;
          this.moditerm=false;
          this.terminoDialog=true;
         
        }, 
      },
    }
    
    
  
    </script>
  
