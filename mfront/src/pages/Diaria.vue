<template>
    <q-page>
        <div class="text-h6">COTIZACION DIARIA / QUINCENAL</div>

    <q-table title="Cotizacion Diaria"
    :filter="diariaFilter"
    :columns="diariaColum"
    :rows="diarias"
    >
    <template v-slot:top-right>
        <q-btn @click="diariaDialog=true" color="green" icon="add_circle_outline" label="Registrar" no-caps />
          <q-input outlined dense debounce="300" v-model="diariaFilter" placeholder="Buscar">
            <template v-slot:append>
              <q-icon name="search" />
            </template>
          </q-input>
    </template>
    <template v-slot:body-cell-opcion="props">
  
      <q-td :props="props">
        <q-btn-dropdown color="red" label="OPCION">
          <q-list>
            <q-item clickable v-close-popup @click="diariaEdit (props.row)">
              <q-item-section>
                <q-item-label>  
                    Editar    
              </q-item-label>
              </q-item-section>
            </q-item>
      
          </q-list>
        </q-btn-dropdown>  
      </q-td>
    </template>
  </q-table>

  <q-table title="Cotizacion Quincenal"
  :filter="quincenaFilter"
  :columns="quinColum"
  :rows="quincenas"
  >
  <template v-slot:top-right>
      <q-btn @click="quinDialog=true" color="green" icon="add_circle_outline" label="Registrar" no-caps />
        <q-input outlined dense debounce="300" v-model="quincenaFilter" placeholder="Buscar">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
  </template>
  <template v-slot:body-cell-opcion="props">

    <q-td :props="props">
      <q-btn-dropdown color="red" label="OPCION">
        <q-list>
          <q-item clickable v-close-popup @click="quincenaEdit (props.row)">
            <q-item-section>
              <q-item-label>  
                  Editar    
            </q-item-label>
            </q-item-section>
          </q-item>
    
        </q-list>
      </q-btn-dropdown>  
    </q-td>
  </template>
