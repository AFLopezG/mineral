<template>
    <q-page>
      <q-table title="Anticipos realizados" :filter="anticipoFilter" :columns="anticipoColum" :rows="anticipos"
      :rows-per-page-options="[0]" :loading="loading">
      <template v-slot:top-right>
          <q-btn @click="anticipoAgregar" :loading="loading" color="green" icon="add_circle_outline" label="Registrar" no-caps />
        <q-btn @click="anticipoAll" flat dense :loading="loading" color="primary" icon="refresh" no-caps />
            <q-input outlined dense debounce="300" v-model="anticipoFilter" placeholder="Buscar">
              <template v-slot:append>
                <q-icon name="search" />
              </template>
            </q-input>
      </template>
      <template v-slot:body-cell-opcion="props">
        <q-td :props="props" auto-width>
          <q-btn-dropdown color="red" label="OPCION" :loading="loading" auto-close>
            <q-list>
              <q-item clickable v-close-popup @click="anticipoEdit (props.row)">
                <q-item-section>
                  <q-item-label>
                      Editar
                </q-item-label>
                </q-item-section>
              </q-item>
<!--              <q-item clickable v-close-popup @click="anticipoDelete (props.row)">-->
<!--                <q-item-section>-->
<!--                  <q-item-label>-->
<!--                      Eliminar-->
<!--                </q-item-label>-->
<!--                </q-item-section>-->
<!--              </q-item>-->
            </q-list>
          </q-btn-dropdown>
        </q-td>
      </template>
        <template v-slot:body-cell-mineral="props">
          <q-td :props="props" >
            <q-chip :label="props.row.lote.mineral"
                    :color="props.row.lote.mineral=='Plata'?'grey-8':props.row.lote.mineral=='Zinc'?'blue-8':props.row.lote.mineral=='Plomo'?'green-8':''"
                    text-color="white"
            />
          </q-td>
        </template>
        <template v-slot:body-cell-monto="props">
          <q-td :props="props" >
            <b>{{props.row.monto}} Bs</b>
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
<!--      <pre>{{anticipos}}</pre>-->
    <q-dialog v-model="anticipoDialog">
      <q-card style="width: 800px; max-width: 90vw; max-height: 90vh; overflow: auto;">
        <q-card-section class="row items-center">
          <div class="text-h6">{{anticipoOption=='create'?'Registrar':'Editar'}} anticipo</div>
          <q-space></q-space>
          <q-btn icon="close" flat round dense @click="anticipoDialog=false" />
        </q-card-section>
        <q-card-section class="q-pt-none">
        <q-form @submit="anticipoCreate">
          <div class="row">
            <div class="col-12 col-md-4">
              <q-select outlined v-model="anticipo.tipo" label="Tipo" :options="['Lote','Transporte']" required></q-select>
            </div>
            <div class="col-md-8"></div>
            <div class="col-12 col-md-4">
              <q-select outlined v-model="anticipo.lote_id" label="Lote" :options="lotes"
                        option-value="id" option-label="codigo" emit-value map-options @filter="filterFn" use-input input-debounce="0">
                <template v-slot:no-option>
                  <q-item>
                    <q-item-section class="text-grey">
                      No hay resultados
                    </q-item-section>
                  </q-item>
                </template>
              </q-select>
