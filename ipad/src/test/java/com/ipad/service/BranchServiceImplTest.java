/*
 * @author Sandeep.Maloth
 */
package com.ipad.service;

import static org.hamcrest.CoreMatchers.*;
import static org.junit.Assert.*;
import org.junit.Test;

import com.ipad.DefaultMockBuilder;
import com.ipad.common.PdfException;
import com.ipad.dao.PdfDAOImpl;


public class PdfServiceImplTest {
  DefaultMockBuilder mockBuilder = DefaultMockBuilder.getInstance();

  @Test
  public void testCreate() throws PdfException {
    // given
    PdfServiceImpl pdfService = new PdfServiceImpl();
    String pdfXml = "<pdf/>";

    PdfDAOImpl pdfDAO = new PdfDAOImpl() {
      @Override
      public void create(Pdf pdf) throws PdfException {
        pdf.setTransactionId("1231");
      }
    };

    pdfService.setPdfDAO(pdfDAO);
    // when
    Pdf pdf = pdfService.create(pdfXml);

    // then
    assertThat(pdf.getTransactionId(), is(notNullValue()));
    assertThat(pdf.getTransactionId(), is("1231"));
  }

  @Test
  public void testReadById() throws PdfException {
    // given
    PdfServiceImpl pdfService = new PdfServiceImpl();
    final Pdf pdfExpected = mockBuilder.getMockPdf();
    PdfDAOImpl pdfDAO = new PdfDAOImpl() {
      @Override
      public Pdf readById(String pdfId) throws PdfException {

        return pdfExpected;
      }
    };

    pdfService.setPdfDAO(pdfDAO);
    // when
    Pdf pdfActual = pdfService.readById("1");

    // then
    assertThat(pdfActual, is(pdfExpected));
  }

  @Test
  public void testReadByCompanyNameAndPostCode() throws PdfException {
    // given
    PdfServiceImpl pdfService = new PdfServiceImpl();
    final String matches = mockBuilder.getMockMatches();
    PdfDAOImpl pdfDAO = new PdfDAOImpl() {
      @Override
      public String readByCompanyNameAndPostCode(String company, String postcode) throws PdfException {
        return matches;
      }
    };

    pdfService.setPdfDAO(pdfDAO);
    // when
    String matchesActual = pdfService.readByCompanyNameAndPostCode("ipad", "postcode");

    // then
    assertThat(matchesActual, is(matches));
  }

  @Test
  public void testUpdate() throws PdfException {
    // given
    PdfServiceImpl pdfService = new PdfServiceImpl();
    String pdfXml = "<pdf/>";
    String pdfId = "1";

    PdfDAOImpl pdfDAO = new PdfDAOImpl() {
      @Override
      public void update(Pdf pdf) throws PdfException {
        pdf.setTransactionId("1231");
      }
    };

    pdfService.setPdfDAO(pdfDAO);
    // when
    Pdf pdf = pdfService.update(pdfId, pdfXml);

    // then
    assertThat(pdf.getTransactionId(), is(notNullValue()));
    assertThat(pdf.getTransactionId(), is("1231"));
  }

  @Test
  public void testDelete() throws PdfException {
    // given
    PdfServiceImpl pdfService = new PdfServiceImpl();
    Pdf pdf = mockBuilder.getMockPdf();

    PdfDAOImpl pdfDAO = new PdfDAOImpl() {
      @Override
      public void delete(Pdf pdf) throws PdfException {
        pdf.setTransactionId("1231");
      }
    };

    pdfService.setPdfDAO(pdfDAO);
    String pdfId = "1";
    
    // when
    Pdf actualPdf= pdfService.delete(pdfId);

    // then
    assertThat(actualPdf.getTransactionId(), is(notNullValue()));
    assertThat(actualPdf.getTransactionId(), is("1231"));
  }

}
