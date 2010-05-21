package com.ipad.common.util;

import java.awt.image.BufferedImage;
import java.io.InputStream;
import java.util.ArrayList;
import java.util.List;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.jpedal.PdfDecoder;
import org.jpedal.exception.PdfException;

public class JpedalPdf2ImageUtil {

	/**
	 * Extract image from PDF Document
	 */
	public List<BufferedImage> pdfToImage(InputStream in) {

		logger.debug("Parsing image from PDF file ....");
		List<BufferedImage> result = new ArrayList<BufferedImage>();
		PdfDecoder decodePdf = new PdfDecoder(true);
		PdfDecoder.setFontReplacements(decodePdf);

		try {
			decodePdf.openPdfFileFromInputStream(in, true);
			for (int i = 1; i < decodePdf.getPageCount(); i++) {
				BufferedImage buffImage = decodePdf.getPageAsImage(i);
				result.add(buffImage);
			}

		} catch (PdfException e) {
			e.printStackTrace();
		} finally {
			decodePdf.closePdfFile();
		}

		return result;
	}


	private JpedalPdf2ImageUtil() {
	}

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}

	public static synchronized JpedalPdf2ImageUtil getInstance() {
		return _instance;
	}

	private static Log logger = LogFactory.getLog(JpedalPdf2ImageUtil.class.getName());
	private static JpedalPdf2ImageUtil _instance = new JpedalPdf2ImageUtil();

}