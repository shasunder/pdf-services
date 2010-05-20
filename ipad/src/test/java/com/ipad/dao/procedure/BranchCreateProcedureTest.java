/*
 * @author Sandeep.Maloth
 */
package com.ipad.dao.procedure;

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


import static com.ipad.common.Constants.*;

import static org.hamcrest.CoreMatchers.*;
import static org.junit.Assert.*;
@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:context-service-test.xml"})
public class PdfCreateProcedureTest {

  @Autowired
  DataSource dataSource;

  @Autowired
  private StoredProcedureFactory procedureFactory;
  
  @Autowired
  private DAOTestHelper testHelper;
  
  @Test
  public void testExecute() throws Exception {
    // given
    PdfCreateProcedure pdfCreateProcedure = (PdfCreateProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_CREATE);
    Map inParams= new HashMap();
    inParams.put(SQL_IN_PARAM_BRANCH_XML, DefaultMockBuilder.getInstance().getMockPdfXmlRandom());
    
    // when
    Map result = pdfCreateProcedure.execute(inParams);
    
    // then
    assertThat(result.get(SQL_OUT_PARAM_BRANCH_ID), is(notNullValue()));
    assertThat(result.get(SQL_OUT_PARAM_TRANSACTION_ID), is(notNullValue()));
    
    //cleanup
    testHelper.deletePdf(result.get(SQL_OUT_PARAM_BRANCH_ID).toString());
  }
  
  @Test
  public void testExecuteWhenDuplicatePdf() throws Exception {
    // given
    PdfCreateProcedure pdfCreateProcedure = (PdfCreateProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_CREATE);
    Map inParams= new HashMap();
    Pdf pdf = testHelper.createPdfObj();
    inParams.put(SQL_IN_PARAM_BRANCH_XML, pdf.getPdfId());
    
    // when
    Map result = pdfCreateProcedure.execute(inParams);
    
    // then
    assertThat(result.get(SQL_OUT_PARAM_ERROR_CODE), is(notNullValue()));
    assertThat(result.get(SQL_OUT_PARAM_ERROR_DESC), is(notNullValue()));
    
    //cleanup
    testHelper.deletePdf(pdf.getPdfId());
  }

}
