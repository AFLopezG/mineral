<template>
<q-page >
<div class="col-12">
  <q-table
      title="COOPERATIVAS"
      :rows="cooperativas"
      :columns="columns"
      row-key="name"
    >
    <template v-slot:top-right>
      <q-btn color="green" icon="check" label="Registrar" @click="onClick" />
        <q-input borderless dense debounce="300" v-model="filter" placeholder="Search">
          <template v-slot:append>
            <q-icon name="search" />
          </template>
        </q-input>
      </template>
      <template v-slot:body-cell-opcion="props">
            <q-td :props="props" auto-width>
              <q-btn size="10px" icon="add_circle_outline" label="descuento"  color="accent" />
              <q-btn size="10px" icon="add_circle_outline" label="modifcar"  color="yellow" />
              <q-btn size="10px" icon="remove_circle" label="modifcar"  color="red" />
            </q-td>
      </template>

    </q-table>
</div>
</q-page>
</template>

<script>
export default {
  name: `Cooperativas`,
  data() {
    return {
      cooperativas:[],
      filter:'',
      columns:[
        {name:'opcion',label:'OPCION',field:'opcion'},
        {name:'nombre',label:'NOMBRE',field:'nombre'},
        {name:'direccion',label:'DIR',field:'direccion'},
        {name:'representante',label:'Rep',field:'representante'},
        {name:'nit',label:'NIT',field:'nit'},
        {name:'celular',label:'CEL',field:'celular'},
      ]
    }
  },
  created(){
    this.listCoop();
  },
  methods:{
    listCoop(){
      this.$api.get('cooperativa').then(res => {
        this.cooperativas=res.data
      })
    }
  }


}
</script>

<style>

</style>
