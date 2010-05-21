/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import java.awt.image.BufferedImage;
import java.io.IOException;
import java.io.InputStream;
import java.net.URL;
import java.util.List;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.commons.CommonsMultipartFile;
import org.springframework.web.servlet.ModelAndView;

import com.ipad.common.util.JpedalPdf2ImageUtil;
import com.ipad.common.util.Pdf2ImageUtil;
import com.ipad.service.PdfService;

/**
 * Controller to handle Pdf CRUD requests.
 * <p>
 * Delegates incoming requests to Pdf service
 * @see com.ipad.service.PdfService
 * <p>
 * Exceptions are trapped by spring managed exception resolver.
 * @see com.ipad.web.ExceptionResolver
 * <p>
 * http://www.jpedal.org/simple_image_example.php
 * 
 * 
 */
@Controller(value = "jpedalPdfController")
public class JpedalPdf2ImageController {

	private static Log logger = LogFactory.getLog(JpedalPdf2ImageController.class);
	final WebHelper webHelper = WebHelper.getInstance();

	PdfService pdfService;

	@RequestMapping("/jpedal/pdfById.do")
	public ModelAndView getById(HttpServletResponse response) {
		return new ModelAndView("pdf2image/jpedal-upload-view");
	}

	@RequestMapping("/jpedal/pdfCreate.do")
	public void post(@ModelAttribute("fileUploadForm")
	FileUploadForm fileUploadForm, HttpServletRequest request, HttpServletResponse response) throws IOException {
		CommonsMultipartFile file = fileUploadForm.getFile();

		InputStream inputStream = file.getInputStream();
		try {
			List<BufferedImage> pdfToImages = JpedalPdf2ImageUtil.getInstance().pdfToImage(inputStream);

			logger.info("Received : " + file.getOriginalFilename());

			response.setContentType("image/png");
			BufferedImage image = Pdf2ImageUtil.joinImages(pdfToImages);
			Pdf2ImageUtil.write(image, "png", response.getOutputStream());
			response.flushBuffer();
		} finally {
			inputStream.close();
		}
	}

	@RequestMapping("/jpedal/pdfURL.do")
	public void getUrl(@RequestParam("url")
	String url, @ModelAttribute("fileUploadForm")
	FileUploadForm fileUploadForm, HttpServletRequest request, HttpServletResponse response) throws IOException {

		URL urlObj = new URL(url);
		InputStream in = urlObj.openStream();
		try {
			List<BufferedImage> pdfToImages = JpedalPdf2ImageUtil.getInstance().pdfToImage(in);
			logger.info("Received : " + url);

			response.setContentType("image/png");
			BufferedImage image = Pdf2ImageUtil.joinImages(pdfToImages);
			Pdf2ImageUtil.write(image, "png", response.getOutputStream());
			response.flushBuffer();
		} finally {
			in.close();
		}
	}

	@RequestMapping("/jpedal/pdfUpdate.do")
	public ModelAndView put(@RequestParam("pdfId")
	String pdfId, HttpServletRequest request, HttpServletResponse response) throws IOException {
		return null;
	}

	@RequestMapping("/jpedal/pdfDelete.do")
	public ModelAndView delete(@RequestParam("pdfId")
	String pdfId, HttpServletResponse response) {
		return null;
	}

	@Autowired
	public void setPdfService(PdfService pdfService) {
		this.pdfService = pdfService;
	}

}
