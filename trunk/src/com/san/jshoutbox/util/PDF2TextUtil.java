package com.san.jshoutbox.util;

import java.io.InputStream;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.pdfbox.cos.COSDocument;
import org.pdfbox.pdfparser.PDFParser;
import org.pdfbox.pdmodel.PDDocument;
import org.pdfbox.util.PDFTextStripper;

public class PDF2TextUtil {

	/**
	 * Extract text from PDF Document
	 */
	public String pdfToText(InputStream fo) {
		logger.debug("Parsing text from PDF file ....");

		PDDocument pdDoc = null;
		COSDocument cosDoc = null;
		String parsedText;
		try {
			 
			PDFParser parser = new PDFParser(fo);
			PDFTextStripper pdfStripper = new PDFTextStripper();

			parser.parse();
			cosDoc = parser.getDocument();
			pdDoc = new PDDocument(cosDoc);
			parsedText = pdfStripper.getText(pdDoc);
		} catch (Exception e) {
			throw new RuntimeException("An exception occured in parsing the PDF Document.", e);
		} finally {
			try {
				if (cosDoc != null)
					cosDoc.close();
				if (pdDoc != null)
					pdDoc.close();
			} catch (Exception e1) {
				throw new RuntimeException(e1);
			}
		}
		return parsedText;
	}

	private PDF2TextUtil() {
	}
	
	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}

	public static synchronized PDF2TextUtil getInstance() {
		return _instance;
	}

	private static Log logger = LogFactory.getLog(PDF2TextUtil.class.getName());
	private static PDF2TextUtil _instance = new PDF2TextUtil();
}