</q-table>

  <q-dialog v-model="diariaDialog">
    <q-card>
      <q-card-section>
        <div class="text-h6">Agregar diaria</div>
      </q-card-section>
      <q-card-section class="q-pt-none">
      <q-form @submit="diariaCreate">
        <q-input dense outlined v-model="diaria.fecha" label="FECHA" type="date"></q-input>
        <q-input dense outlined v-model="diaria.plata" label="PLATA"></q-input>
        <q-input dense outlined v-model="diaria.plomo" label="PLOMO"></q-input>
        <q-input dense outlined v-model="diaria.zinc" label="ZINC"></q-input>
        <q-input dense outlined v-model="diaria.estano" label="ESTAÑO"></q-input>
        <q-btn type="submit" class="full-width" color="green" label="Guardar" icon="check" ></q-btn>
      </q-form>
    </q-card-section>
    </q-card>
  </q-dialog>

  <q-dialog v-model="quinDialog">
    <q-card>
      <q-card-section>
        <div class="text-h6">Agregar Quincena</div>
      </q-card-section>
      <q-card-section class="q-pt-none">
      <q-form @submit="quincenaCreate">
        <q-input dense outlined v-model="quincena.fecha" label="FECHA" type="date"></q-input>
        <div class="row">
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena.plata" label="PLATA"></q-input></div>
            
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena.explata" label="EX PLATA"></q-input></div>
        </div>
        
        <div class="row">
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena.plomo" label="plomo"></q-input></div>
            
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena.explomo" label="EX plomo"></q-input></div>
        </div>
        <div class="row">
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena.zinc" label="zinc"></q-input></div>
            
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena.exzinc" label="EX zinc"></q-input></div>
        </div>
        <div class="row">
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena.estano" label="estano"></q-input></div>
            
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena.exestano" label="EX estano"></q-input></div>
        </div>
        <q-btn type="submit" class="full-width" color="green" label="Guardar" icon="check" ></q-btn>
      </q-form>
    </q-card-section>
    </q-card>
  </q-dialog>

  <q-dialog v-model="quinModDialog">
    <q-card>
      <q-card-section>
        <div class="text-h6">Agregar Quincena</div>
      </q-card-section>
      <q-card-section class="q-pt-none">
      <q-form @submit="quinMod">
        <q-input dense outlined v-model="quincena2.fecha" label="FECHA" type="date"></q-input>
        <div class="row">
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena2.plata" label="PLATA"></q-input></div>
            
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena2.explata" label="EX PLATA"></q-input></div>
        </div>
        
        <div class="row">
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena2.plomo" label="plomo"></q-input></div>
            
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena2.explomo" label="EX plomo"></q-input></div>
        </div>
        <div class="row">
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena2.zinc" label="zinc"></q-input></div>
            
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena2.exzinc" label="EX zinc"></q-input></div>
        </div>
        <div class="row">
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena2.estano" label="estano"></q-input></div>
            
            <div class="col-4 q-pa-xs"><q-input dense outlined v-model="quincena2.exestano" label="EX estano"></q-input></div>
        </div>
        <q-btn type="submit" class="full-width" color="green" label="Guardar" icon="check" ></q-btn>
      </q-form>
    </q-card-section>
    </q-card>
  </q-dialog>

  <q-dialog v-model="diariaModDialog">
    <q-card>
      <q-card-section>
        <div class="text-h6">Mod diaria</div>
      </q-card-section>
      <q-card-section class="q-pt-none">
      <q-form @submit="diariaMod">
        <q-input dense outlined v-model="diaria2.fecha" label="FECHA" type="date"></q-input>
        <q-input dense outlined v-model="diaria2.plata" label="PLATA"></q-input>
        <q-input dense outlined v-model="diaria2.plomo" label="PLOMO"></q-input>
        <q-input dense outlined v-model="diaria2.zinc" label="ZINC"></q-input>
        <q-input dense outlined v-model="diaria2.estano" label="ESTAÑO"></q-input>
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

                  quinDialog:false,
                  quinModDialog:false,
                  estados:['ACTIVO', 'PASIVO'],
                  diariaFilter:'',
                  quincenaFilter:'',
                  diariaDialog:false,
                  diariaModDialog:false,
                  diarias:[],
                  quincenas:[],
                  diaria:{fecha:date.formatDate(new Date(), 'YYYY-MM-DD')},
                  diaria2:{},
                  quincena2:{},
                  quincena:{fecha:date.formatDate(new Date(), 'YYYY-MM-DD')},
                  diariaColum:[
                  {name:'opcion', label:'Opcion', field:'opcion', sortable:true},
                  {name:'fecha', label:'fecha', field:'fecha', sortable:true},
                  {name:'plata', label:'plata', field:'plata', sortable:true},
                  {name:'plomo', label:'plomo', field:'plomo', sortable:true},
                  {name:'zinc', label:'zinc', field:'zinc', sortable:true},
                  {name:'estano', label:'estano', field:'estano', sortable:true},
                  ],
                  quinColum:[
                  {name:'opcion', label:'Opcion', field:'opcion', sortable:true},
                  {name:'fecha', label:'fecha', field:'fecha', sortable:true},
                  {name:'plata', label:'plata', field:'plata', sortable:true},
                  {name:'plomo', label:'plomo', field:'plomo', sortable:true},
                  {name:'zinc', label:'zinc', field:'zinc', sortable:true},
                  {name:'estano', label:'estano', field:'estano', sortable:true},

            
                  {name:'explata', label:'explata', field:'explata', sortable:true},
                  {name:'explomo', label:'explomo', field:'explomo', sortable:true},
                  {name:'exzinc', label:'exzinc', field:'exzinc', sortable:true},
                  {name:'exestano', label:'exestano', field:'exestano', sortable:true},
                  ]
                      }
              },
  
      created(){
         this.diariaAll();
         this.quincenaAll();
      },
      methods:{
        diariaAll(){
        //this.q.loading.show()
        this.$api.get('diaria').then((response)=>{
          this.diarias=response.data
             })
        },
        quincenaAll(){
        //this.q.loading.show()
        this.$api.get('quincena').then((response)=>{
          this.quincenas=response.data
             })
        },
        diariaCreate(){
        this.$api.post('diaria' , this.diaria).then((response)=>{
          this.diariaDialog=false;
          this.diariaAll();
             })
            },
        diariaMod(){
        this.$api.put('diaria/'+this.diaria2.id,this.diaria2).then((response)=>{
          this.diariaModDialog=false
          this.diariaAll()
        })
      },
      quinMod(){
        this.$api.put('quincena/'+this.quincena2.id,this.quincena2).then((response)=>{
          this.quinModDialog=false
          this.quincenaAll()
        })
      },
          quincenaCreate(){
        this.$api.post('quincena' , this.quincena).then((response)=>{
          this.quinDialog=false;
          this.quincenaAll();
             })
            },
        diariaEdit(row){
          this.diaria2=row;
          this.diariaModDialog=true;
        },
        quincenaEdit(row){
          this.quincena2=row;
          this.quinModDialog=true;
        }
        }
    }
    </script>
  