package com.san.jshoutbox.web;

import java.util.HashMap;
import java.util.Map;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.fileupload.FileItemIterator;
import org.apache.commons.fileupload.FileItemStream;
import org.apache.commons.fileupload.servlet.ServletFileUpload;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.util.PDF2TextUtil;

@Controller("pdf2TxtController")
public class Pdf2TxtController {

	private static Log logger = LogFactory.getLog(Pdf2TxtController.class);

	String viewName = "pdf2txt";

	@RequestMapping(value = "/pdf2txt", method = RequestMethod.GET)
	public ModelAndView show(HttpServletRequest request, HttpServletResponse response) throws Exception {
		return new ModelAndView(viewName);
	}

	@RequestMapping(value = "/pdf2txt", method = RequestMethod.POST)
	public ModelAndView post(HttpServletRequest request, HttpServletResponse response) throws Exception {
		Map<String, Object> model = new HashMap<String, Object>();

		ServletFileUpload upload = new ServletFileUpload();
		FileItemIterator itemIterator = upload.getItemIterator(request);
		if (!itemIterator.hasNext()) {
			model.put("message", "File Not found");
		} else {
			FileItemStream item = itemIterator.next();
			String pdfToText = PDF2TextUtil.getInstance().pdfToText(item.openStream());
			logger.info(pdfToText);
			model.put("pdfToText", pdfToText);
			model.put("file", item.getName());
		}
		return new ModelAndView(viewName, model);
	}

}
