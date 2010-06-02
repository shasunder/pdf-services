/*
 * @author Sandeep.Maloth
 */
package com.ipad.web;

import java.awt.image.BufferedImage;
import java.io.IOException;
import java.io.InputStream;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.compress.zip.ZipOutputStream;
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
import com.ipad.common.util.JpedalPdf2ImageUtil;
import com.ipad.common.util.PdfBoxPdf2ImageUtil;
import com.ipad.common.util.ZipUtil;
import com.ipad.model.DataPool;
import com.ipad.model.Izine;
import com.ipad.service.PdfService;

/**
 * Controller to manage Pdf CRUD requests.
 */
@Controller(value = "genericPdfController")
public class GenericPdf2ImageController {

	private static Log logger = LogFactory.getLog(GenericPdf2ImageController.class);
	final WebHelper webHelper = WebHelper.getInstance();

	PdfService pdfService;

	@RequestMapping("/generic/pdfUploadView.do")
	public ModelAndView getUploadView(@RequestParam(value = "pageNo", required = false) Integer pageNo, @RequestParam(value = "pdfName", required = false) String pdfName, HttpServletResponse response) {
		Map model = new HashMap();
		model.put("pdfs", DataPool.getInstance().getPdfs());
		model.put("pageNo", pageNo == null ? 1 : pageNo);
		model.put("pdfName", pdfName);
		return new ModelAndView("pdf2image/generic-upload-view", model);
	}

	@RequestMapping("/generic/pdfBookView.do")
	public ModelAndView getBookView(@RequestParam(value = "pageNo", required = false) Integer pageNo, @RequestParam(value = "pdfName", required = true) String pdfName, HttpServletResponse response) {
		Map model = new HashMap();
		model.put("pdfs", DataPool.getInstance().getPdfs());
		model.put("pageNo", pageNo == null ? 1 : pageNo);
		model.put("pdfName", pdfName);
		return new ModelAndView("pdf2image/generic-book-view", model);
	}

	@RequestMapping("/generic/clear.do")
	public ModelAndView clearDB(@RequestParam(value = "pdfName", required = true) String pdfName, HttpServletResponse response) {
		if (pdfName.equals("all")) {
			DataPool.getInstance().getPdfs().clear();
		} else {
			DataPool.getInstance().getPdfs().remove(pdfName);
		}
		return new ModelAndView("pdf2image/generic-upload-view");
	}

	@RequestMapping("/generic/viewMode.do")
	public ModelAndView getView(@RequestParam(value = "viewType", required = true) String viewType, @RequestParam(value = "pdfName", required = true) String pdfName, HttpServletResponse response)
			throws Exception {
		if ("book".equalsIgnoreCase(viewType)) {
			return new ModelAndView("forward:pdfBookView.do?pdfName=" + pdfName);

		} else if ("image".equalsIgnoreCase(viewType)) {
			Izine izine = DataPool.getInstance().getPdfs().get(pdfName);
			BufferedImage image = PdfBoxPdf2ImageUtil.joinImages(izine.getPagesList());
			PdfBoxPdf2ImageUtil.write(image, "png", response.getOutputStream());
			response.flushBuffer();
		} else if ("zip".equalsIgnoreCase(viewType)) {
			Izine izine = DataPool.getInstance().getPdfs().get(pdfName);
			 response.setContentType("application/zip"); 
			 response.setHeader("Content-Disposition","inline; filename="+pdfName+".zip;"); 

			ZipOutputStream zo = new ZipOutputStream(response.getOutputStream());
			Map<String, BufferedImage> pdfToImages = new LinkedHashMap<String, BufferedImage>();
			for (Map.Entry<Integer, BufferedImage> entry : izine.getPages().entrySet()) {
				BufferedImage value = entry.getValue();
				Integer key = entry.getKey();
				pdfToImages.put(key + ".png", value);
			}

			ZipUtil.writeZipFile(zo, pdfToImages);
			response.flushBuffer();

		}
		return null;
	}

	@RequestMapping("/generic/pdfUpload.do")
	public ModelAndView upload(@ModelAttribute("fileUploadForm") FileUploadForm fileUploadForm, HttpServletRequest request, HttpServletResponse response) throws IOException {
		CommonsMultipartFile file = fileUploadForm.getFile();
		String pdfLib = fileUploadForm.getPdfLib();
		InputStream inputStream = file.getInputStream();
		try {
			List<BufferedImage> pdfToImages = parsePdf2Images(pdfLib, inputStream);
			String originalFilename = file.getOriginalFilename();
			logger.info("Received and stored images of : " + originalFilename + " using " + pdfLib);
			PdfDataUtil.storePdfImages(pdfToImages, originalFilename);

		} finally {
			inputStream.close();
		}
		Map model = new HashMap();
		model.put("pdfs", DataPool.getInstance().getPdfs());
		model.put("pageNo", 1);
		model.put("pdfName", file.getOriginalFilename());

		return new ModelAndView("pdf2image/generic-upload-view", model);
	}

	@RequestMapping("/generic/pdfPage.do")
	public void getPdfPage(@RequestParam("pdfName") String pdfName, @RequestParam("pageNo") Integer pageNo, HttpServletRequest request, HttpServletResponse response) throws IOException {

		logger.info("Stream pdf page as PNG : " + pdfName + " pageNo:" + pageNo);
		response.setContentType("image/png");
		BufferedImage image = DataPool.getInstance().getPdfPage(pdfName, pageNo);
		PdfBoxPdf2ImageUtil.write(image, "png", response.getOutputStream());
		response.flushBuffer();
	}

	@RequestMapping("/generic/pdfURL.do")
	public void getUrl(@RequestParam("url") String url, @ModelAttribute("fileUploadForm") FileUploadForm fileUploadForm, HttpServletRequest request, HttpServletResponse response) throws IOException {

		URL urlObj = new URL(url);
		InputStream in = urlObj.openStream();
		try {
			List<BufferedImage> pdfToImages = IcePdf2ImageUtil.getInstance().pdfToImage(in);
			logger.info("Received : " + url);

			response.setContentType("image/png");
			BufferedImage image = PdfBoxPdf2ImageUtil.joinImages(pdfToImages);
			PdfBoxPdf2ImageUtil.write(image, "png", response.getOutputStream());
			response.flushBuffer();
		} finally {
			in.close();
		}
	}

	private List<BufferedImage> parsePdf2Images(String pdfLib, InputStream inputStream) {
		List<BufferedImage> pdfToImages = null;
		if ("ice".equalsIgnoreCase(pdfLib)) {
			pdfToImages = IcePdf2ImageUtil.getInstance().pdfToImage(inputStream);
		} else if ("pdfbox".equalsIgnoreCase(pdfLib)) {
			pdfToImages = PdfBoxPdf2ImageUtil.getInstance().pdfToImage(inputStream);
		} else if ("jpedal".equalsIgnoreCase(pdfLib)) {
			pdfToImages = JpedalPdf2ImageUtil.getInstance().pdfToImage(inputStream);
		} else {
			throw new RuntimeException("pdf library not selected");
		}
		return pdfToImages;
	}

	@Autowired
	public void setPdfService(PdfService pdfService) {
		this.pdfService = pdfService;
	}

}
