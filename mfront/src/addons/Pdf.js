import jsPDF from "jspdf";

export class Pdf{
  static Anticipo(anticipo){
    var doc = new jsPDF('p', 'mm', [210, 297]);
    doc.setFontSize(12);
    doc.text("Anticipo", 40, 50);
    doc.text("Fecha: "+anticipo.fecha, 40, 70);
    doc.text("Monto: "+anticipo.monto, 40, 90);
    doc.text("Observaciones: "+anticipo.observaciones, 40, 110);
    doc.save("anticipo.pdf");
  }
}
