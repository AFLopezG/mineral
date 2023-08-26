<template>
    <q-page>
        <div>LIQUIDACION</div>
        <div>LEYES LABORATORIO</div>
        <div class="row">
            <div class="col-3"><q-input outlined dense label="Lote" v-model="codigolote"/></div>
            <div class="col-1"> <q-btn color="info" icon="search" @click="buscarlote"/>
            </div>
        </div>
        <q-card class="my-card">
            <q-card-section>
                <div class="row">
              <div class="col-6"><q-input dense outlined v-model="zinc" label="Ley Zinc Zn" @keyup="calculoValoracion"/></div>
              <div class="col-6"><q-input dense outlined v-model="plomo" label="Ley Plomo Pb" @keyup="calculoValoracion"/></div>
              <div class="col-6"><q-input dense outlined v-model="plata" label="Ley Plata Ag" @keyup="calculoValoracion"/></div>
              <div class="col-6"><q-input dense outlined v-model="humedad" label="Humedad %" @keyup="calculoPesoNeto"/></div></div>
            </q-card-section>
          </q-card>
          <q-card-section v-if="lote.id!=undefined">
            <div class="row">
            <div class="col-4"><q-input dense outlined v-model="lote.mineral" label="Mineral" /></div>
            <div class="col-4"><q-input dense outlined v-model="lote.cooperativa.nombre" label="Cooperativa" /></div>
            <div class="col-4"><q-input dense outlined v-model="lote.cliente.nombre" label="Proveedor" /></div>
            <div class="col-4"><q-input dense outlined v-model="lote.peso" label="Peso" /></div>
            <div class="col-4"><q-input dense outlined v-model="lote.saco" label="Sacos" /></div>
            <div class="col-4"><q-input dense outlined v-model="lote.fecha" label="Fecha" /></div>
            <div class="col-4"><q-select dense outlined v-model="tara" label="Tara" :options="[0,1]" @update:model-value="calculoPesoNeto"/></div>
            <div class="col-4"><q-badge color="orange" text-color="black" style="width:200px; height:40px; font-size:14px; " label="PESO NETO: ">{{pesoNeto}}</q-badge></div>
            <!--<q-input dense color="green" outlined v-model="pesoNeto" label="Peso Neto" type="number "/>-->
           </div>
          </q-card-section>
          <q-card-section>
            <div class="row">
                <did class="col-6"><q-input dense outlined v-model="regaliaAg" label="Regalia Ag" /></did>
                <did class="col-6"><q-input dense outlined v-model="regaliaZn" label="Regalia Zn" /></did>
                <did class="col-6"><q-input dense outlined v-model="regaliaPb" label="Regalia Pb" /></did>
            </div>
        </q-card-section>
        <q-card-section>
            <div class="row">
                <did class="col-3"><q-input dense outlined v-model="valAg" label="valoracion Ag" /></did>
                <did class="col-3"><q-input dense outlined v-model="decAg" label="Deduccion Ag" @keyup="calculoParcialAg" type="number" step="0.01"/></did>
                <did class="col-3"><q-input dense outlined v-model="pagAg" label="Pagable Ag" @keyup="calculoParcialAg" type="number"/></did>
                <did class="col-3"><q-input dense outlined v-model="parAg" label="Parcial Ag" /></did>
                <did class="col-3"><q-input dense outlined v-model="valZn" label="valoracion Zn" /></did>
                <did class="col-3"><q-input dense outlined v-model="decZn" label="Deduccion Zn" @keyup="calculoParcialZn" type="number" step="0.01"/></did>
                <did class="col-3"><q-input dense outlined v-model="pagZn" label="Pagable Zn" @keyup="calculoParcialZn" type="number"/></did>
                <did class="col-3"><q-input dense outlined v-model="parZn" label="Parcial Zn" /></did>
                <did class="col-3"><q-input dense outlined v-model="valPb" label="valoracion Pb" /></did>
                <did class="col-3"><q-input dense outlined v-model="decPb" label="Deduccion Pb" @keyup="calculoParcialPb" type="number" step="0.01"/></did>
                <did class="col-3"><q-input dense outlined v-model="pagPb" label="Pagable Pb" @keyup="calculoParcialPb" type="number"/></did>
                <did class="col-3"><q-input dense outlined v-model="parPb" label="Parcial Pb" /></did>
            </div>
            <div><b>TOTAL</b> {{totalParcial}}</div>
        </q-card-section> 
        <q-card-section>
            <div class="row">
                <div class="col-12"><q-input dense outlined v-model="maquila" label="Maquila" type="number"/></div>
            <did class="col-4"><q-input dense outlined v-model="base" label="Base" /></did>
            <did class="col-4"><q-input dense outlined v-model="actual" label="Actual" /></did>
            <did class="col-4"><q-input dense outlined v-model="diff" label="Total" /></did>
            <did class="col-4"><q-input dense outlined v-model="penalidad" label="Penalidad" /></did>
            <did class="col-4"><q-input dense outlined v-model="CalculoDesc" label="Descuento Base" /></did>
        </div>        
        </q-card-section>
        <q-card-section>
            <div>Refinacion de Ag</div>
            <div class="row">
                <div class="col-4">{{regaliaAg}}</div>
                <div class="col-4"><q-input dense outlined v-model="refinacion" label="Gasto Refinacion" type="number"/></div>
                <div class="col-4">{{calculoRefinacion}}</div>
            </div>
            <div class="row">
                <div class="col-4">Total Anticipo: {{anticipo}}</div>
                <div class="col-4">{{totalTransporte}}</div>
            </div>
            <div class="row">
                <div class="col-4">RollBack</div>
                <div class="col-4"><q-input dense outlined type="number" v-model="rollback"  /></div>
            </div>
            <div class="row">
                <div class="col-4">Molienda</div>
                <div class="col-4"><q-input dense outlined type="number" v-model="molienda"  /></div>
            </div>
        </q-card-section>
        </q-page>
