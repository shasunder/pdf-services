package com.ipad.web;

import org.springframework.web.multipart.commons.CommonsMultipartFile;

public class FileUploadForm {

    private CommonsMultipartFile file;

    public void setFile(CommonsMultipartFile file) {
        this.file = file;
    }

    public CommonsMultipartFile getFile() {
        return file;
    }
}