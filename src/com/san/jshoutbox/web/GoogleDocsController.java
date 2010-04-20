package com.san.jshoutbox.web;

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
	
	GoogleDocsController(){
		this.password = validateUser.getPassword(ValidateUser.USER_GDOC_CONVERSION_EMAIL);
	}
	@RequestMapping(value = { "/doc2pdf", "/d2p" }, method = RequestMethod.GET)
	public ModelAndView show() throws Exception {
		return new ModelAndView(viewName);
	}

	@RequestMapping(value = {"/doc2pdf","/d2p"}, method = RequestMethod.POST)
	public void post(HttpServletRequest request, HttpServletResponse response) throws Exception {
		Map<String, Object> model = new HashMap<String, Object>();

		ServletFileUpload upload = new ServletFileUpload();
		FileItemIterator itemIterator = upload.getItemIterator(request);
		if (!itemIterator.hasNext()) {
			model.put("message", "File Not found");
		} else {
			FileItemStream item = itemIterator.next();
			String outFormat = "pdf";
			String inFormat = item.getContentType();//"application/msword";
			transform(ValidateUser.USER_GDOC_CONVERSION_EMAIL, password, item.getName(), item.openStream(), response.getOutputStream(), inFormat, outFormat);
		}
	}

	public void transform(String user, String pass, String title, InputStream in, OutputStream out, String inFormat, String downloadFormat) throws Exception {
		GoogleDocService docService = getDocService(user, pass);
		DocumentListEntry dle = docService.upload(in, inFormat, title + " - " + System.currentTimeMillis());
		docService.downloadPresentation(dle.getResourceId(), out, downloadFormat);
	}

	private GoogleDocService getDocService(String user, String pass) throws Exception {
		GoogleDocService docService = new GoogleDocService("pdf-services", GoogleDocService.DEFAULT_AUTH_PROTOCOL, GoogleDocService.DEFAULT_AUTH_HOST, GoogleDocService.DEFAULT_PROTOCOL,
				GoogleDocService.DEFAULT_HOST);
		// documentList.turnOnLogging();
		docService.login(user, pass);
		return docService;
	}
}
