package com.san.jshoutbox.web;

import java.io.IOException;
import java.util.Properties;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.core.io.ResourceLoader;
import org.springframework.core.io.support.PropertiesLoaderUtils;
import org.springframework.web.servlet.ModelAndView;

/**
 * Simple controller that takes as inputs a LayoutView and a content pagename and puts them together
 */
public class StaticPageViewController extends BaseController {
	private static final String TITLE_PREFIX = "title.";
	private String pageParam = "page";
	private ResourceLoader messageResourceLoader;
	private String resourceFile;
	private Properties properties;

	public StaticPageViewController() {
		super();
	}

	public StaticPageViewController(ResourceLoader messageResourceLoader, String resourceFile) {
		super();

		this.messageResourceLoader = messageResourceLoader;
		this.resourceFile = resourceFile;
		this.properties = new Properties();
		initializeProperties();
	}

	private void initializeProperties() {
		try {
			this.properties = PropertiesLoaderUtils.loadProperties(messageResourceLoader.getResource(resourceFile));
		} catch (IOException ioe) {
			log.info("Properties file '" + resourceFile + "' not found");
		}
	}

	@Override
	public ModelAndView handleRequest(HttpServletRequest request, HttpServletResponse response) throws Exception {
		String page = request.getParameter(pageParam);
		String propName = TITLE_PREFIX + request.getParameter(pageParam);
		log.debug("Looking for: " + propName);
		title = "-"; // TODO: properties.getProperty(propName);
		ModelAndView mav = getStaticModelAndView(page);

		return mav;
	}

	public void setProperties(Properties props) {
		this.properties = props;
	}

	public String getPageParam() {
		return pageParam;
	}

	public void setPageParam(String pageVar) {
		this.pageParam = pageVar;
	}

	public void setResourceFile(String resourceFile) {
		this.resourceFile = resourceFile;
	}

}
