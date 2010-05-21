/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import static com.ipad.common.Constants.MESSAGE_BRANCH_DELETED;
import static com.ipad.common.Constants.MESSAGE_BRANCH_UPDATED;

import java.awt.Graphics2D;
import java.awt.image.BufferedImage;
import java.io.IOException;
import java.util.List;

import javax.imageio.ImageIO;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.io.IOUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.commons.CommonsMultipartFile;
import org.springframework.web.servlet.ModelAndView;

import com.ipad.common.util.Pdf2ImageUtil;
import com.ipad.model.Pdf;
import com.ipad.service.PdfService;
import com.sun.imageio.plugins.common.ImageUtil;

/**
 * Controller to handle Pdf CRUD requests.
 * <p>
 * Delegates incoming requests to Pdf service
 * @see com.ipad.service.PdfService
 * <p>
 * Exceptions are trapped by spring managed exception resolver.
 * @see com.ipad.web.ExceptionResolver
 * <p>
 * 
 * 
 */
@Controller(value = "pdfboxPdfController")
public class PdfBoxPdf2ImageController {

	private static Log logger = LogFactory.getLog(PdfBoxPdf2ImageController.class);
	final WebHelper webHelper = WebHelper.getInstance();

	PdfService pdfService;

	@RequestMapping("/pdfbox/pdfById.do")
	public ModelAndView getById(HttpServletResponse response) {
		return new ModelAndView("pdf2image/pdfbox-upload-view");
	}

	@RequestMapping("/pdfbox/pdfCreate.do")
	public void post(@ModelAttribute("fileUploadForm")
	FileUploadForm fileUploadForm, HttpServletRequest request, HttpServletResponse response) throws IOException {
		CommonsMultipartFile file = fileUploadForm.getFile();

		List<BufferedImage> pdfToImages = Pdf2ImageUtil.getInstance().pdfToImage(file.getInputStream());
		logger.info("Received : " + file.getOriginalFilename());
		
		response.setContentType("image/png");
		BufferedImage image = Pdf2ImageUtil.joinImages(pdfToImages);
		Pdf2ImageUtil.write(image, "png", response.getOutputStream());
		response.flushBuffer();
	}

	

	@RequestMapping("/pdfbox/pdfUpdate.do")
	public ModelAndView put(@RequestParam("pdfId")
	String pdfId, HttpServletRequest request, HttpServletResponse response) throws IOException {
		return null;
	}

	@RequestMapping("/pdfbox/pdfDelete.do")
	public ModelAndView delete(@RequestParam("pdfId")
	String pdfId, HttpServletResponse response) {
		return null;
	}

	@Autowired
	public void setPdfService(PdfService pdfService) {
		this.pdfService = pdfService;
	}

}
