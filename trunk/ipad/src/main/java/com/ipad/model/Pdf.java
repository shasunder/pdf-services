package com.ipad.model;

public class Pdf {
	String pdfId;
	Object pdfContent;
	String transactionId;
	
	
	public String getTransactionId() {
		return transactionId;
	}

	public void setTransactionId(String transactionId) {
		this.transactionId = transactionId;
	}

	public Object getPdfContent() {
		return pdfContent;
	}

	public void setPdfContent(Object pdfContent) {
		this.pdfContent = pdfContent;
	}

	public String getPdfId() {
		return pdfId;
	}

	public void setPdfId(String pdfId) {
		this.pdfId = pdfId;
	}

	
}
