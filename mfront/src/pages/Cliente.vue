<template>
    <h4>REGISTRO DE CLIENTES</h4>
    <div class="q-pa-md">
    <q-markup-table>
      <thead>
        <tr>
          <th class="text-left">Nro</th>
          <th class="text-left">Nombre</th>
          <th class="text-left">C.I.</th>
          <th class="text-left">Telefono</th>
          <th class="text-left">Celular</th>
          <th class="text-left">Estado</th>
          <th class="text-left">Fecha Alta</th>
          <th class="text-left">Cooperativa</th>
          <th class="text-left">Opciones</th>
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

        </tr>
    </thead>
      <tbody>
       
      </tbody>
    </q-markup-table>
  </div>






    <q-page class="flex flex-center">
    


        
        <pre>{{ cliente }}</pre>
    </q-page>
  </template>
  
  <script>
  export default{
    name: 'IndexPage',
    data () {
              return{
                cliente:[]
                    }
            },
    methods:{
            },
    created(){
      this.$api.get('http://localhost:8000/api/cliente').then((response)=>{ 
        this.cliente=response.data
       })
    }
  }
  </script>
  