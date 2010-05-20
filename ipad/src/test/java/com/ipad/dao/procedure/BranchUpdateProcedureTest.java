/*
 * @author Sandeep.Maloth
 */
package com.ipad.dao.procedure;

import static com.ipad.common.Constants.SQL_IN_PARAM_BRANCH_XML;
import static com.ipad.common.Constants.SQL_OUT_PARAM_BRANCH_ID;
import static com.ipad.common.Constants.SQL_OUT_PARAM_ERROR_CODE;
import static com.ipad.common.Constants.SQL_OUT_PARAM_ERROR_DESC;
import static com.ipad.common.Constants.SQL_OUT_PARAM_TRANSACTION_ID;
import static org.hamcrest.CoreMatchers.is;
import static org.hamcrest.CoreMatchers.notNullValue;
import static org.junit.Assert.assertThat;

import java.util.HashMap;
import java.util.Map;

import javax.sql.DataSource;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;

import com.ipad.DefaultMockBuilder;
import com.ipad.dao.DAOTestHelper;
@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:context-service-test.xml"})
public class PdfUpdateProcedureTest {

  @Autowired
  DataSource dataSource;

  @Autowired
  private StoredProcedureFactory procedureFactory;
  
  @Autowired
  private DAOTestHelper testHelper;
  
  @Test
  public void testExecute() throws Exception {
    // given
    String pdfId= testHelper.createPdf();
    
    PdfUpdateProcedure pdfUpdateProcedure = (PdfUpdateProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_UPDATE);
    Map inParams= new HashMap();
    inParams.put(SQL_IN_PARAM_BRANCH_XML, DefaultMockBuilder.getInstance().getMockPdfXml(pdfId));
    
    // when
    Map result = pdfUpdateProcedure.execute(inParams);
    
    // then
    assertThat(result.get(SQL_OUT_PARAM_BRANCH_ID), is(notNullValue()));
    assertThat(result.get(SQL_OUT_PARAM_TRANSACTION_ID), is(notNullValue()));
   
    testHelper.deletePdf(pdfId);
  }
  
  @Test
  public void testExecuteWhenUpdateFailed() throws Exception {
    // given
    PdfUpdateProcedure pdfUpdateProcedure = (PdfUpdateProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_UPDATE);
    Map inParams= new HashMap();
    inParams.put(SQL_IN_PARAM_BRANCH_XML, DefaultMockBuilder.BRANCH_XML+"BAD XML");
    
    // when
    Map result = pdfUpdateProcedure.execute(inParams);
    
    // then    
    assertThat(result.get(SQL_OUT_PARAM_ERROR_CODE), is(notNullValue()));
    assertThat(result.get(SQL_OUT_PARAM_ERROR_DESC), is(notNullValue()));
    
  }
}
