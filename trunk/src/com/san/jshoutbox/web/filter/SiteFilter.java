package com.san.jshoutbox.web.filter;

import java.io.IOException;
import java.util.Map;

import javax.servlet.Filter;
import javax.servlet.FilterChain;
import javax.servlet.FilterConfig;
import javax.servlet.ServletException;
import javax.servlet.ServletRequest;
import javax.servlet.ServletResponse;
import javax.servlet.http.HttpServletRequest;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import com.san.jshoutbox.model.ebay.Site;
import com.san.jshoutbox.util.Constants;
import com.san.jshoutbox.util.SiteUtil;

@Component
public class SiteFilter implements Filter {

	private static Log logger = LogFactory.getLog(SiteFilter.class);
	@Autowired
	SiteUtil siteUtil;

	public void init(FilterConfig config) throws ServletException {
		Map<String, Object> sites = siteUtil.getSites();
		createDefaultIfNotFound(sites);
	}

	public void doFilter(ServletRequest req, ServletResponse resp, FilterChain chain) throws IOException, ServletException {
		HttpServletRequest request = (HttpServletRequest) req;
		String hostName = request.getServerName();

		logger.debug("Request.getServerName() : " + request.getServerName());
		if ("reset".equalsIgnoreCase(request.getParameter("cache"))) {
			siteUtil.reset();
		}
		Map<String, Object> sites = siteUtil.getSites();

		Site site = sites.containsKey(hostName) ? (Site) sites.get(hostName) : (Site) sites.get("default");

		request.setAttribute("site", site);
		chain.doFilter(req, resp);
	}

	private void createDefaultIfNotFound(Map<String, Object> sites) {
		if (sites == null || sites.size() == 0 || !sites.containsKey("default")) {
			Site site = new Site();
			site.setEbayUrl(Constants.EBAY_URL_DEFAULT);
			site.setHostName("default");
			site.setTitle("default");
			site.setKeyword("");
			logger.info("creating default site"+ site.toString());
			siteUtil.addSite(site);
		}
	}

	public void destroy() {
	}

}
