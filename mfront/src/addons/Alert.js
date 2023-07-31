import {Notify} from "quasar";

export class Alert{
  static success(message){
    Notify.create({
      message: message,
      color: 'positive',
      icon: 'check',
      position: 'top',
      timeout: 1000
    })
  }
  static error(message){
    Notify.create({
      message: message,
      color: 'negative',
      icon: 'warning',
      position: 'top',
      timeout: 1000
    })
  }
}
