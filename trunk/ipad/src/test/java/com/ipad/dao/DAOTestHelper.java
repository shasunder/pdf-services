/*
 * @author Sandeep.Maloth
 */
package com.ipad.dao;

import static com.ipad.common.Constants.SQL_IN_PARAM_BRANCH_ID;
import static com.ipad.common.Constants.SQL_IN_PARAM_BRANCH_XML;
import static com.ipad.common.Constants.SQL_OUT_PARAM_BRANCH_ID;

import java.math.BigDecimal;
import java.util.HashMap;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import com.ipad.DefaultMockBuilder;
import com.ipad.dao.procedure.PdfCreateProcedure;
import com.ipad.dao.procedure.PdfDeleteProcedure;
import com.ipad.dao.procedure.StoredProcedureFactory;
import com.ipad.dao.procedure.StoredProcedureType;


@Component
public class DAOTestHelper {
  
  @Autowired
  private StoredProcedureFactory procedureFactory;
  
  public String createPdf(){
    PdfCreateProcedure pdfCreateProcedure = (PdfCreateProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_CREATE);
    Map inParams= new HashMap();
    inParams.put(SQL_IN_PARAM_BRANCH_XML, DefaultMockBuilder.getInstance().getMockPdfXmlRandom());
    
    Map result = pdfCreateProcedure.execute(inParams);
    
    BigDecimal pdfIdDeci = (BigDecimal)result.get(SQL_OUT_PARAM_BRANCH_ID);
    return pdfIdDeci.longValue()+"";
  }

  public String createPdf(String pdfId){
    PdfCreateProcedure pdfCreateProcedure = (PdfCreateProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_CREATE);
    Map inParams= new HashMap();
    inParams.put(SQL_IN_PARAM_BRANCH_XML, DefaultMockBuilder.getInstance().getMockPdfXml(pdfId));
    
    Map result = pdfCreateProcedure.execute(inParams);
    
    BigDecimal pdfIdDeci = (BigDecimal)result.get(SQL_OUT_PARAM_BRANCH_ID);
    return pdfIdDeci.longValue()+"";
  }
  
  public Pdf createPdfObj(){
    PdfCreateProcedure pdfCreateProcedure = (PdfCreateProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_CREATE);
    Map inParams= new HashMap();
    String pdfXml = DefaultMockBuilder.getInstance().getMockPdfXmlRandom();
    inParams.put(SQL_IN_PARAM_BRANCH_XML, pdfXml);
    
    Map result = pdfCreateProcedure.execute(inParams);
    
    BigDecimal pdfIdDeci = (BigDecimal)result.get(SQL_OUT_PARAM_BRANCH_ID);
    Pdf pdf= new Pdf();
    pdf.setPdfId(pdfIdDeci.longValue()+"");
    pdf.setPdfXml(pdfXml);
    return pdf;
  }
  
  public Map deletePdf(String pdfId){
    PdfDeleteProcedure pdfDeleteProcedure = (PdfDeleteProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_DELETE);
    Map inParams= new HashMap();
    inParams.put(SQL_IN_PARAM_BRANCH_ID, pdfId);
    
    Map result = pdfDeleteProcedure.execute(inParams);
    return result;
  }
}
