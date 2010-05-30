package com.ipad.common;

import java.awt.image.BufferedImage;
import java.util.LinkedHashMap;
import java.util.List;

import com.ipad.model.DataPool;
import com.ipad.model.Izine;

public class PdfDataUtil {
	public static void storePdfImages(List<BufferedImage> pdfToImages, String originalFilename) {
		Izine izineFile= new Izine();
		LinkedHashMap<Integer, BufferedImage> pages= new LinkedHashMap<Integer, BufferedImage>();
		Integer i=1;
		for (BufferedImage bufferedImage : pdfToImages) {
			pages.put(i++, bufferedImage);
		}
		izineFile.setPages(pages);
		
		DataPool.getInstance().getPdfs().put(originalFilename, izineFile);
	}
}