<!--              <pre>{{loteSearch}}</pre>-->
            </div>
            <div class="col-12 col-md-4">
              <q-input required outlined v-model="loteSearch.peso" label="Peso" type="number" readonly></q-input>
            </div>
            <div class="col-12 col-md-4">
              <q-input required outlined v-model="loteSearch.saco" label="Sacos" type="number" readonly></q-input>
            </div>
            <div class="col-12 col-md-4" style="height: 40px">
              <b>Proveedor</b>
              <div v-if="loteSearch.cliente">{{loteSearch.cliente.nombre}}</div>
            </div>
            <div class="col-12 col-md-4" style="height: 40px">
              <b>Coopeativa</b>
              <div v-if="loteSearch.cliente">{{loteSearch.cooperativa.nombre}}</div>
            </div>
            <div class="col-12 col-md-4" style="height: 40px">
              <b>fecha</b>
              <div>{{loteSearch.fecha}}</div>
            </div>
            <div class="col-12 col-md-4">
              <q-input required outlined v-model="anticipo.monto" label="Monto" type="number"></q-input>
            </div>
            <div class="col-12">
              <div class="text-h6">Transporte</div>
            </div>
            <div class="col-12 col-md-3">
              <q-input outlined v-model="anticipo.nombreChofer" label="Nombre Chofer" type="text"></q-input>
            </div>
            <div class="col-12 col-md-3">
              <q-input outlined v-model="anticipo.ciChofer" label="CI Chofer" type="text"></q-input>
            </div>
            <div class="col-12 col-md-3">
              <q-input outlined v-model="anticipo.placa" label="Placa" type="text"></q-input>
            </div>
            <div class="col-12 col-md-3">
              <q-input outlined v-model="anticipo.tipoVehiculo" label="Tipo Vehiculo" type="text"></q-input>
            </div>
            <div class="col-12">
              <q-input outlined v-model="anticipo.descripcion" label="Descripcion" type="textarea"></q-input>
            </div>
          </div>
          <q-btn type="submit" class="full-width" :loading="loading" :color="anticipoOption=='create'?'green':'orange'" :label="anticipoOption=='create'?'Registrar':'Editar'" :icon="anticipoOption=='create'?'add_circle_outline':'edit'" no-caps/>
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
          anticipoOption: '',
          lotes:[],
          lotesAll:[],
          lote:{},
          anticipos:[],
          anticipo:{},
          anticipoFilter:'',
          anticipoDialog:false,
          anticipoColum:[
            {name:'opcion', label:'Opcion', field:'opcion', sortable:true},
            {name:'monto', label:'Monto', field: 'monto', sortable:true},
            {name:'fecha', label:'Fecha', field: row => date.formatDate(row.fecha, 'DD/MM/YYYY'), sortable:true},
            {name:'descripcion', label:'Descripcion', field:'descripcion', sortable:true},
            {name:'codigo', label:'Codigo', field: row => row.lote.codigo, sortable:true},
            {name:'tipo', label:'Tipo', field: row => row.lote.tipo, sortable:true},
            {name:'mineral', label:'Mineral', field: row => row.lote.mineral, sortable:true},
            // {name:'cliente', label:'Proveedor', field : row => row.cliente.nombre, sortable:true},
            // {name:'cooperativa', label:'Cooperativa', field: row => row.cooperativa.nombre, sortable:true},
          ],
        }
      },
      created(){
        this.anticipoAll()
        this.loteAll()
      },
      methods:{
        loteAll(){
          this.$api.get('lote').then((response)=>{
            this.lotes = response.data
            this.lotesAll = response.data
          })
        },
        anticipoAgregar(){
          this.lotes = this.lotesAll
          this.anticipoDialog=true
          this.anticipoOption='create'
          this.anticipo.lote_id=''
          this.anticipo.fecha=date.formatDate(Date.now(),'YYYY-MM-DD')
        },
        filterFn (val, update) {
          if (val === '') {
            update(() => {
              this.lotes = this.lotesAll
            })
            return
          }
          update(() => {
            const needle = val.toLowerCase()
            this.lotes = this.lotesAll.filter(v => v.codigo.toLowerCase().indexOf(needle) > -1)
          })
        },
        anticipoAll(){
        this.loading=true
          this.$api.get('anticipo').then((response)=>{
            this.anticipos=response.data
          }).finally(()=>{
            this.loading=false
          })
        },
        anticipoCreate(){
          this.loading=true
          if (this.anticipoOption=='create'){
            this.$api.post('anticipo' , this.anticipo).then((response)=>{
              this.anticipoDialog=false
              this.anticipoAll()
              this.anticipo={}
            }).finally(()=>{
              this.loading=false
            }).catch((error)=>{
              this.$alert.error(error.response.data.message)
            })
          }else{
            this.$api.put('anticipo/'+this.anticipo.id , this.anticipo).then((response)=>{
              this.anticipoDialog=false
              this.anticipoAll()
              this.anticipo={}
            }).finally(()=>{
              this.loading=false
            })
          }
        },
        anticipoDelete(row){
          this.$q.dialog({
            title: 'Confirmar',
            message: 'Esta seguro de eliminar el anticipo?',
            cancel: true,
            persistent: true
          }).onOk(() => {
            this.loading=true
            this.$api.delete('anticipo/'+row.id).then((response)=>{
              this.anticipoAll()
            })
          })
        },
        anticipoEdit(row){
          this.anticipoDialog=true
          this.anticipoOption='edit'
          this.anticipo=row
        },
      },
      computed:{
        loteSearch () {
          if(this.anticipo.lote_id){
            let lote= this.lotes.find((item)=>item.id==this.anticipo.lote_id)
            return lote
          }
          return ''
        },
        cooperativa () {
          if(this.anticipo.cliente_id){
            let cooperativa= this.lotes.find((item)=>item.id==this.anticipo.cliente_id).cooperativa
            return cooperativa.nombre
          }
          return ''
        }
      }
    }
</script>
