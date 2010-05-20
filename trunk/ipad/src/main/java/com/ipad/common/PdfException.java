/*
 * @author Sandeep.Maloth
 */
package com.ipad.common;

/**
 * Custom pdf exception which encapsulates additional pdf <br>
 * related information along with the exception raised.
 */
public class PdfException extends RuntimeException {

  String transactionId;

  String errorCode;

  String httpErrorCode;

  String errorMessage;

  public PdfException(String message) {
    super(message);
  }

  public PdfException(String message, String transactionId, String errorCode, String errorMessage, String httpErrorCode) {
    super(message);
    this.transactionId = transactionId;
    this.errorCode = errorCode;
    this.errorMessage = errorMessage;
    this.httpErrorCode = httpErrorCode;
  }

  public String getTransactionId() {
    return transactionId;
  }

  public void setTransactionId(String transactionId) {
    this.transactionId = transactionId;
  }

  public String getErrorCode() {
    return errorCode;
  }

  public void setErrorCode(String errorCode) {
    this.errorCode = errorCode;
  }

  public String getErrorMessage() {
    return errorMessage;
  }

  public void setErrorMessage(String errorMessage) {
    this.errorMessage = errorMessage;
  }

  public String getHttpErrorCode() {
    return httpErrorCode;
  }

  public void setHttpErrorCode(String httpErrorCode) {
    this.httpErrorCode = httpErrorCode;
  }

}
