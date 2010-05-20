/*
 * @author Sandeep.Maloth
 */
package com.ipad.dao.procedure;

import static com.ipad.common.Constants.*;
import static org.hamcrest.CoreMatchers.instanceOf;
import static org.junit.Assert.assertThat;

import java.util.HashMap;
import java.util.Map;

import javax.sql.DataSource;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;

import com.ipad.common.PdfException;
import com.ipad.dao.DAOTestHelper;
@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:context-service-test.xml"})
public class PdfReadByCompanyAndPostCodeProcedureTest {

  @Autowired
  DataSource dataSource;

  @Autowired
  private StoredProcedureFactory procedureFactory;
  
  @Autowired
  private DAOTestHelper testHelper;
  
  @Test
  public void testExecuteWhenNoMatchesFound() throws Exception {
    // given
    PdfReadByCompanyAndPostCodeProcedure pdfReadByCompanyAndPostCodeProcedure = (PdfReadByCompanyAndPostCodeProcedure)procedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_READ_BY_COMPANYNAME_POSTCODE);
    Map inParams= new HashMap();
    
    inParams.put(SQL_IN_PARAM_COMPANY_NAME, "-1");
    inParams.put(SQL_IN_PARAM_POSTCODE, "-1");
    
    // when
    String matches;
    try {
      matches = pdfReadByCompanyAndPostCodeProcedure.getMatches(inParams);
    } catch (Exception e) {
      // then
      assertThat(e, instanceOf(PdfException.class));
    }
  }

}
