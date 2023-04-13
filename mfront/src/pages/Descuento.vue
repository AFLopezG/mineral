<template>



<table  style="width: 100%;">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Cooperativa</th>
            <th>Direccion</th>
            <th>Representante</th>
            <th>NIM</th>
            <th>NIT</th>
            <th>Celular</th>

        </tr>
    </thead>
    <thead v-for="(c,i) in cooperativa" :key="i">
        <tr>
            <th>{{c.id}}</th>
            <th>{{c.nombre}}</th>
            <th>{{c.direccion}}</th>
            <th>{{c.representante}}</th>
            <th>{{c.nim}}</th>
            <th>{{c.nit}}</th>
            <th>{{c.celular}}</th>

        </tr>
    </thead>

</table>    




    <q-page class="flex flex-center">
    


        
        <pre>{{ cooperativa }}</pre>
    </q-page>
  </template>
  
  <script>
  export default{
    name: 'IndexPage',
    data () {
              return{
                cooperativa:[]
                    }
            },
    methods:{
            },
    created(){
      this.$api.get('http://localhost:8000/api/cooperativa').then((response)=>{ 
        this.cooperativa=response.data
       })
    }
  }
  </script>
  