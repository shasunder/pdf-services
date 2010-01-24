package com.san.jshoutbox.web;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;
import org.springframework.web.multipart.commons.CommonsMultipartFile;

public class FileUploadCommand {

    private CommonsMultipartFile file;

    public void setFile(CommonsMultipartFile file) {
        this.file = file;
    }

    public CommonsMultipartFile getFile() {
        return file;
    }
    
    @Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}
}