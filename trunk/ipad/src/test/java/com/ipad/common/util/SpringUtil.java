/*
 * @author Sandeep.Maloth
 */
package com.ipad.common.util;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.context.ApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

public class SpringUtil {
  private ApplicationContext springCtx;

  private static SpringUtil instance = new SpringUtil();

  private static Log logger = LogFactory.getLog(SpringUtil.class.getName());

  public void init(String[] springConfigurations) {
    logger.info("Loading spring context from path :" + ReflectionToStringBuilder.toString(springConfigurations));
    this.springCtx = new ClassPathXmlApplicationContext(springConfigurations);
  }

  public static synchronized SpringUtil getInstance() {
    return instance;
  }

  public Object getBean(String name) {
    return springCtx.getBean(name);
  }

}
