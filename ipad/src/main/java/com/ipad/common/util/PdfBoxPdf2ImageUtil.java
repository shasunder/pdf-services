package com.ipad.common.util;

import java.awt.Graphics2D;
import java.awt.image.BufferedImage;
import java.awt.image.RenderedImage;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.util.ArrayList;
import java.util.List;

import javax.imageio.IIOException;
import javax.imageio.ImageIO;
import javax.imageio.stream.ImageOutputStream;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.pdmodel.PDPage;

public class PdfBoxPdf2ImageUtil {

	/**
	 * Extract image from PDF Document
	 */
	public List<BufferedImage> pdfToImage(InputStream in) {
		logger.debug("Parsing image from PDF file ....");
		List<BufferedImage> result = new ArrayList<BufferedImage>();
		PDDocument document = null;
		try {
			document = PDDocument.load(in);
			List<PDPage> pages = document.getDocumentCatalog().getAllPages();

			// for each page
			for (int i = 0; i < pages.size(); i++) {
				PDPage singlePage = pages.get(i);
				BufferedImage buffImage = singlePage.convertToImage();
				result.add(buffImage);
			}
		} catch (Exception e) {
			throw new RuntimeException("An exception occured in parsing the PDF Document.", e);
		} finally {
			try {
				document.close();
			} catch (IOException e) {
				throw new RuntimeException(e);
			}
		}
		return result;
	}

	/**
	 * Writes image and doesnt close the output stream.
	 */
	public static boolean write(RenderedImage im, String formatName, OutputStream output) throws IOException {
		if (output == null) {
			throw new IllegalArgumentException("output == null!");
		}
		ImageOutputStream stream = null;
		try {
			stream = ImageIO.createImageOutputStream(output);
		} catch (IOException e) {
			throw new IIOException("Can't create output stream!", e);
		}

		return ImageIO.write(im, formatName, stream);
	}

	public static BufferedImage joinImages(List<BufferedImage> pdfToImage) {
		int w = 0, h = 0;
		for (BufferedImage bufferedImage : pdfToImage) {
			w = bufferedImage.getWidth() > w ? bufferedImage.getWidth() : w;
			h = h + bufferedImage.getHeight();
		}
		logger.debug("width : "+w +" height :"+h);
		BufferedImage image = new BufferedImage(w, h, BufferedImage.TYPE_INT_RGB);
		Graphics2D graphics = image.createGraphics();
		int i = 0, position=0;
		for (BufferedImage bufferedImage : pdfToImage) {
			logger.debug("Writing image : " + ++i);
			graphics.drawImage(bufferedImage, 0, position, null);
			position +=bufferedImage.getHeight();
		}
		graphics.dispose();
		return image;
	}

	private PdfBoxPdf2ImageUtil() {
	}

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}

	public static synchronized PdfBoxPdf2ImageUtil getInstance() {
		return _instance;
	}

	private static Log logger = LogFactory.getLog(PdfBoxPdf2ImageUtil.class.getName());
	private static PdfBoxPdf2ImageUtil _instance = new PdfBoxPdf2ImageUtil();

}