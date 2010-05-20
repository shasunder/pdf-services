/*
 * @author Sandeep.Maloth
 */
package com.ipad.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import com.ipad.dao.PdfDAO;
import com.ipad.model.Pdf;


/**
 * Simple encapsulation of pdf business service. <br>
 * Any business logic for pdf operations should be implemented here.
 */
@Component(value = "pdfService")
public class PdfServiceImpl implements PdfService {

  PdfDAO pdfDAO;

  public Pdf create(String pdfXml) {
    Pdf pdf = new Pdf();
    pdfDAO.create(pdf);
    return pdf;
  }

  public Pdf readById(String pdfId) {
    return pdfDAO.readById(pdfId);
  }

  public Pdf update(String pdfId, String pdfXml) {
    Pdf pdf = new Pdf();
    pdf.setPdfId(pdfId);
    pdfDAO.update(pdf);
    return pdf;
  }

  public Pdf delete(String pdfId) {
    Pdf pdf = new Pdf();
    pdf.setPdfId(pdfId);
    pdfDAO.delete(pdf);
    return pdf;
  }

  @Autowired
  public void setPdfDAO(PdfDAO pdfDAO) {
    this.pdfDAO = pdfDAO;
  }

}