</template>
<script>
  import { relativeTimeThreshold } from 'moment'
import {date} from 'quasar'
import { computed } from 'vue'
    export default{
      name: 'LiquidPage',
      data () {
        return{
            rollback:0,
            molienda:0,
            loading: false,
          pesoNeto:0,
          refinacion:0,
          codigolote:'',
          penalidad:0,
          lote:{},
          zinc:0,
          plomo:0,
          plata:0,
          humedad:0,
          tara:0,
          regaliaAg:0,
          regaliaZn:0,
          regaliaPb:0,
          valAg:0,
          valZn:0,
          valPb:0,
          decAg:0,
          decZn:0,
          decPb:0,
          pagAg:0,
          pagZn:0,
          pagPb:0,
          parAg:0,
          parZn:0,
          parPb:0,
          base:0,
          maquila:0,
          actual:0,
          quincena:{},
          anticipo:0
        }
    },
    created(){
    },
    methods:{
        calculoAnticipo(){
            this.anticipo=0
            this.$api.post('totalAnticipo',{'id':this.lote.id}).then((response)=>{
                console.log(response.data)
                response.data.forEach(r => {
                    this.anticipo+=r.monto
                });
            })
        },
        buscarQuin(fec){
                this.quicena={}
            this.$api.post('buscarQuincena',{'fecha':fec}).then((response)=>{
                console.log(response.data)

                this.quincena=response.data
                if(this.quincena.id==undefined)
                this.$q.notify({
                    message: 'No existe Quincena',
                    color: 'red',
                    icon:'warning'
                    })
            })

        },
        buscarlote(){
            this.lote={}
            this.$api.post('searchLote',{codigo:this.codigolote}).then((response)=>{
                console.log(response.data)
                this.lote=response.data
                this.calculoPesoNeto()
                this.buscarQuin(this.lote.fecha)
                this.calculoAnticipo()
        })
        },
        calculoPesoNeto(){
            this.pesoNeto=this.lote.peso * (100 -  this.humedad)/100 - (this.lote.saco/2) - (this.lote.peso * this.tara/100)
        },

        calculoValoracion(){
            this.valAg=this.plata * 100 / 31.1035
            this.valPb=this.plomo
            this.valZn=this.zinc

            this.regaliaAg= (this.valAg * this.pesoNeto / 1000) * this.quincena.plata
            this.regaliaPb= this.pesoNeto * this.plomo * 2.2046223 * this.quincena.plomo
            this.regaliaZn= this.pesoNeto * this.zinc * 2.2046223 * this.quincena.zinc
        },
        calculoParcialAg(){
            if(this.pagAg<=0) this.pagAg=100
            this.parAg = (this.valAg - this.decAg) * this.pagAg / 100
        },
        calculoParcialZn(){
            if(this.pagZn<=0) this.pagZn=100
            this.parZn = (this.valZn - this.decZn) * this.pagZn / 100
            if(this.regaliaZn>0) this.actual = this.regaliaZn
        },
        calculoParcialPb(){
            if(this.pagPb<=0) this.pagPb=100
            this.parPb = (this.valPb - this.decPb) * this.pagPb / 100
            if(this.regaliaPb>0) this.actual = this.regaliaPb
        }
    },
    computed:{
        totalParcial() {
            return this.parAg + this.parPb + this.parZn
        },
        diff(){
            return this.actual - this.base
        },
        CalculoDesc(){
            if( this.penalidad==0)
            return this.actual - this.base
        else return (this.actual - this.base ) * this.penalidad
        },
        calculoRefinacion(){
            return this.regaliaAg * this.refinacion
        }, 
        totalDescuento(){
            return this.maquila + this.calculoRefinacion + this.CalculoDesc
        },
        totalPagable(){
            return this.totalParcial - this.totalDescuento
        },
        totalBruto(){
            return this.totalPagable * this.pesoNeto / 1000
        },
        totalTransporte(){
            return this.anticipo
        }
    }
    
}
</script>