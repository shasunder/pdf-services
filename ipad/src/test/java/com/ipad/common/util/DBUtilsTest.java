/*
 * @author Sandeep.Maloth
 */
package com.ipad.common.util;


import static org.hamcrest.CoreMatchers.*;
import static org.junit.Assert.assertThat;

import org.junit.Test;
import org.springframework.jdbc.core.support.SqlLobValue;

public class DBUtilsTest {

  @Test
  public void testGetLobFromString() {
    SqlLobValue lob=DBUtils.getInstance().getLobFromString("str");
    assertThat(lob, is(notNullValue()));
  }

  @Test
  public void testDefaultEmpty() {
    String result= DBUtils.getInstance().defaultEmpty(null);
    assertThat(result, is(""));
    
    result= DBUtils.getInstance().defaultEmpty("blah");
    assertThat(result, is("blah"));
  }

}
