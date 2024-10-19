
<template>
    <q-page>
      <q-table title="Registrar leyes" 
      :filter="leyFilter" 
      :columns="leyColum" 
      :rows="leys"
      :rows-per-page-options="[0]" 
      :loading="loading">
      <template v-slot:top-right>
        <q-btn @click="leyAgregar" :loading="loading" color="green" icon="add_circle_outline" label="Registrar leyes" no-caps />
        <q-btn @click="leyAll" flat dense :loading="loading" color="primary" icon="refresh" no-caps />
            <q-input outlined dense debounce="300" v-model="leyFilter" placeholder="Buscar">
              <template v-slot:append>
                <q-icon name="search" />
              </template>
            </q-input>
      </template>
      <template v-slot:body-cell-opcion="props">
        <q-td :props="props" auto-width>
          <q-btn-dropdown color="red" label="OPCION" :loading="loading" auto-close>
            <q-list>
              <q-item clickable v-close-popup @click="leyEdit (props.row)">
                <q-item-section avatar>
                  <q-icon name="edit" />
                </q-item-section>
                <q-item-section>
                  <q-item-label>
                      Editar
                </q-item-label>
                </q-item-section>
              </q-item>
              <!-- <q-item clickable v-close-popup @click="imprimirOrdenPago(props.row)">
                <q-item-section avatar>
                  <q-icon name="print" />
                </q-item-section>
                <q-item-section>
                  <q-item-label>
                      Imprimir Orden de Pago
                  </q-item-label>
                </q-item-section>
              </q-item> -->
              <q-item clickable v-close-popup @click="leyDelete (props.row)">
                <q-item-section>
                  <q-item-label>
                      Eliminar
                </q-item-label>
                </q-item-section>
              </q-item>
            </q-list>
          </q-btn-dropdown>
        </q-td>
      </template>
        <!-- <template v-slot:body-cell-mineral="props">
          <q-td :props="props" >
            <q-chip :label="props.row.lote.mineral"
                    :color="props.row.lote.mineral=='Plata'?'grey-8':props.row.lote.mineral=='Zinc'?'blue-8':props.row.lote.mineral=='Plomo'?'green-8':''"
                    text-color="white"
            />
          </q-td>
        </template> -->
        <!-- <template v-slot:body-cell-monto="props">
          <q-td :props="props" >
            <b>{{props.row.monto}} Bs</b>
          </q-td>
        </template> -->
        <!-- <template v-slot:body-cell-tipo="props">
          <q-td :props="props" >
            <q-chip :label="props.row.tipo"
                    :color="props.row.tipo=='Concentrado'?'green-8':'orange-8'"
                    text-color="white"
            />
          </q-td>
        </template> -->
    </q-table>
