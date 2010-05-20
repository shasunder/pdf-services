package com.ipad.common.util;

import java.awt.image.BufferedImage;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.InputStream;
import java.util.List;

import javax.imageio.ImageIO;

import org.junit.Ignore;
import org.junit.Test;

public class Pdf2ImageUtilTest {

	@Ignore
	public void testPdfToImage() throws Exception {
		InputStream in = new FileInputStream(new File("./src/test/resources/sample.pdf"));
		List<BufferedImage> images = Pdf2ImageUtil.getInstance().pdfToImage(in);

		for (int i = 0; i < images.size(); i++) {
			BufferedImage bufferedImage = images.get(i);
			ImageIO.write(bufferedImage, "png", new FileOutputStream(new File("./src/test/resources/" + i + ".png")));
		}
	}

	@Test
	public void testPdfToImageJoin() throws Exception {
		InputStream in = new FileInputStream(new File("./src/test/resources/2page.pdf"));
		List<BufferedImage> images = Pdf2ImageUtil.getInstance().pdfToImage(in);
		BufferedImage bufferedImage = Pdf2ImageUtil.joinImages(images);
		ImageIO.write(bufferedImage, "png", new FileOutputStream(new File("./src/test/resources/join.png")));
	}
}
