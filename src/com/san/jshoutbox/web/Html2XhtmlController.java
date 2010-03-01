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
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.util.Html2Xhtml;

@Controller
public class Html2XhtmlController {
	String viewName = "html2Xhtml";

	private static Log logger = LogFactory.getLog(Html2XhtmlController.class);
	Html2Xhtml html2Xhtml = new Html2Xhtml();

	@RequestMapping(value = { "/html2Xhtml", "/h2x" }, method = RequestMethod.GET)
	public ModelAndView show() throws Exception {
		return new ModelAndView(viewName);
	}

	@RequestMapping(value = { "/html2Xhtml/{URL}", "/h2x/{URL}", "/html2Xhtml/http://{URL}", "/h2x/http://{URL}", "/html2Xhtml/https://{URL}", "/h2x/https://{URL}" }, method = RequestMethod.GET)
	public ModelAndView showUrl(@PathVariable("URL") String url) throws Exception {
		Map<String, String> result = new HashMap<String, String>();
		result = html2Xhtml.convert(url);

		ModelAndView modelAndView = new ModelAndView(viewName);
		if(result!=null){
			modelAndView.getModel().putAll(result);
		}
		return modelAndView;
	}

	@RequestMapping(value = { "/html2Xhtml", "/h2x" }, method = RequestMethod.POST)
	public ModelAndView post(HttpServletRequest request, HttpServletResponse response) throws Exception {
		Map<String, Object> model = new HashMap<String, Object>();

		ServletFileUpload upload = new ServletFileUpload();
		FileItemIterator itemIterator = upload.getItemIterator(request);
		if (!itemIterator.hasNext()) {
			model.put("message", "File Not found");
		} else {
			FileItemStream item = itemIterator.next();
			Map<String, String> result = new HashMap<String, String>();
			result = html2Xhtml.convert(item.openStream());
			model.putAll(result);
			model.put("file", item.getName());
		}
		return new ModelAndView(viewName, model);
	}

}
