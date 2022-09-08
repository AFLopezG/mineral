<template>
<q-page >
<div class="col-12">
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
  name: `Cooperativas`,
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
