/*
 * @author Sandeep.Maloth
 */
package com.ipad.common.util;

import org.springframework.jdbc.core.support.SqlLobValue;
import org.springframework.jdbc.support.lob.DefaultLobHandler;
import org.springframework.jdbc.support.lob.LobHandler;

import com.ipad.common.Constants;

public class DBUtils {
  private static DBUtils instance = new DBUtils();

  private DBUtils() { // singleton
  }

  public static DBUtils getInstance() {
    return instance;
  }

  public SqlLobValue getLobFromString(String string) {
    LobHandler lobHandler = new DefaultLobHandler();
    SqlLobValue lob = new SqlLobValue(string, lobHandler);
    return lob;
  }

  public String defaultEmpty(Object obj) {
    return obj == null ? Constants.EMPTY_STRING : obj.toString();
  }
}