<!--      <pre>{{anticipos}}</pre>-->
    <q-dialog v-model="leyDialog" >
      <q-card style="width: 800px; max-width: 90vw; max-height: 90vh; overflow: auto;">
         <q-card-section class="row items-center">
          <div class="text-h6">{{leyOption=='create'?'Registrar':'Editar'}} leyes</div>
          <q-space></q-space>
          <q-btn icon="close" flat round dense @click="leyDialog=false" />
        </q-card-section>
        <q-card-section class="q-pt-none">
          <q-form @submit="leyCreate" >
          <div class="col-12 col-md-4">
              <q-select outlined v-model="ley.lote_id" label="Lote" :options="lotes"
                        option-value="id" option-label="codigo" emit-value map-options @filter="filterFn" use-input input-debounce="0">
                <template v-slot:no-option>
                  <q-item>
                    <q-item-section class="text-grey">
                      No hay resultados
                    </q-item-section>
                  </q-item>
                </template>
              </q-select>
          </div>
          <div class="row">
            <div class="col-12 col-md-2" >
              <b>Peso</b>
                <q-input required outlined v-model="loteSearch.peso"  type="number" readonly></q-input>
            </div>
            <div class="col-12 col-md-2" >
              <b>Sacos</b>
              <q-input required outlined v-model="loteSearch.saco"  type="number" readonly></q-input>
            </div>
            <div class="col-12 col-md-3" style="height: 40px">
              <b>Proveedor</b>
              <div v-if="loteSearch.cliente">{{loteSearch.cliente.nombre}}</div>
            </div>
            <div class="col-12 col-md-3" style="height: 40px">
              <b>Coopeativa</b>
              <div v-if="loteSearch.cliente">{{loteSearch.cooperativa.nombre}}</div>
            </div>
            <div class="col-12 col-md-2" style="height: 40px">
              <b>fecha</b>
              <div>{{loteSearch.fecha}}</div>
            </div>
          </div>
          <br>
          <div class="row">
              <div class="col-12">
                <div class="text-h6">Leyes según laboratorio</div>
              </div>
              <div class="col-12 col-md-1" > </div>
              <div class="col-12 col-md-2">
                <q-input required outlined v-model="ley.plomo" label="Ley Plomo" step="0.1" ></q-input>
              </div>
              <div class="col-12 col-md-2">
                <q-input required outlined  v-model="ley.plata" label="Ley Plata" step="0.1" ></q-input>
              </div>
              <div class="col-12 col-md-2">
                <q-input required outlined v-model="ley.zinc" label="Ley Zinc" step="0.1" ></q-input>
              </div>
              <div class="col-12 col-md-2">
                <q-input required outlined v-model="ley.estaño" label="Ley Estaño" step="0.1" ></q-input>
              </div>           
              <div class="col-12 col-md-2">
                <q-input required outlined  v-model="ley.humedad" label="Humedad" step="0.1" ></q-input>
              </div>
          </div>
          <br>
          <q-btn type="submit" class="full-width" :loading="loading" :color="leyOption=='create'?'green':'orange'" :label="leyOption=='create'?'Registrar':'Editar'" :icon="leyOption=='create'?'add_circle_outline':'edit'" no-caps/>
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
          loading: false,
          leyOption: '',
          lotes:[],
          lotesAll:[],
          lote:{},
          leys:[],
          leysAll:[],
          ley:{},
          leyFilter:'',
          leyDialog:false,
          leyColum:[
            {name:'opcion', label:'Opcion', field:'opcion', sortable:true},
            {name:'id', label:'Lote', field: row => row.lote.codigo, sortable:true},
           // {name:'fecha', label:'Fecha', field: row => row.lote.codigo, sortable:true},
            {name:'peso', label:'Peso', field:row => row.lote.peso, sortable:true},
            {name:'humedad', label:'Humedad', field: 'humedad', sortable:true},
            {name:'zinc', label:'Ley Zinc', field: 'zinc', sortable:true},
            {name:'plomo', label:'Ley Plomo', field: 'plomo', sortable:true},
            {name:'plata', label:'Ley Plata', field: 'plata', sortable:true},
            {name:'estaño', label:'Ley Estaño', field: 'estaño', sortable:true},
            // {name:'cliente', label:'Proveedor', field : row => row.cliente.nombre, sortable:true},
            // {name:'cooperativa', label:'Cooperativa', field: row => row.cooperativa.nombre, sortable:true},
          ],
        }
      },
      created(){
        this.leyAll();
        this.loteAll();
      },
      methods:{
        loteAll(){
                    this.$api.get('lote').then((response)=>{
                    this.lotes = response.data
                    //this.lotesAll = response.data
                    })
                  },
        
        leyAll(){
                  this.$api.get('ley').then((response)=>{
                  this.leys = response.data
                  this.leysAll = response.data
                  })
                },
        
        leyAgregar(){
                      //this.loading=true
                     
                      //this.lotes = this.lotesAll
                      this.leys = this.leysAll
                      this.leyDialog=true
                      this.leyOption='create'
                      this.ley.lote_id=''
                      //this.anticipo.fecha=date.formatDate(Date.now(),'YYYY-MM-DD')
                    },
        filterFn (val, update) {
                                if (val === '') {
                                  update(() => {
                                    this.leys = this.leysAll
                                  })
                                  return
                                }
                                update(() => {
                                  const needle = val.toLowerCase()
                                  this.leys = this.leysAll.filter(v => v.codigo.toLowerCase().indexOf(needle) > -1)
                                })
                              },
        leyCreate(){
                    this.loading=true
                    if (this.leyOption=='create'){
                      this.$api.post('ley' , this.ley).then((response)=>{
                        this.leyDialog=false
                        this.leyAll()
                        this.ley={}
                      }).finally(()=>{
                        this.loading=false
                      }).catch((error)=>{
                        this.$alert.error(error.response.data.message)
                      })
                    }else{
                      this.$api.put('ley/'+this.ley.id , this.ley).then((response)=>{
                        this.leyDialog=false
                        this.leyAll()
                        this.ley={}
                      }).finally(()=>{
                        this.loading=false
                      })
                    }
                  },
        leyDelete(row){
                        this.$q.dialog({
                          title: 'Confirmar',
                          message: 'Esta seguro de eliminar las leyes?',
                          cancel: true,
                          persistent: true
                        }).onOk(() => {
                          this.loading=true
                          this.$api.delete('ley/'+row.id).then((response)=>{
                            this.leyAll()
                          })
                        })
                      },
         leyEdit(row){
                        this.leyDialog=true
                        this.leyOption='edit'
                        this.ley=row
                        
                      },
       
      },
      computed:{
        loteSearch () {
          if(this.ley.lote_id){
            let lote= this.lotes.find((item)=>item.id==this.ley.lote_id)
            return lote
          }
          return ''
        },
       cooperativa () {
          if(this.ley.cliente_id){
            let cooperativa= this.lotes.find((item)=>item.id==this.ley.cliente_id).cooperativa
            return cooperativa.nombre
          }
          return ''
        }
      } 
    }
</script>

