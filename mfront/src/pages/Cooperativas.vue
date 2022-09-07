<template>
<q-page padding>
<div class="row">
  <q-table
      title="COOPERATIVAS"
      :rows="cooperativas"
      :columns="columns"
      row-key="name"
    >
      <template v-slot:body-cell-opcion="props">
            <q-td :props="props" auto-width>
              <q-btn size="10px" icon="add_circle_outline" label="modifcar"  color="primary" />
              <q-btn size="10px" icon="remove_circle" label="modifcar"  color="primary" />
            </q-td>
          </template>
    </q-table>
</div>
</q-page>
</template>

<script>
export default {
  data() {
    return {
      cooperativas:[],
      columns:[
        {name:'nombre',label:'NOMBRE',field:'nombre'},
        {name:'direccion',label:'DIR',field:'direccion'},
        {name:'representante',label:'Rep',field:'representante'},
        {name:'nit',label:'NIT',field:'nit'},
        {name:'celular',label:'CEL',field:'celular'},
        {name:'opcion',label:'OPCION',field:'opcion'},
      ]
    }
  },
  created:{

  },
  method:{
    listCoop(){
      'cooperativa'
    }
  }


}
</script>

<style>

</style>
