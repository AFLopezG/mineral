<template>
    <q-page class="q-pa-xs">
        <center class="text-h5">LEYES LABORATORIO</center>
        <div class="row q-pa-xs">
            <div class="col-3"><q-select dense outlined v-model="lote" :options="lotes" label="Codigo de Lote" /></div>
        </div>
        <q-card class="my-card">
            <q-card-section>
                <div class="row">
                <div class="col-6">
              <div class="col-6 q-pa-xs"><q-input dense outlined v-model="zinc" label="Ley Zinc Zn" type="number" step="0.01" @keyup="calculoValoracion"/></div>
              <div class="col-6 q-pa-xs"><q-input dense outlined v-model="plomo" label="Ley Plomo Pb" type="number" step="0.01" @keyup="calculoValoracion"/></div>
              <div class="col-6 q-pa-xs"><q-input dense outlined v-model="plata" label="Ley Plata Ag" type="number" step="0.01" @keyup="calculoValoracion"/></div>
              <div class="col-6 q-pa-xs"><q-input dense outlined v-model="humedad" label="Humedad %" type="number"/></div></div>
              <div class="col-6 q-pa-xs">
                <div class="row " v-if="lote.id!=undefined">
                    <div class="col-6"><b>MINERAL: </b>{{lote.mineral}}</div>
                    <div class="col-6"><b>COOPERATIVA: </b> {{lote.cooperativa.nombre}}  </div>
                    <div class="col-6"><b>CLIENTE: </b>  {{lote.cliente.nombre}}  </div>
                    <div class="col-6"><b>PESO: </b> {{lote.peso}}  </div>
                    <div class="col-6"><b>SACO: </b> {{lote.saco}}  </div>
                    <div class="col-6"><b>FECHA: </b> {{lote.fecha}}  </div>
                    <div class="col-4"><b>TARA:</b> <q-toggle v-model="tara" :true-value="1" :false-value="0"/>                     </div>
                    <div class="col-12"><q-badge color="orange" text-color="black" style="width:200px; height:40px; font-size:14px; " label="PESO NETO: ">{{calculoPesoNeto}}</q-badge></div>
                    <!--<q-input dense color="green" outlined v-model="pesoNeto" label="Peso Neto" type="number "/>-->
                   </div>
              </div>
            </div>
            </q-card-section>
          </q-card>
        <center class="text-h5">LIQUIDACION</center>

        <q-card-section>
            <div class="row">
                <div class="col-3 q-pa-xs "> <b>valoracion Ag :</b> {{valAg}} </div>
                <div class="col-3 q-pa-xs "><q-input dense outlined v-model="decAg" label="Deduccion Ag" @keyup="calculoParcialAg" type="number" step="0.01"/></div>
                <div class="col-3 q-pa-xs "><q-input dense outlined v-model="pagAg" label="Pagable Ag%" @keyup="calculoParcialAg" type="number"/></div>
                <div class="col-3 q-pa-xs "><b>Parcial Ag: </b> {{parAg}}  </div>
                <div class="col-3 q-pa-xs "><b>valoracion Zn :  </b> {{valZn}} </div>
                <div class="col-3 q-pa-xs "><q-input dense outlined v-model="decZn" label="Deduccion Zn" @keyup="calculoParcialZn" type="number" step="0.01"/></div>
                <div class="col-3 q-pa-xs "><q-input dense outlined v-model="pagZn" label="Pagable Zn" @keyup="calculoParcialZn" type="number"/></div>
                <div class="col-3 q-pa-xs "><b>Parcial Zn: </b> {{parZn}}</div>

                <div class="col-3 q-pa-xs "><b> valoracion Pb: </b> {{valPb}}</div>
                <div class="col-3 q-pa-xs "><q-input dense outlined v-model="decPb" label="Deduccion Pb" @keyup="calculoParcialPb" type="number" step="0.01"/></div>
                <div class="col-3 q-pa-xs "><q-input dense outlined v-model="pagPb" label="Pagable Pb" @keyup="calculoParcialPb" type="number"/></div>
                <div class="col-3 q-pa-xs "><b>Parcial Pb: </b> {{parPb}}</div>
            </div>
            <div><b>TOTAL</b> {{totalParcial}}</div>
        </q-card-section> 
        <q-card-section>
            <div class="row">
                <div class="col-12"><q-input dense outlined v-model="maquila" label="Maquila" type="number"/></div>
            <div class="col-4"><q-input dense outlined v-model="base" label="Base" /></div>
            <div class="col-4"><b>ACTUAL: </b>{{actual}} </div>
            <div class="col-4"><b>TOTAL: </b> {{totaldiff}} </div>
            <div class="col-4"><q-input dense outlined v-model="penalidad" label="Penalidad" /></div>
            <div class="col-4"><b>DESCUENTO BASE</b> {{calculoDesc}} </div>
        </div>     
        <div><b>VALOR PAGABLE:</b>{{totalPagable}}</div>
        <div><b>VALOR BRUTO:</b>{{totalBruto}}</div>   
        </q-card-section>
        <q-card-section>
            <div class="row">
                <div class="col-4">Refinacion de Ag: {{regaliaAg}}</div>
                <div class="col-4"><q-input dense outlined v-model="refinacion" label="Gasto Refinacion" type="number"/></div>
                <div class="col-4"><b>Gasto de Refinacion: </b>{{calculoRefinacion}}</div>
            </div>
            <div class="row">
                <div class="col-4">Total Anticipo: {{anticipo}}</div>
                <div class="col-4"><q-input dense outlined v-model="transporte" label="Transporte" type="number"/></div>
                <div class="col-4">Total Transporte: {{totalTransporte}}</div>
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
            transporte:0,
          //pesoNeto:0,
          refinacion:0,
          codigolote:'',
          penalidad:0,
          lote:{label:''},
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
          anticipo:0,
          lotes:[],
          loteFilter:[],
        }
    },
    created(){
        this.cargarLote()
    },
    methods:{
        cargarLote(){
            this.lotes=[]
            this.$api.get('lote').then((response)=>{
                response.data.forEach(r => {
                    r.label=r.codigo
                    this.lotes.push(r)
                })                
                this.loteFilter=this.lotes
            })
        },
        calculoAnticipo(){
            this.anticipo=0
            this.$api.post('totalAnticipo',{'id':this.lote.id}).then((response)=>{
                console.log(response.data)
                response.data.forEach(r => {
                    this.anticipo+=r.monto
                })
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
                this.buscarQuin(this.lote.fecha)
                this.calculoAnticipo()
        })
        },

        calculoValoracion(){
            this.buscarQuin(this.lote.fecha)
            this.calculoAnticipo()
            this.valAg=(this.plata * 100 / 31.1035).toFixed(2)
            this.valPb=this.plomo
            this.valZn=this.zinc
            this.calculoParcialAg
            this.calculoParcialPb
            this.calculoParcialZn
            this.regaliaAg= (this.valAg * this.calculoPesoNeto / 1000) * this.quincena.plata
            this.regaliaPb= this.calculoPesoNeto * this.plomo * 2.2046223 * this.quincena.plomo
            this.regaliaZn= this.calculoPesoNeto * this.zinc * 2.2046223 * this.quincena.zinc
            console.log(this.regaliaZn)
            console.log(this.calculoPesoNeto)
            console.log(this.zinc)
            console.log(this.quincena.zinc)

        },
        calculoParcialAg(){
            let cal=1
            if(this.pagAg>0 && this.pagAg<=100) cal=this.pagAg/100
            this.parAg = ((this.valAg - this.decAg)*  cal * this.quincena.plata).toFixed(2)
            console.log(this.valAg)
            console.log(this.quincena.plata)
            console.log(this.pagAg)
            console.log( this.parAg)

        },
        calculoParcialZn(){
            let cal=1
            if(this.valZn>0)
            this.actual=this.quincena.zinc
            if(this.pagZn>0 && this.pagZn<=100) cal=this.pagZn/100
            this.parZn = ((this.valZn - this.decZn) * this.quincena.zinc * cal/100).toFixed(2)
        },
        calculoParcialPb(){
            //if(this.pagPb<=0) this.pagPb=100
            if(this.valPb>0)
            this.actual = this.quincena.plomo
                        let cal=1
            if(this.pagPb>0 && this.pagPb<=100) cal=this.pagPb/100
            this.parPb = ((this. valPb - this.decPb) * this.quincena.plata * cal/100).toFixed(2)
        }
    },
    computed:{
        calculoPesoNeto(){
            return this.lote.peso * (100 -  this.humedad)/100 - (this.lote.saco/2) - (this.lote.peso * this.tara/100)
       },
        totalParcial() {
            return parseFloat(this.parAg) + parseFloat(this.parPb) + parseFloat(this.parZn)
        },
        totaldiff(){
            return this.actual - this.base
        },
        calculoDesc(){
            if( this.penalidad==0)
            return this.actual - this.base
        else return (this.actual - this.base ) * this.penalidad
        },
        calculoRefinacion(){
            if(this.refinacion>0)
                return parseFloat(this.regaliaAg) + parseFloat(this.refinacion)
            else
            return parseFloat(this.regaliaAg)
        }, 
        totalDescuento(){
            //if(isNaN(this.maquila)) this.maquila=0
            return parseFloat(this.maquila) + parseFloat(this.calculoRefinacion) + parseFloat(this.calculoDesc)
        },
        totalPagable(){
            return parseFloat(this.totalParcial) - parseFloat(this.totalDescuento)
        },
        totalBruto(){
            return parseFloat(this.totalPagable) * parseFloat(this.calculoPesoNeto) / 1000
        },
        totalTransporte(){
            return parseFloat(this.anticipo) + parseFloat(this.transporte)
        },


    
    }
    
}
</script>
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>