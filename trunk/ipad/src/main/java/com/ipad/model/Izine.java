package com.ipad.model;

import java.awt.image.BufferedImage;
import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

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

	public List< BufferedImage> getPagesList() {
		List<BufferedImage> pdfToImages = new ArrayList<BufferedImage>();
		for (Map.Entry<Integer, BufferedImage> entry : pages.entrySet()) {
			BufferedImage value = entry.getValue();
			pdfToImages.add(value);
		}
		return pdfToImages;
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
