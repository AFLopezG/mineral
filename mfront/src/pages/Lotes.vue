<template>
    <q-page>
<!--      <div class="text-h6">Registro de lotes</div>-->
      <q-table title="Lotes registrados" :filter="loteFilter" :columns="loteColum" :rows="lotes"
      :rows-per-page-options="[0]" :loading="loading">
      <template v-slot:top-right>
          <q-btn @click="loteAgregar" :loading="loading" color="green" icon="add_circle_outline" label="Registrar" no-caps />
        <q-btn @click="loteAll" flat dense :loading="loading" color="primary" icon="refresh" no-caps />
            <q-input outlined dense debounce="300" v-model="loteFilter" placeholder="Buscar">
              <template v-slot:append>
                <q-icon name="search" />
              </template>
            </q-input>
      </template>
      <template v-slot:body-cell-opcion="props">
        <q-td :props="props" auto-width>
          <q-btn-dropdown color="red" label="OPCION" :loading="loading" auto-close>
            <q-list>
              <q-item clickable v-close-popup @click="loteEdit (props.row)">
                <q-item-section>
                  <q-item-label>
                      Editar
                </q-item-label>
                </q-item-section>
              </q-item>
              <q-item clickable v-close-popup @click="loteDelete (props.row)">
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
        <template v-slot:body-cell-mineral="props">
          <q-td :props="props" >
            <q-chip :label="props.row.mineral"
                    :color="props.row.mineral=='Plata'?'grey-8':props.row.mineral=='Zinc-Plata'?'blue-8':props.row.mineral=='Plomo-Plata'?'green-5':props.row.mineral=='Broza'?'blue-2':''" 
                    text-color="white"
            />
          </q-td>
        </template>
        <template v-slot:body-cell-tipo="props">
          <q-td :props="props" >
            <q-chip :label="props.row.tipo"
                    :color="props.row.tipo=='Concentrado'?'green-8':'orange-8'"
                    text-color="white"
            />
          </q-td>
        </template>
    </q-table>
    <q-dialog v-model="loteDialog">
      <q-card style="width: 650px; max-width: 90vw; max-height: 90vh; overflow: auto;">
        <q-card-section class="row items-center justify-between">
          <div class="text-h6">{{loteOption=='create'?'Registrar':'Editar'}} lote</div>
          <q-space></q-space>
          <q-btn icon="close" flat @click="loteDialog=false" />
        </q-card-section>
        <q-card-section class="q-pt-none">
        <q-form @submit="loteCreate">
          <div class="row">
            <div class="col-12 col-md-3">
              <q-select outlined v-model="lote.mineral" label="Tipo Mineral" :options="$minerales"></q-select >
            </div>
            <div   class="col-12 col-md-3" >
              <!--q-select outlined v-model="lote.tipo" label="Clase Mineral" :options="$tipos"></q-select!-->
             <td>Clase Mineral</td> 
              <div>
               {{(lote.mineral=='Broza'?this.lote.tipo='Broza':this.lote.tipo='Concentrado')}}
              </div >
            </div>
            <div class="col-12 col-md-3">
              <q-input required outlined v-model="lote.peso" label="Peso" type="number" step="0.01"></q-input>
            </div>
            <div class="col-12 col-md-3">
              <q-input outlined v-model="lote.saco" label="Sacos" type="number"></q-input>
            </div>
            <div class="col-12 col-md-4">
              <q-select outlined v-model="lote.cliente_id" label="Proveedor" :options="provedores"
                        option-value="id" option-label="nombre" emit-value map-options @filter="filterFn" use-input input-debounce="0">
                <template v-slot:no-option>
                  <q-item>
                    <q-item-section class="text-grey">
                      No hay resultados
                    </q-item-section>
                  </q-item>
                </template>
              </q-select>
            </div>
            <div class="col-12 col-md-4">
              <q-input outlined v-model="cooperativa" label="Cooperativa" readonly/>
            </div>
            <div class="col-12 col-md-4">
              <q-input outlined v-model="lote.fecha" label="Fecha" type="date"></q-input>
            </div>
          </div>
          <q-btn type="submit" class="full-width" :loading="loading" :color="loteOption=='create'?'green':'orange'" :label="loteOption=='create'?'Registrar':'Editar'" :icon="loteOption=='create'?'add_circle_outline':'edit'" no-caps/>
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
          loteOption: '',
          provedores:[],
          provedoresAll:[],
          proveedor:{},
          lotes:[],
          lote:{},
          loteFilter:'',
          loteDialog:false,
          loteColum:[
            {name:'opcion', label:'Opcion', field:'opcion', sortable:true},
            {name:'codigo', label:'Codigo', field:'codigo', sortable:true, align:'left'},
            {name:'fecha', label:'Fecha', field:'fecha', sortable:true, align:'left'},
            {name:'mineral', label:'Mineral', field:'mineral', sortable:true},
            {name:'tipo', label:'Tipo', field:'tipo', sortable:true},
            {name:'peso', label:'Peso', field:'peso', sortable:true},
            {name:'saco', label:'Sacos', field:'saco', sortable:true},
            {name:'cliente', label:'Proveedor', field : row => row.cliente.nombre, sortable:true},
            {name:'cooperativa', label:'Cooperativa', field: row => row.cooperativa.nombre, sortable:true},
          ],
        }
      },
      created(){
        this.loteAll()
        this.proveedorAll()
      },
      methods:{
        proveedorAll(){
          this.$api.get('cliente').then((response)=>{
            this.provedores = response.data
            this.provedoresAll = response.data
          })
        },
        loteAgregar(){
          this.loteDialog=true
          this.loteOption='create'
          this.lote.mineral='Broza'
          //if (lote.mineral='Broza') {
            //this.lote.tipo='Broza'  
          //} else {
            //this.lote.tipo='Concentrado'  
         // }
          
          this.lote.fecha=date.formatDate(Date.now(),'YYYY-MM-DD')
        },
        filterFn (val, update) {
          if (val === '') {
            update(() => {
              this.provedores = this.provedoresAll
            })
            return
          }
          update(() => {
            const needle = val.toLowerCase()
            this.provedores = this.provedoresAll.filter(v => v.nombre.toLowerCase().indexOf(needle) > -1)
          })
        },
        loteAll(){
        this.loading=true
          this.$api.get('lote').then((response)=>{
            this.lotes=response.data
          }).finally(()=>{
            this.loading=false
          })
        },
        loteCreate(){
          this.loading=true
          if (this.loteOption=='create'){
            this.$api.post('lote' , this.lote).then((response)=>{
              this.loteDialog=false
              this.loteAll()
              this.lote={}
            }).catch((error)=>{
              this.$alert.error(error.response.data.message)
            }).finally(()=>{
              this.loading=false
            })
          }else{
            this.$api.put('lote/'+this.lote.id , this.lote).then((response)=>{
              this.loteDialog=false
              this.loteAll()
              this.lote={}
            }).finally(()=>{
              this.loading=false
            })
          }
        },
        loteDelete(row){
          this.$q.dialog({
            title: 'Confirmar',
            message: 'Esta seguro de eliminar el lote?',
            cancel: true,
            persistent: true
          }).onOk(() => {
            this.loading=true
            this.$api.delete('lote/'+row.id).then((response)=>{
              this.loteAll()
            })
          })
        },
        loteEdit(row){
          this.loteDialog=true
          this.loteOption='edit'
          this.lote=row
        },
      },
      computed:{
        cooperativa () {
          if(this.lote.cliente_id){
            let cooperativa= this.provedores.find((item)=>item.id==this.lote.cliente_id).cooperativa
            return cooperativa.nombre
          }
          return ''
        }
      }
    }
</script>
