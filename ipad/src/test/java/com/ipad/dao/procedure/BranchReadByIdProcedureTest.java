/*
 * @author Sandeep.Maloth
 */
package com.ipad.dao.procedure;

import static com.ipad.common.Constants.SQL_IN_PARAM_BRANCH_ID;
import static org.hamcrest.CoreMatchers.*;
import static org.hamcrest.CoreMatchers.notNullValue;
import static org.junit.Assert.*;

import java.io.InputStream;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.Map;

import javax.sql.DataSource;

import oracle.sql.CLOB;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.DataRetrievalFailureException;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;

import com.ipad.common.PdfException;
import com.ipad.common.Constants;
import com.ipad.dao.DAOTestHelper;

@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:context-service-test.xml"})
public class PdfReadByIdProcedureTest {

  @Autowired
  DataSource dataSource;

  @Autowired
  private StoredProcedureFactory procedureFactory;
  
  @Autowired
  private DAOTestHelper testHelper;
  
  @Test
  public void testExecute() throws Exception {
    // given
    PdfReadByIdProcedure pdfReadByIdProcedure = (PdfReadByIdProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_READ_BY_ID);
    Map inParams= new HashMap();
    String pdfId =testHelper.createPdf();
    
    inParams.put(SQL_IN_PARAM_BRANCH_ID, pdfId);
    
    // when
    Pdf pdf= pdfReadByIdProcedure.getPdf(inParams);
    
    // then
    assertThat(pdf.getPdfXml(), is(notNullValue()));
    
    //cleanup
    testHelper.deletePdf(pdfId);
  }
  
  @Test
  public void testExecuteWhenPdfDoesNotExist() throws Exception {
    // given
    PdfReadByIdProcedure pdfReadByIdProcedure = (PdfReadByIdProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_READ_BY_ID);
    Map inParams= new HashMap();
    
    String pdfId="999999999999";
    inParams.put(SQL_IN_PARAM_BRANCH_ID, pdfId);
    
    // when
    try{
    Pdf pdf= pdfReadByIdProcedure.getPdf(inParams);
    fail("should throw exception");
    }catch(PdfException be){
      //then - expected
    }
    
  }

  @Test
  public void testExtractPdfXml() {
    // given
    PdfReadByIdProcedure pdfReadByIdProcedure = (PdfReadByIdProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_READ_BY_ID);
    Map result= new HashMap();
    result.put(Constants.SQL_OUT_PARAM_BRANCH_XML, new CLOB(){
      @Override
      public InputStream asciiStreamValue() throws SQLException {
        throw new RuntimeException();
      }
    });
    
    //when
    try{
     pdfReadByIdProcedure.extractPdfXml(result);
    }catch(Exception e){
    //then - expected
      assertThat(e, instanceOf(DataRetrievalFailureException.class));
    }
  }

}
