import { boot } from 'quasar/wrappers'
import axios from 'axios'
import {Alert} from "src/addons/Alert";
import {Pdf} from "src/addons/Pdf";

// Be careful when using SSR for cross-request state pollution
// due to creating a Singleton instance here;
// If any client changes this (global) instance, it might be a
// good idea to move this instance creation inside of the
// "export default () => {}" function below (which runs individually
// for each client)
const api = axios.create({ baseURL: process.env.API})

export default boot(({ app }) => {
  // for use inside Vue files (Options API) through this.$axios and this.$api

  app.config.globalProperties.$axios = axios
  app.config.globalProperties.$alert = Alert
  app.config.globalProperties.$pdf = Pdf
  app.config.globalProperties.$minerales = ['Plata','Zinc-Plata','Plomo-Plata','Broza']
  app.config.globalProperties.$tipos = ['Concentrado','Broza']
  // ^ ^ ^ this will allow you to use this.$axios (for Vue Options API form)
  //       so you won't necessarily have to import axios in each vue file

  app.config.globalProperties.$api = api
  // ^ ^ ^ this will allow you to use this.$api (for Vue Options API form)
  //       so you can easily perform requests against your app's API
})

export { api }
