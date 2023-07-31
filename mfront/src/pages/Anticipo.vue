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
              <q-item clickable v-close-popup @click="anticipoDelete (props.row)">
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
                    :color="props.row.mineral=='Plata'?'grey-8':props.row.mineral=='Zinc'?'blue-8':props.row.mineral=='Plomo'?'green-8':''"
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
    <q-dialog v-model="anticipoDialog">
      <q-card style="width: 650px; max-width: 90vw; max-height: 90vh; overflow: auto;">
        <q-card-section class="row items-center">
          <div class="text-h6">{{anticipoOption=='create'?'Registrar':'Editar'}} anticipo</div>
          <q-space></q-space>
          <q-btn icon="close" flat round dense @click="anticipoDialog=false" />
        </q-card-section>
        <q-card-section class="q-pt-none">
        <q-form @submit="anticipoCreate">
          <div class="row">
            <div class="col-12 col-md-3">
              <q-select outlined v-model="anticipo.tipo" label="Mineral" :options="['Lote','Transporte']"></q-select>
            </div>
            <div class="col-md-9"></div>
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
              <pre>{{anticipo.lote_id}}</pre>
              <pre>{{loteSearch}}</pre>
            </div>
            <div class="col-12 col-md-4">
              <q-input required outlined v-model="anticipo.peso" label="Peso" type="number" step="0.01"></q-input>
            </div>
            <div class="col-12 col-md-4">
              <q-input outlined v-model="anticipo.saco" label="Sacos" type="number"></q-input>
            </div>
            <div class="col-12 col-md-4">
              <q-select outlined v-model="anticipo.cliente_id" label="Proveedor" :options="lotes"
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
              <q-input outlined v-model="anticipo.fecha" label="Fecha" type="date"></q-input>
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
            {name:'codigo', label:'Codigo', field:'codigo', sortable:true},
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
          this.anticipoDialog=true
          this.anticipoOption='create'
          this.anticipo.mineral='Plata'
          this.anticipo.tipo='Concentrado'
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
            this.lotes = this.lotesAll.filter(v => v.nombre.toLowerCase().indexOf(needle) > -1)
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
