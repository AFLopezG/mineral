import jsPDF from "jspdf"
import conversor from 'conversor-numero-a-letras-es-ar'
import moment from "moment";
import 'moment/locale/es';
export class Pdf{
  static anticipoMediaCarta(anticipo){
    var doc = new jsPDF('p', 'mm', 'letter')
    doc.rect(5, 5, 205, 140)
    doc.addFont("fonts/DancingScript-VariableFont_wght.ttf", "Dancing", "normal")
    doc.addFont("fonts/Belanosima-Regular.ttf", "Belanosima", "normal")
    doc.setFont('Belanosima', 'normal')

    doc.setFontSize(20)
    doc.text("ORDEN DE PAGO", 102, 30, { align: 'center' })
    doc.line(75, 31, 130, 31)
    doc.setFontSize(12)


    doc.setFontSize(12)
    doc.text("ORURO-BOLIVIA", 30, 25, { align: 'center' })

    doc.setFontSize(10)
    doc.text("BS.", 160, 36, { align: 'center' })
    doc.rect(170, 30, 30, 10)
    doc.text( parseFloat(anticipo.monto).toFixed() , 180, 36, { align: 'center' })
    doc.setFontSize(12)
    doc.text("CANCELAR A:", 10, 50)
    doc.line(50, 51, 200, 51)
    doc.setFontSize(11)
    doc.text(this.mostrarValor(anticipo.nombreChofer), 50, 50)

    doc.setFontSize(12)
    doc.text("LA SUMA DE:", 10, 60)
    doc.line(50, 61, 200, 61)
    doc.setFontSize(11)
    const ClaseConversor = conversor.conversorNumerosALetras
    const miConversor = new ClaseConversor()
    const texto = miConversor.convertToText(parseInt(anticipo.monto))+ " 00/100 Bolivianos"
    doc.text(texto+'', 50, 60)

    doc.setFontSize(12)
    doc.text("POR CONCEPTO DE:", 10, 70)
    doc.line(50, 71, 200, 71)
    doc.setFontSize(11)
    doc.text(this.mostrarValor(anticipo.descripcion), 50, 70, { align: 'justify',maxWidth: 150 })

    doc.setFontSize(12)
    doc.text("PROCEDENCIA:", 10, 80)

    doc.setFontSize(11)
    doc.text(`ORURO, ${moment().format('DD')} de ${moment().format('MMMM')} de ${moment().format('YYYY')}`, 80, 90)

    doc.save("anticipo.pdf")
    return doc.output('datauristring')
  }
  static mostrarValor(text){
    if(text==null || text==undefined){
      return ""
    }
    return text
  }
}
