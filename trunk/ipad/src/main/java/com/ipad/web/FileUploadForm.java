package com.ipad.web;

import org.springframework.web.multipart.commons.CommonsMultipartFile;

public class FileUploadForm {

    private CommonsMultipartFile file;
    private String pdfLib;
    

    public String getPdfLib() {
		return pdfLib;
	}

	public void setPdfLib(String pdfLib) {
		this.pdfLib = pdfLib;
	}

	public void setFile(CommonsMultipartFile file) {
        this.file = file;
    }

    public CommonsMultipartFile getFile() {
        return file;
    }
}