/*
 * Copyright (c) 2010 Group Ltd. All Rights Reserved.
 */
package com.ipad.service;

import com.ipad.model.Pdf;


/**
 * Contract to provide Pdf CRUD service.
 * @see PdfServiceImpl
 */
public interface PdfService {

  /**
   * Creates and returns the pdf with transaction id set.
   * @throws PdfException on pdf creation failure.
   */
  Pdf create(String pdfXml);

  /**
   * Finds and returns a pdf using unique pdf Id. 
   */
  Pdf readById(String pdfId);
  
  /**
   * Updates the pdf.
   * @throws PdfException when pdf is not found. 
   */
  Pdf update(String pdfId, String pdfXml);

  Pdf delete(String pdfId);
}
