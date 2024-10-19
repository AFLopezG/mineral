<template>
    <q-page class="q-pa-xs" id="contenido-a-imprimir">
        <center class="text-h5">LIQUIDACION FINAL</center>
        <div class="row q-pa-xs">
            <div class="col-3">
                <q-select dense outlined v-model="lote" :options="lotes"
                label="Codigo de Lote" />
                <!-- <pre>{{lote}}</pre> -->
            </div>
        </div>
          <q-card class="my-card">
            <q-card-section>
                 <div class="row " >
                    <div class="col-6 q-pa-xs">
                       <div class="row " v-if="lote.id!=undefined">
                            <div class="col-6"><b>MINERAL: </b>{{lote.mineral}}</div>
                            <div class="col-6"><b>COOPERATIVA: </b> {{lote.cooperativa.nombre}}  </div>
                            <div class="col-6"><b>CLIENTE: </b>  {{lote.cliente.nombre}}  </div>
                            <div class="col-6"><b>PESO: </b> {{lote.peso}}<b> KILOGRAMOS</b>  </div>
                            <div class="col-6"><b>CANTIDAD DE SACOS: </b> {{lote.saco}} </div>
                            <div class="col-6"><b>FECHA DE ENTREGA: </b> {{lote.fecha}}  </div>
                    <!--<div class="col-4"><b>TARA:</b> <q-toggle v-model="tara" :true-value="1" :false-value="0"/>                     </div>-->
                    <!--<div class="col-12"><q-badge color="orange" text-color="black" style="width:200px; height:40px; font-size:14px; " label="PESO NETO: ">{{calculoPesoNeto}}</q-badge></div>-->
                    <!--<q-input dense color="green" outlined v-model="pesoNeto" label="Peso Neto" type="number "/>-->
                        </div>
                    </div>
                </div>
            </q-card-section>

            <q-card-section>
            <div class="row " >
                <div class="row " v-if="lote.id!=undefined">
                    <div class="col-12">
                        <center class="text-h5">LEYES DEL LOTE</center>
                    </div>
                        <div class="col-6"><b>Ley Plomo: </b> {{lote.ley.plomo}}<b> %</b></div>
                        <div class="col-6"><b>Ley plata: </b> {{lote.ley.plata}}<b> D.M.</b>  </div>
                        <div class="col-6"><b>Ley Zinc: </b> {{lote.ley.zinc}}<b> %</b>  </div>
                        <div class="col-6"><b>Ley Estaño: </b> {{lote.ley.estaño}}<b> %</b>  </div>
                        <div class="col-6"><b>Humedad: </b> {{lote.ley.humedad}}<b> %</b></div>
                  <!--  <div><q-btn color="green" label="liquidar" @click="calculoPrecioBruto"/>Bruto pagable :  {{ brutoPagable }}</div>-->
                    
                    <br>
                    
                </div> 
            </div>

         </q-card-section>
         <q-card-section>
             <div class="row" v-if="lote.tipo!='Broza'">
                <div class="col-12">
                        <div class="text-h5 text-center">
                            TERMINOS DE EXPORTACION
                        </div>
                    </div>
              <div class="col-3">  
                <q-select dense outlined v-model="terminos.nombre" :options="terminos" label="Escoja Terminos" />
              </div>

                <div class="row col-12 " v-if="terminos.nombre!=undefined">
                    <div class="col-6"><b> Contrato: </b> {{terminos.nombre?.nombre}}</div>
                    <!-- Plata pagable: { "id": 4, "nombre": "4", "plataPagable": "2.00", "plomoPagable": "3.00", "zincPagable": "4.00", "refino": "5.00", "maquila": 6, "transporte": 8, "base": 7, "label": "4" } -->
                    <div class="col-6"><b> Plata pagable: </b> {{terminos.nombre?.plataPagable}}</div>
                    <div class="col-6"><b> Plomo pagable: </b> {{terminos.nombre?.plomoPagable}}</div>
                    <div class="col-6"><b> Zinc pagable: </b> {{terminos.nombre?.zincPagable}}</div>
                    <div class="col-6"><b> Refinacion: </b> {{terminos.nombre?.refino}}</div>
                    <div class="col-6"><b> Maquila: </b> {{terminos.nombre?.maquila}}</div>
                    <div class="col-6"><b> Transporte: </b> {{terminos.nombre?.transporte}}</div>
                    <div class="col-6"><b> Base: </b> {{terminos.nombre?.base}}</div>
                </div>
             </div>
             <div v-else>
                aaaa
             </div>
            </q-card-section>
          </q-card>
          <q-form>
          <br>
          <div><!--q-btn color="green" label="liquidar" @click="calculoPrecioBruto"/!--> </div>
          <br>
           
      <div class="row" >
            <div class="col-6">
                <b>Cotizacion Quincenal Zinc: </b> {{this.quincena.zinc}}<b> %</b><br>
                <b>Cotizacion Quincenal Plomo: </b> {{this.quincena.plomo}}<b> %</b><br>
                <b>Cotizacion Quincenal Plata: </b> {{this.quincena.plata}}<b> D.M.</b><br>
            </div>
            <div class="col-6">
                <b>Cotizacion Diaria Zinc: </b> {{this.diaria.zinc}}<b> %</b>zzzzza<br>
                <b>Cotizacion Diaria Plomo: </b> {{this.diaria.plomo}}<b> %</b><br>
                <b>Cotizacion Diaria Plata: </b> {{this.diaria.plata}}<b> D.M.</b><br>
            </div>
       
      </div>
          <center class="text-h5">Valoracion Mineral</center>
        <q-card-section>
            <div class="row"  >  
            <div class="col-3 " >
                <div class="col-3 q-pa-xs">Regalia Zinc:{{ zinc }} </div>
                <div class="col-3 q-pa-xs">Regalia Plomo:{{ plomo }} </div>
                <div class="col-3 q-pa-xs">Regalia Plata:{{ plata }} </div>
            </div>
            <div class="col-3 " >
                <div class="col-3 q-pa-xs">Peso Fino Zinc:{{ pfzinc }} </div>
                <div class="col-3 q-pa-xs">Peso Fino Plomo:{{ pfplomo }} </div>
                <div class="col-3 q-pa-xs">Peso Fino Plata:{{ pfplata }} </div>
            </div>        
            <div class="col-3 " >
                <div class="col-3 q-pa-xs">Valor Bruto Zinc:{{ vbzinc }} </div>
                <div class="col-3 q-pa-xs">Valor Bruto Plomo:{{ vbplomo }} </div>
                <div class="col-3 q-pa-xs">Valor Bruto Plata:{{ vbplata }} </div>
                <div class="col-3 q-pa-xs">Valor Bruto Pagable:{{ brutoPagable }} </div>
            </div>
            <div class="col-3 " >
                <div class="col-3 q-pa-xs">Valor Neto Zinc:{{ vbczinc }} </div>
                <div class="col-3 q-pa-xs">Valor Neto Plomo:{{ vbcplomo }} </div>
                <div class="col-3 q-pa-xs">Valor Neto Plata:{{ vbcplata }} </div>
                <div class="col-3 q-pa-xs">Valor Neto Pagable:{{ netoPagable }} </div>
            </div>
        </div>
         
        </q-card-section>   

        <center class="text-h5">DESCUENTOS</center>
        <div class="col-12 q-pa-xs" >
                <div class="col-3 q-pa-xs">Total Regalias:{{trm}} </div>
                <div class="col-3 q-pa-xs">Caja Nacional de Salud:{{ plomo }} </div>
                <div class="col-3 q-pa-xs">Coorporacion Minera de Bolivia:{{ plata }} </div>
                <div class="col-3 q-pa-xs">Total Anticipos:{{anticipo}} </div>
                <div v-if="lote?.cooperativa?.descuentos">
                    <div v-for="d in lote?.cooperativa?.descuentos" :key="d.id">
                        <span>{{d.nombre}}</span>  
                        <span>{{ d.porcentaje*netoPagable }}</span>
                        <!-- <pre>{{ d }}</pre> -->
                    </div>
                </div>
            </div>
        <div><q-btn color="green" label="liquidar" @click="calculoPrecioBruto"/> </div>   
        <div>
            <q-btn color="primary" label="Imprimir" @click="imprimir"/>
        </div> 
        </q-form>

        <!-- <q-card-section>
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
        <div><b>TOTAL DEDUCION:</b>{{totaldeduccio}}</div>
        <div><b>VALOR :</b>{{calculoValor}}</div>
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

        </q-card-section>-->
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
            //rollback:0,
            //molienda:0,
            loading: false,
            transporte:0,
          //pesoNeto:0,
          refinacion:0,
          codigolote:'',
          //penalidad:0,
          lote:{label:''},
          ley:{},
          zinc:0,
          plomo:0,
          plata:0,
          pfzinc:0,
          pfplomo:0,
          pfplata:0,
          vbzinc:0,
          vbplomo:0,
          vbplata:0,
          vbcplata:0,
          vbczinc:0,
          vbcplomo:0,
          humedad:0,
          tara:0,
          regaliaAg:0,
          regaliaZn:0,
          regaliaPb:0,
        //   valAg:0,
        //   valZn:0,
        //   valPb:0,
        //   decAg:0,
        //   decZn:0,
        //   decPb:0,
        //   pagAg:0,
        //   pagZn:0,
        //   pagPb:0,
        //   parAg:0,
        //   parZn:0,
        //   parPb:0,
          base:0,
          maquila:0,
          actual:0,
          quincena:{},
          //quincena:[],
          diaria:{},
         // diaria:[],
          anticipo:0,
          lotes:[],
          loteFilter:[],
          terminos:[],
          tremino:{},
          terminoFilter:[],
          leys:[],
          leyFilter:[],
          liquidoPagable:0,
          brutoPagable:0,
          netoPagable:0,
          trm:0,
        }
    },
    created(){
        this.cargarLote();
        this.cargarTermino();
    },
    methods:{       
        imprimir(){
            const contenido = document.getElementById('contenido-a-imprimir').innerHTML;
      const ventana = window.open('', '', 'width=800,height=600');
      ventana.document.write(`
        <html>
          <head>
            <title>Imprimir</title>
            <style>
              /* Agrega aquí estilos que desees aplicar solo a la impresión */
            </style>
          </head>
          <body>
            ${contenido}
          </body>
        </html>
      `);
      ventana.document.close();
      ventana.print();
      ventana.close();
        },
        async calculoPrecioBruto(){
            this.ley = this.lote.ley;
            console.log(this.quincena);
            await this.buscarQuin(this.lote.fecha);
            
            this.calculoAnticipo(this.lote.id);
            
            // if (this.lote.tipo == 'Concentrado') {
            await this.buscarDia(this.lote.fecha);
                //this.pfzinc=((this.lote.ley.zinc * this.calculoPesoNeto)/100).toFixed(2)
            this.pfzinc=this.totalFinozn
            this.pfplomo=this.totalFinopb
            this.pfplata=this.totalFinoag
            //this.pfplata=((this.lote.ley.plata * this.calculoPesoNeto)/10000).toFixed(2)
            //this.vbzinc=(((this.pfzinc ) *2.2046223)*this.quincena.zinc).toFixed(2)
            this.vbzinc=this.totalValBrutoZn
            //this.vbplomo=(((this.pfplomo ) *2.2046223)*this.quincena.plomo).toFixed(2)
            this.vbplomo=this.totalValBrutoPb
            //this.vbplata=(((this.pfplata)*32.15073)*this.quincena.plata).toFixed(2)
            this.vbplata=this.totalValBrutoAg
            //this.zinc = (this.vbzinc*this.quincena.alplomo/100).toFixed(2)
            this.zinc = this.totalRegaliaZn
            //this.plomo = (this.vbplomo*this.quincena.alplomo/100).toFixed(2)
            this.plomo = this.totalRegaliaPb
            //this.plata = (this.vbplata*this.quincena.alplata/100).toFixed(2)
            this.plata=this.totalRegaliaAg
            this.trm=((this.vbzinc*this.quincena.alplomo/100)+(this.vbplomo*this.quincena.alplomo/100)+(this.vbplata*this.quincena.alplata/100)).toFixed(2)
            this.vbczinc=((((this.pfzinc ) *2.2046223)*this.quincena.zinc)*(this.terminos.nombre.zincPagable/100)).toFixed(2)
            this.vbcplomo=((((this.pfplomo ) *2.2046223)*this.quincena.plomo)*(this.terminos.nombre.plomoPagable/100)).toFixed(2)    
           // this.vbcplata=((((this.pfplata)*32.15073)*this.quincena.plata)*(this.terminos.nombre.plataPagable/100)).toFixed(2)    
           this.vbcplata=(((this.totalValorNetoAg * this.diaria.plata)*(this.terminos.nombre.plataPagable))/100).toFixed(2)
           //console.log(this.diaria.plata);
           //this.vbcplata = this.diaria.plata
           //console.log(this.quincena.plata);
            this.brutoPagable = ((((this.pfzinc ) *2.2046223)*this.quincena.zinc)+(((this.pfplomo ) *2.2046223)*this.quincena.plomo)+(((this.pfplata)*32.15073)*this.quincena.plata)).toFixed(2)
            this.netoPagable=(((((this.pfzinc ) *2.2046223)*this.quincena.zinc)*(this.terminos.nombre.zincPagable/100))+((((this.pfplomo ) *2.2046223)*this.quincena.plomo)*(this.terminos.nombre.plomoPagable/100))+((((this.pfplata)*32.15073)*this.quincena.plata)*(this.terminos.nombre.plataPagable/100))).toFixed(2)
            // }
             //else
            // {
              //   this.liquidoPagable=0
            // }
         },

         calculoDescuento(){
            let descuentos=this.lote.cooperativa.descuentos
            descuentos.forEach(d => {
                d.resulta= d.porcentaje * parseFloat(this.liquidoPagable)
                
            });
         },
        cargarLote(){
            this.lotes=[]
            this.$api.get('lote').then((response)=>{
               console.log(response.data)
                response.data.forEach(r => {
                    r.label=r.codigo
                    this.lotes.push(r)
                })                
                this.loteFilter=this.lotes
            })
        },


        cargarTermino(){
            this.terminos=[]
            this.$api.get('termino').then((response)=>{
              // console.log(response.data)
               response.data.forEach(t => {
                   t.label=t.nombre
                 this.terminos.push(t)
                
                })                
                //this.termino=this.terminos
            })
        },

    

        calculoAnticipo(id1){
            this.anticipo=0
            this.$api.post('totalAnticipo',{'id':id1}).then((response)=>{
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
                    message: 'No existe Cotizacion Quincenal',
                    color: 'red',
                    icon:'warning'
                    })
            })

        },

        async buscarDia(fech) {
            this.diaria = {};
            try {
                const response = await this.$api.post('buscarDiaria', { 'fecha': fech });
                console.log(response.data);
                
                this.diaria = response.data;
                
                if (this.diaria.id === undefined) {
                    this.$q.notify({
                        message: 'No existe Cotizacion Diaria',
                        color: 'red',
                        icon: 'warning'
                    });
                }
            } catch (error) {
                console.error('Error al buscar la cotización diaria:', error);
                this.$q.notify({
                    message: 'Error al obtener la cotización diaria',
                    color: 'red',
                    icon: 'warning'
                });
            }
        },
        buscarlote(){
            this.lote={}
            this.$api.post('searchLote',{codigo:this.codigolote}).then((response)=>{
                console.log(response.data)
                this.lote=response.data
               // this.buscarQuin(this.lote.fecha)
                //this.buscarDia(this.lote.fecha)
                //this.calculoAnticipo()
        })
        },

        // buscarTermino(){
        //     this.termino={}
        //     this.$api.post('searchTermino',{codigo:this.nombre}).then((response)=>{
        //         //console.log(response.data)
        //         this.termino=response.data
              
        // })
        // },

        // calculoValoracion(){
        //     this.buscarQuin(this.lote.fecha)
        //     this.buscarDia(this.lote.fecha)
        //     this.calculoAnticipo()
        //     this.valAg=(this.plata * 100 / 31.1035).toFixed(2)
        //     this.valPb=this.plomo
        //     this.valZn=this.zinc
        //     this.calculoParcialAg
        //     this.calculoParcialPb
        //     this.calculoParcialZn
        //     this.regaliaAg= (this.valAg * this.calculoPesoNeto / 1000) * this.quincena.plata
        //     this.regaliaPb= this.calculoPesoNeto * this.plomo * 2.2046223 * this.quincena.plomo
        //     this.regaliaZn= this.calculoPesoNeto * this.zinc * 2.2046223 * this.quincena.zinc
        //     console.log(this.regaliaZn)
        //     console.log(this.calculoPesoNeto)
        //     console.log(this.zinc)
        //     console.log(this.quincena.zinc)

        // },
    //     calculoParcialAg(){
    //         let cal=1
    //         if(this.pagAg>0 && this.pagAg<=10000) cal=this.pagAg/100
    //         this.parAg = ((this.valAg - this.decAg)*  cal * this.quincena.plata).toFixed(2)
    //         console.log(this.valAg)
    //         console.log(this.quincena.plata)
    //         console.log(this.pagAg)
    //         console.log( this.parAg)

    //     },
    //     calculoParcialZn(){
    //         let cal=1
    //         if(this.valZn>0)
    //         this.actual=this.quincena.zinc
    //         if(this.pagZn>0 && this.pagZn<=100) cal=this.pagZn/100
    //         this.parZn = ((this.valZn - this.decZn) * this.quincena.zinc * cal/100).toFixed(2)
    //     },
    //     calculoParcialPb(){
    //         //if(this.pagPb<=0) this.pagPb=100
    //         if(this.valPb>0)
    //         this.actual = this.quincena.plomo
    //                     let cal=1
    //         if(this.pagPb>0 && this.pagPb<=100) cal=this.pagPb/100
    //         this.parPb = ((this. valPb - this.decPb) * this.quincena.plata * cal/100).toFixed(2)
    //     }
     },
    computed:{
        calculoPesoNeto(){
            return (this.lote.peso - (this.lote.peso * this.ley.humedad/100) - ((this.lote.peso-(this.lote.peso * this.ley.humedad/100))*1/100)).toFixed(2)
            //return this.lote.peso * (100 -  this.humedad)/100 - (this.lote.saco/2) - (this.lote.peso * this.tara/100)
       },
        // totalParcial() {
        //     return parseFloat(this.parAg) + parseFloat(this.parPb) + parseFloat(this.parZn)
        // },
        // totaldiff(){
        //     return this.actual - this.base
        // },
        // calculoDesc(){
        //     if( this.penalidad==0)
        //     return this.actual - this.base
        // else return (this.actual - this.base ) * this.penalidad
        // },
        // calculoRefinacion(){
        //     if(this.refinacion>0)
        //         return parseFloat(this.regaliaAg) + parseFloat(this.refinacion)
        //     else
        //     return parseFloat(this.regaliaAg)
        // },
        // totaldeduccio(){
        //     return (parseFloat(this.maquila) + parseFloat(this.calculoDesc)).toFixed(2)
        // },
        // calculoValor(){
        //     return parseFloat(this.totalParcial) - parseFloat(this.totaldeduccio)
        // },
        // totalDescuento(){
        //     //if(isNaN(this.maquila)) this.maquila=0
        //     return parseFloat(this.maquila) + parseFloat(this.calculoRefinacion) + parseFloat(this.calculoDesc)
        // },
        // totalPagable(){
        //     return parseFloat(this.totalParcial) - parseFloat(this.totalDescuento)
        // },
         totalFinozn(){
             return ((this.lote.ley.zinc * this.calculoPesoNeto)/100).toFixed(2)
             //return (parseFloat(this.calculoPesoNeto) * parseFloat(this.calculoValor)   /1000).toFixed(2)
         },
         totalFinopb(){
             return ((this.lote.ley.plomo * this.calculoPesoNeto)/100).toFixed(2)    
         },
         totalFinoag(){
            return ((this.lote.ley.plata * this.calculoPesoNeto)/10000).toFixed(2)
        },
       
        totalValBrutoZn(){
            return (((((this.lote.ley.zinc * this.calculoPesoNeto)/100))*2.2046223)*this.quincena.plata).toFixed(2)
        },
        totalValBrutoPb(){
            return (((((this.lote.ley.plomo * this.calculoPesoNeto)/100))*2.206223)*this.quincena.plata).toFixed(2)
        },
        totalValBrutoAg(){
            return (((((this.lote.ley.plata * this.calculoPesoNeto)/10000))*32.15073)*this.quincena.plata).toFixed(2)
        },
       
        totalRegaliaZn(){
         return(this.totalValBrutoZn*this.quincena.alzinc/100).toFixed(2)
        },
        
        totalRegaliaPb(){
         return(this.totalValBrutoPb*this.quincena.alplomo/100).toFixed(2)
        },
        totalRegaliaAg(){
            return  (this.totalValBrutoAg*this.quincena.alplata/100).toFixed(2)
        },       

        totalValorNetoAg (){
            return ((((((this.lote.ley.plata - 3.5) * this.calculoPesoNeto)/10000))*32.15073)).toFixed(2)
        },          
    
        // totalTransporte(){
        //     return parseFloat(this.anticipo) + parseFloat(this.transporte)
        // },
        
        
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