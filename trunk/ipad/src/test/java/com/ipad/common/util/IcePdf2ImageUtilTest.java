package com.ipad.common.util;

import java.awt.image.BufferedImage;
import java.io.File;
import java.io.FileFilter;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.InputStream;
import java.util.List;

import javax.imageio.ImageIO;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.junit.Ignore;
import org.junit.Test;

public class IcePdf2ImageUtilTest {

	private static Log logger = LogFactory.getLog(IcePdf2ImageUtilTest.class);

	@Test
	public void testPdfToImage() throws Exception {
		InputStream in = new FileInputStream(new File("./src/test/resources/mag/mag1.pdf"));
		List<BufferedImage> images = IcePdf2ImageUtil.getInstance().pdfToImage(in);

		for (int i = 0; i < images.size(); i++) {
			BufferedImage bufferedImage = images.get(i);
			ImageIO.write(bufferedImage, "png", new FileOutputStream(new File("./src/test/resources/images/" + i + ".png")));
		}
	}

	@Test
	public void testPdfsToImages() throws Exception {
		File[] pdfs = new File("./src/test/resources/mag").listFiles(new FileFilter() {

			@Override
			public boolean accept(File pathname) {
				return pathname.getName().endsWith(".pdf");
			}
		});

		for (File pdf : pdfs) {
			InputStream in = new FileInputStream(pdf);
			logger.info("Parsing pdf to images ...." + pdf.getName());
			List<BufferedImage> images = IcePdf2ImageUtil.getInstance().pdfToImage(in);

			logger.info("Storing images now");
			for (int i = 0; i < images.size(); i++) {
				BufferedImage bufferedImage = images.get(i);
				ImageIO.write(bufferedImage, "png", new FileOutputStream(new File("./src/test/resources/output/" + i + ".png")));
			}

		}
	}

	@Test
	public void testPdfToImageJoin() throws Exception {
		InputStream in = new FileInputStream(new File("./src/test/resources/2page.pdf"));
		List<BufferedImage> images = IcePdf2ImageUtil.getInstance().pdfToImage(in);
		BufferedImage bufferedImage = PdfBoxPdf2ImageUtil.joinImages(images);
		ImageIO.write(bufferedImage, "png", new FileOutputStream(new File("./src/test/resources/join.png")));
	}
}
