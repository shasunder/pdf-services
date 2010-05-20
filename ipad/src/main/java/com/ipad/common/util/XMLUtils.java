/*
 * @author Sandeep.Maloth
 */
package com.ipad.common.util;

import static com.ipad.common.Constants.*;

public class XMLUtils {

  private static XMLUtils instance = new XMLUtils();

  private XMLUtils() { // singleton
  }

  public static XMLUtils getInstance() {
    return instance;
  }

  public String getTag(String elementName, String value) {
    return new StringBuilder().append(CHAR_LESS_THAN).append(elementName).append(CHAR_GREATER_THAN).append(value).append(
        CHAR_LESS_THAN).append(CHAR_FORWARD_SLASH).append(elementName).append(CHAR_GREATER_THAN).toString();
  }

  public String getTagCData(String elementName, String value) {
    return new StringBuilder().append(CHAR_LESS_THAN).append(elementName).append(CHAR_GREATER_THAN).append(CDATA_OPEN).append(value).append(
        CDATA_END).append(CHAR_LESS_THAN).append(CHAR_FORWARD_SLASH).append(elementName).append(CHAR_GREATER_THAN).toString();
  }
}
