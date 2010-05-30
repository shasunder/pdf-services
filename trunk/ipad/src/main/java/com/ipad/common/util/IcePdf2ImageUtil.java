package com.ipad.common.util;

import java.awt.image.BufferedImage;
import java.io.ByteArrayOutputStream;
import java.io.InputStream;
import java.io.OutputStream;
import java.util.ArrayList;
import java.util.List;

import javax.imageio.ImageIO;

import org.apache.commons.io.IOUtils;
import org.apache.commons.lang.builder.ReflectionToStringBuilder;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.icepdf.core.pobjects.Document;
import org.icepdf.core.pobjects.Page;
import org.icepdf.core.util.GraphicsRenderingHints;

public class IcePdf2ImageUtil {

	/**
	 * Extract image from PDF Document
	 */
	public List<BufferedImage> pdfToImage(InputStream in) {

		logger.debug("Parsing image from PDF file ....");
		List<BufferedImage> result = new ArrayList<BufferedImage>();

		Document document = new Document();
		try {
			document.setInputStream(in, "icepdf-sample.pdf");

			float scale = 1.0f;
			float rotation = 0f;

			// Paint each pages content to an image and write the image to file
			for (int i = 0; i < document.getNumberOfPages(); i++) {
				BufferedImage image = (BufferedImage) document.getPageImage(i, GraphicsRenderingHints.SCREEN, Page.BOUNDARY_CROPBOX, rotation, scale);
				logger.debug("\t capturing page " + i);
				result.add(image);
				image.flush();
			}

		} catch (Exception ex) {
			throw new RuntimeException(ex);
		} finally {
			document.dispose();
		}

		return result;
	}

	public void pdfToImage(InputStream in, OutputStream out) {

		logger.debug("Parsing image from PDF file ....");
		List<BufferedImage> result = new ArrayList<BufferedImage>();

		Document document = new Document();
		try {
			document.setInputStream(in, "icepdf-sample.pdf");

			float scale = 1.0f;
			float rotation = 0f;

			// Paint each pages content to an image and write the image to file
			ByteArrayOutputStream baos = new ByteArrayOutputStream();
			int index=0;
			for (int i = 0; i < document.getNumberOfPages(); i++) {
				BufferedImage image = (BufferedImage) document.getPageImage(i, GraphicsRenderingHints.SCREEN, Page.BOUNDARY_CROPBOX, rotation, scale);
				logger.debug("\t capturing page " + i);
				
				ImageIO.write(image, "png", baos);
				out.write(baos.toByteArray(),index , index + baos.size()  );
				index=index+ baos.size();
			}

		} catch (Exception ex) {
			throw new RuntimeException(ex);
		} finally {
			document.dispose();
		}
	}
	
	private IcePdf2ImageUtil() {
	}

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}

	public static synchronized IcePdf2ImageUtil getInstance() {
		return _instance;
	}

	private static Log logger = LogFactory.getLog(IcePdf2ImageUtil.class.getName());
	private static IcePdf2ImageUtil _instance = new IcePdf2ImageUtil();

}