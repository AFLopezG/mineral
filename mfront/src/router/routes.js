import IndexPage from "pages/IndexPage";
import Cooperativa from "pages/Cooperativa";
import Cliente from "pages/Cliente";
import Diaria from "pages/Diaria";
import Lotes from "pages/Lotes";
import Ley from "pages/Leys";
import Anticipo from "pages/Anticipo";
import Liquidacion from "pages/Liquidacion";
import Termino from "pages/Terminos";
//import Registro from "pages/Registro";

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: IndexPage },
      { path: 'cooperativa', component: Cooperativa },
      { path: 'cliente', component: Cliente },
      { path: 'diaria', component: Diaria },
      { path: 'lote', component: Lotes },
      { path: 'anticipo', component: Anticipo },
      { path: 'ley', component: Ley },
      { path: 'liquidacion', component: Liquidacion },
      { path: 'termino', component: Termino },
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
