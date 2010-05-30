/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import java.awt.image.BufferedImage;
import java.io.IOException;
import java.io.InputStream;
import java.net.URL;
import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

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

import com.ipad.common.PdfDataUtil;
import com.ipad.common.util.IcePdf2ImageUtil;
import com.ipad.common.util.Pdf2ImageUtil;
import com.ipad.model.DataPool;
import com.ipad.model.Izine;
import com.ipad.service.PdfService;

/**
 * Controller to handle Pdf CRUD requests.
 * <p>
 * Delegates incoming requests to Pdf service
 * @see com.ipad.service.PdfService <p>
 * Exceptions are trapped by spring managed exception resolver.
 * @see com.ipad.web.ExceptionResolver <p>
 * http://www.icepdf.org/
 * 
 * 
 */
@Controller(value = "icePdfController")
public class IcePdf2ImageController {

	private static Log logger = LogFactory.getLog(IcePdf2ImageController.class);
	final WebHelper webHelper = WebHelper.getInstance();

	PdfService pdfService;

	@RequestMapping("/ice/pdfById.do")
	public ModelAndView getById(HttpServletResponse response) {
		return new ModelAndView("pdf2image/ice-upload-view");
	}
	
	@RequestMapping("/ice/pdfUploadView.do")
	public ModelAndView getUploadView(@RequestParam(value="pageNo", required=false) Integer pageNo,@RequestParam(value="pdfName", required=false) String pdfName, HttpServletResponse response) {
		Map model= new HashMap();
		model.put("pdfs", DataPool.getInstance().getPdfs());
		model.put("pageNo", pageNo==null ? 1 : pageNo );
		model.put("pdfName", pdfName );
		return new ModelAndView("pdf2image/ice-upload-view2", model);
	}

	@RequestMapping("/ice/pdfCreate.do")
	public void post(@ModelAttribute("fileUploadForm") FileUploadForm fileUploadForm, HttpServletRequest request, HttpServletResponse response) throws IOException {
		CommonsMultipartFile file = fileUploadForm.getFile();

		InputStream inputStream = file.getInputStream();
		try {
			List<BufferedImage> pdfToImages = IcePdf2ImageUtil.getInstance().pdfToImage(inputStream);

			logger.info("Received : " + file.getOriginalFilename());

			response.setContentType("image/png");
			BufferedImage image = Pdf2ImageUtil.joinImages(pdfToImages);
			Pdf2ImageUtil.write(image, "png", response.getOutputStream());
			response.flushBuffer();
		} finally {
			inputStream.close();
		}
	}

	@RequestMapping("/ice/pdfUpload.do")
	public ModelAndView upload(@ModelAttribute("fileUploadForm") FileUploadForm fileUploadForm, HttpServletRequest request, HttpServletResponse response) throws IOException {
		CommonsMultipartFile file = fileUploadForm.getFile();

		InputStream inputStream = file.getInputStream();
		try {
			List<BufferedImage> pdfToImages = IcePdf2ImageUtil.getInstance().pdfToImage(inputStream);

			String originalFilename = file.getOriginalFilename();
			logger.info("Received and stored images of : " + originalFilename);
			PdfDataUtil.storePdfImages(pdfToImages, originalFilename);

		} finally {
			inputStream.close();
		}
		Map model= new HashMap();
		model.put("pdfs", DataPool.getInstance().getPdfs());
		model.put("pageNo", 1);
		model.put("pdfName", file.getOriginalFilename());
		
		return new ModelAndView("pdf2image/ice-upload-view2",model);
	}

	@RequestMapping("/ice/pdfPage.do")
	public void getPdfPage(@RequestParam("pdfName") String pdfName, @RequestParam("pageNo") Integer pageNo, HttpServletRequest request, HttpServletResponse response) throws IOException {

		logger.info("Stream pdf page as PNG : " + pdfName + " pageNo:" + pageNo);
		response.setContentType("image/png");
		BufferedImage image = DataPool.getInstance().getPdfPage(pdfName, pageNo);
		Pdf2ImageUtil.write(image, "png", response.getOutputStream());
		response.flushBuffer();
	}

	@RequestMapping("/ice/pdfURL.do")
	public void getUrl(@RequestParam("url") String url, @ModelAttribute("fileUploadForm") FileUploadForm fileUploadForm, HttpServletRequest request, HttpServletResponse response) throws IOException {

		URL urlObj = new URL(url);
		InputStream in = urlObj.openStream();
		try {
			List<BufferedImage> pdfToImages = IcePdf2ImageUtil.getInstance().pdfToImage(in);
			logger.info("Received : " + url);

			response.setContentType("image/png");
			BufferedImage image = Pdf2ImageUtil.joinImages(pdfToImages);
			Pdf2ImageUtil.write(image, "png", response.getOutputStream());
			response.flushBuffer();
		} finally {
			in.close();
		}
	}

	@RequestMapping("/ice/pdfUpdate.do")
	public ModelAndView put(@RequestParam("pdfId") String pdfId, HttpServletRequest request, HttpServletResponse response) throws IOException {
		return null;
	}

	@RequestMapping("/ice/pdfDelete.do")
	public ModelAndView delete(@RequestParam("pdfId") String pdfId, HttpServletResponse response) {
		return null;
	}

	@Autowired
	public void setPdfService(PdfService pdfService) {
		this.pdfService = pdfService;
	}

}
