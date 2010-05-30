package com.ipad.model;

import java.awt.image.BufferedImage;
import java.util.LinkedHashMap;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;

//TODO: Upgrade this class once file format is better defined.
public class Izine {
	
	String pdfFileName;
	String pdfName;
	//page no, image
	LinkedHashMap<Integer, BufferedImage> pages= new LinkedHashMap<Integer, BufferedImage>();

	public LinkedHashMap<Integer, BufferedImage> getPages() {
		return pages;
	}

	public void setPages(LinkedHashMap<Integer, BufferedImage> pages) {
		this.pages = pages;
	}

	public String getPdfFileName() {
		return pdfFileName;
	}

	public void setPdfFileName(String pdfFileName) {
		this.pdfFileName = pdfFileName;
	}

	public String getPdfName() {
		return pdfName;
	}

	public void setPdfName(String pdfName) {
		this.pdfName = pdfName;
	}
	
	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}
	
	
}
