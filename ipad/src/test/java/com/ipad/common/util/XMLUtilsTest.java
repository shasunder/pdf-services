/*
 * @author Sandeep.Maloth
 */
package com.ipad.common.util;

import org.junit.Test;

import static org.hamcrest.CoreMatchers.*;
import static org.junit.Assert.*;
public class XMLUtilsTest {

  @Test
    public void testGetTag() {
    String elementName="test";
    String value="value";
    String result = XMLUtils.getInstance().getTag(elementName, value);
    assertThat(result, equalTo("<test>value</test>"));
    
    }
  
  @Test
    public void testGetTagCdata() {
    String elementName="test";
    String value="value";
    String result = XMLUtils.getInstance().getTagCData(elementName, value);
    assertThat(result, equalTo("<test><![CDATA[value]]></test>"));
    
    }

}
