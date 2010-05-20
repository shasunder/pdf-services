/*
 * @author Sandeep.Maloth
 */
package com.ipad.dao;

import com.ipad.model.Pdf;



/**
 * Defines the contract to provide database level Pdf CRUD operations.
 * 
 */
public interface PdfDAO {
  void create(Pdf pdf);

  Pdf readById(String pdfId);

  void update(Pdf pdf);

  void delete(Pdf pdf);
}
