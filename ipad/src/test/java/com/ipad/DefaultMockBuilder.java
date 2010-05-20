/*
 * @author Sandeep.Maloth
 */
package com.ipad;

import java.io.File;
import java.io.IOException;
import java.util.Date;

import org.apache.commons.io.FileUtils;

import com.ipad.common.PdfException;


public class DefaultMockBuilder {

  private static final String BRANCH_TEMPLATE_PATH = "src/test/resources/pdf-sample.xml";
  public static final String BRANCH_MATCHES = "<matches><pdf/></matches";
  public static final String BRANCH_XML = "<pdf><orgname>Test pdf</orgname><pdflocation id=\"0000000001\"></pdf>";
  private static DefaultMockBuilder instance=new DefaultMockBuilder();
  
  String template = null;
  private DefaultMockBuilder() { //singleton
  }

  public static DefaultMockBuilder getInstance() {
    return instance;
  }
  public Pdf getMockPdf(){
    Pdf pdf = new Pdf();
    pdf.setPdfXml(BRANCH_XML);
    return pdf;
  }
  
  public String getMockMatches(){
    return BRANCH_MATCHES;
  }
  
  public String getMockPdfXml(){
    return BRANCH_XML;
  }
  
  public String getMockPdfXmlRandom(){
    String pdf=null;
    try {
      template =template ==null? FileUtils.readFileToString(new File(BRANCH_TEMPLATE_PATH)) : template;
      String pdfId = (System.currentTimeMillis()+"").substring(0,10);
      pdf= template.replaceAll("\\{ID\\}", pdfId);
      pdf= pdf.replaceAll("\\{DATE\\}", new Date()+"");
    } catch (IOException e) {
      throw new RuntimeException(e);
    }
    return pdf;
  }
  
  public Pdf getMockPdfRandom(){
    String pdfXml=null;
    Pdf b= new Pdf();
    try {
      template =template ==null? FileUtils.readFileToString(new File(BRANCH_TEMPLATE_PATH)) : template;
      String pdfId = (System.currentTimeMillis()+"").substring(0,10);
      pdfXml= template.replaceAll("\\{ID\\}", pdfId);
      pdfXml= pdfXml.replaceAll("\\{DATE\\}", new Date()+"");
      b.setPdfXml(pdfXml);
      b.setPdfId(pdfId);
    } catch (IOException e) {
      throw new RuntimeException(e);
    }
    return b;
  }
  public String getMockPdfXml(String pdfId){
    String pdf=null;
    try {
      template =template ==null? FileUtils.readFileToString(new File(BRANCH_TEMPLATE_PATH)) : template;
      pdf= template.replaceAll("\\{ID\\}", pdfId);
      pdf= pdf.replaceAll("\\{DATE\\}", new Date()+"");
    } catch (IOException e) {
      throw new RuntimeException(e);
    }
    return pdf;
  }
  
  public PdfException getMockPdfException(){
    PdfException pdfException = new PdfException("Pdf not found");
    pdfException.setErrorCode("400");
    pdfException.setErrorMessage("Pdf not found");
    pdfException.setTransactionId("1234");
    return pdfException;
  }
  
}
