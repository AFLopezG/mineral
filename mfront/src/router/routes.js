import IndexPage from "pages/IndexPage";
import Cooperativa from "pages/Cooperativa";
import Cliente from "pages/Cliente";
import Diario from "pages/Diario";
import Lotes from "pages/Lotes";
import Anticipo from "pages/Anticipo.vue";
import Liquidacion from "pages/Liquidacion.vue";
//import Registro from "pages/Registro";

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: IndexPage },
      { path: 'cooperativa', component: Cooperativa },
      { path: 'cliente', component: Cliente },
      { path: 'diario', component: Diario },
      { path: 'lote', component: Lotes },
      { path: 'anticipo', component: Anticipo },
      { path: 'liquidacion', component: Liquidacion }
      //{ path: 'registro', component: Registro },
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
