/*
 * @author Sandeep.Maloth
 */
package com.ipad.dao.procedure;

import static org.hamcrest.CoreMatchers.equalTo;
import static org.hamcrest.CoreMatchers.is;
import static org.hamcrest.CoreMatchers.not;
import static org.hamcrest.CoreMatchers.notNullValue;
import static org.junit.Assert.assertThat;
import static org.junit.Assert.fail;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.object.StoredProcedure;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.junit4.SpringJUnit4ClassRunner;

@RunWith(SpringJUnit4ClassRunner.class)
@ContextConfiguration(locations = {"classpath:context-service-test.xml"})
public class StoredProcedureFactoryTest {

  //given
  @Autowired
  private StoredProcedureFactory storedProcedureFactory;
  
  @Test
  public void testGetStoredProcedure() {
    //when
    StoredProcedure procedure = storedProcedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_CREATE);
    //then
    assertThat(procedure,is(notNullValue()));
  }

  @Test
  public void testGetStoredProcedureWhenNotFound() {
    //when
    try{
    storedProcedureFactory.getStoredProcedure(null);
    fail("Must throw exception!!");
    }catch(RuntimeException re){
    //then - expected      
    }
  }
  @Test
  public void testResetCache() {
    //when
    StoredProcedure procedureBefore = storedProcedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_CREATE);
    storedProcedureFactory.resetCache();
    
    //then
    StoredProcedure procedureAfter = storedProcedureFactory.getStoredProcedure(StoredProcedureType.BRANCH_CREATE);
    assertThat(procedureAfter,is(not(equalTo(procedureBefore))));
  }

}
