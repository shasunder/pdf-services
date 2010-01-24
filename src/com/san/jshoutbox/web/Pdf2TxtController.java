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
import org.springframework.validation.BindException;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.util.PDF2TextUtil;

/**
 * TODO: can only work when google app engine supports temp files.
 * @author Administrator
 *
 */
public class Pdf2TxtController extends BaseSimpleFormController {

	private static Log logger = LogFactory.getLog(Pdf2TxtController.class);

	String viewName = "pdf2txt";

	protected Pdf2TxtController() {
		setCommandName("form");
		setCommandClass(FileUploadCommand.class);
	}

	protected ModelAndView showForm(HttpServletRequest request, HttpServletResponse response, BindException errors) throws Exception {
		return new ModelAndView(viewName);
	}

	@Override
	protected ModelAndView onSubmit(HttpServletRequest request, HttpServletResponse response, Object command, BindException errors) throws Exception {
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
		}
		return new ModelAndView(viewName, model);
	}

}
