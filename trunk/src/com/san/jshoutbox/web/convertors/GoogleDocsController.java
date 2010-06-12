package com.san.jshoutbox.web.convertors;

import java.io.InputStream;
import java.io.OutputStream;
import java.util.HashMap;
import java.util.Map;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.fileupload.FileItemIterator;
import org.apache.commons.fileupload.FileItemStream;
import org.apache.commons.fileupload.servlet.ServletFileUpload;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

import com.google.gdata.data.docs.DocumentListEntry;
import com.san.jshoutbox.service.GoogleDocService;
import com.san.jshoutbox.util.ValidateUser;

@Controller
public class GoogleDocsController {

	private static Log logger = LogFactory.getLog(GoogleDocsController.class);

	String viewName = "doc2pdf";

	@Autowired
	ValidateUser validateUser;

	String password;

	@RequestMapping(value = { "/doc2pdf", "/d2p" }, method = RequestMethod.GET)
	public ModelAndView show() throws Exception {
		return new ModelAndView(viewName);
	}

	@RequestMapping(value = { "/doc2pdf", "/d2p" }, method = RequestMethod.POST)
	public void post(HttpServletRequest request, HttpServletResponse response) throws Exception {
		Map<String, Object> model = new HashMap<String, Object>();

		ServletFileUpload upload = new ServletFileUpload();
		FileItemIterator itemIterator = upload.getItemIterator(request);
		try {
			if (!itemIterator.hasNext()) {

				model.put("message", "File Not found");
			} else {
				FileItemStream item = itemIterator.next();
				String outFormat = "pdf";
				String inFormat = item.getContentType();// "application/msword";
				response.setContentType("application/pdf");
				response.setHeader("Content-disposition", "attachment; filename=" + item.getName() + ".pdf");
				transform(ValidateUser.USER_GDOC_CONVERSION_EMAIL, getPassword(), item.getName(), item.openStream(), response.getOutputStream(), inFormat, outFormat);
				response.flushBuffer();
			}
		} catch (Exception e) {
			model.put("message", e.getMessage());
			logger.error(e,e);
		}
	}

	private String getPassword() {
		if (password == null) // caching password to improve speed.
			this.password = validateUser.getPassword(ValidateUser.USER_GDOC_CONVERSION);
		return password;
	}

	public void transform(String user, String pass, String title, InputStream in, OutputStream out, String inFormat, String downloadFormat) throws Exception {
		GoogleDocService docService = getDocService(user, pass);
		DocumentListEntry dle = docService.upload(in, inFormat, title + " - " + System.currentTimeMillis());
		docService.downloadPdf(dle.getResourceId(), out, downloadFormat);
		docService.trashObject(dle.getResourceId(), true);// clean up the file.
	}

	private GoogleDocService getDocService(String user, String pass) throws Exception {
		GoogleDocService docService = new GoogleDocService("pdf-services", GoogleDocService.DEFAULT_AUTH_PROTOCOL, GoogleDocService.DEFAULT_AUTH_HOST, GoogleDocService.DEFAULT_PROTOCOL,
				GoogleDocService.DEFAULT_HOST);
		// docService.turnOnLogging();
		logger.info("Logging in using :" + user + ":" + pass);
		docService.login(user, pass);
		return docService;
	}
}
