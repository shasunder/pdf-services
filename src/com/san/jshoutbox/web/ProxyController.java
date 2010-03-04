package com.san.jshoutbox.web;

import java.net.URL;
import java.net.URLDecoder;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.io.IOUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.util.JerichoHMTLProxifier;

@Controller
public class ProxyController {
	String viewName = "proxy";
	JerichoHMTLProxifier proxifier = JerichoHMTLProxifier.getInstance();

	private static Log logger = LogFactory.getLog(ProxyController.class);

	@RequestMapping(value = {"/proxy*", "/proxy/*" }, method = RequestMethod.GET)
	protected ModelAndView show(HttpServletRequest request, @RequestParam(value="url", required=false) String url) {
		ModelAndView mv = new ModelAndView(viewName);
		try {
			String proxyPage = proxifier.doIt(URLDecoder.decode(url,"utf-8"));
			mv.addObject("page", proxyPage);
			mv.addObject("url", url);
		} catch (Exception e) {
			logger.error(e, e);
			mv.addObject("error", e.getMessage());
		}
		return mv;
	}
	
	@RequestMapping(value = {"/image*", "/image/*"}, method = RequestMethod.GET)
	protected void get(HttpServletResponse response,  @RequestParam("url") String url) {
		try {
			IOUtils.copy(new URL(url).openStream(), response.getOutputStream());
		} catch (Exception e) {
			logger.error(e, e);
		}
	}
}
