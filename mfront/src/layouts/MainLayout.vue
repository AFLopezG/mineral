
<template>
  <q-layout view="lHh Lpr lff" >
      <q-header elevated class="">
        <q-toolbar>
<!--          <q-toolbar-title>EMPRESA MINERA LA CORDILLERA DEL SUR</q-toolbar-title>-->
          <q-toolbar-title>Empresa minera la cordillera del sur</q-toolbar-title>
          <q-btn flat @click="drawer = !drawer" round dense icon="menu" />
        </q-toolbar>
      </q-header>

      <q-drawer
        v-model="drawer"
        show-if-above
        :width="200"
      >
        <q-scroll-area style="height: calc(100% - 150px); margin-top: 150px; border-right: 1px solid #ddd">
          <q-list padding>
            <q-item v-for="m in menus" :key="m.title" clickable v-ripple :to="m.to" exact active-class="bg-primary text-white">
              <q-item-section avatar>
                <q-icon :name="m.icon" />
              </q-item-section>
              <q-item-section class="text-subtitle2">
                {{ m.title }}
              </q-item-section>
            </q-item>
<!--            <q-item clickable v-ripple to="/" exact >-->
<!--              <q-item-section avatar>-->
<!--                <q-icon name="inbox" />-->
<!--              </q-item-section>-->
<!--              <q-item-section>-->
<!--                Inicio-->
<!--              </q-item-section>-->
<!--            </q-item>-->
<!--            <q-item clickable v-ripple to="/Cooperativa" exact >-->
<!--              <q-item-section avatar>-->
<!--                <q-icon name="star" />-->
<!--              </q-item-section>-->

<!--              <q-item-section>-->
<!--                Cooperativas-->
<!--              </q-item-section>-->
<!--            </q-item>-->

<!--            <q-item clickable v-ripple to="/Cliente" exact>-->
<!--              <q-item-section avatar>-->
<!--                <q-icon name="people" />-->
<!--              </q-item-section>-->

<!--              <q-item-section>-->
<!--                Clientes-->
<!--              </q-item-section>-->
<!--            </q-item>-->

<!--            <q-item clickable v-ripple to="">-->
<!--              <q-item-section avatar>-->
<!--                <q-icon name="book" />-->
<!--              </q-item-section>-->

<!--              <q-item-section>-->
<!--                Lotes-->
<!--              </q-item-section>-->
<!--            </q-item>-->

<!--            <q-item clickable v-ripple to="">-->
<!--              <q-item-section avatar>-->
<!--                <q-icon name="send" />-->
<!--              </q-item-section>-->

<!--              <q-item-section>-->
<!--                Leyes-->
<!--              </q-item-section>-->
<!--            </q-item>-->

<!--            <q-item clickable v-ripple to="">-->
<!--              <q-item-section avatar>-->
<!--                <q-icon name="money" />-->
<!--              </q-item-section>-->

<!--              <q-item-section>-->
<!--                Anticipos-->
<!--              </q-item-section>-->
<!--            </q-item>-->

<!--            <q-item clickable v-ripple to="">-->
<!--              <q-item-section avatar>-->
<!--                <q-icon name="unlook" />-->
<!--              </q-item-section>-->

<!--              <q-item-section>-->
<!--                Liquidacion-->
<!--              </q-item-section>-->
<!--            </q-item>-->

<!--            <q-item clickable v-ripple to="">-->
<!--              <q-item-section avatar>-->
<!--                <q-icon name="local_printshop" />-->
<!--              </q-item-section>-->

<!--              <q-item-section>-->
<!--                Reporte-->
<!--              </q-item-section>-->
<!--            </q-item>-->

          </q-list>
        </q-scroll-area>

        <q-img class="absolute-top" src="avatar1.jpg" style="height: 150px">
          <div class="absolute-bottom bg-transparent">
            <q-avatar size="56px" class="q-mb-sm">
              <img src="https://cdn.quasar.dev/img/boy-avatar.png">
            </q-avatar>
            <div class="text-weight-bold">Razvan Stoenescu</div>
            <div>@rstoenescu</div>
          </div>
        </q-img>
      </q-drawer>

      <q-page-container>
        <router-view></router-view>
      </q-page-container>
    </q-layout>
</template>

<script>
import { ref } from 'vue'

export default {
  data() {
    return {
      drawer: true,
      menus: [
        {
          title: "Inicio",
          icon: "o_inbox",
          to: "/",
        },
        {
          title: "Cooperativas",
          icon: "o_apartment",
          to: "/Cooperativa",
        },
        {
          title: "Clientes",
          icon: "o_people",
          to: "/Cliente",
        },
        {
          title: "Lotes",
          icon: "o_book",
          to: "/Lote",
        },
        {
          title: "Leyes",
          icon: "o_send",
          to: "/Ley",
        },
        {
          title: "Anticipos",
          icon: "o_money",
          to: "/Anticipo",
        },
        {
          title: "Liquidacion",
          icon: "o_local_drink",
          to: "/Liquidacion",
        },
        {
          title: "Reporte",
          icon: "o_local_printshop",
          to: "/Reporte",
        },
      ]
    }
  },
}
</script>

<style lang="scss">
.my-menu-link {
  color: white;
  background: #F2C037;
}
</style>
