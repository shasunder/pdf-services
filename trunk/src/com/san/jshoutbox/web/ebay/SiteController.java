package com.san.jshoutbox.web.ebay;

import java.util.HashMap;
import java.util.Map;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.dao.SiteDAO;
import com.san.jshoutbox.model.ebay.Site;
import com.san.jshoutbox.util.Constants;

@Controller
public class SiteController {
	@Autowired
	protected SiteDAO siteDAO;

	@RequestMapping(value = { "/admin/site" }, method = { RequestMethod.GET, RequestMethod.POST })
	public ModelAndView showSiteAdd(HttpServletRequest request, HttpServletResponse response) {
		Map<String, Object> attributes = new HashMap<String, Object>();
		attributes.put("sites", siteDAO.readAll(Constants.MAX_QUERY_RESULT));
		return getLayoutMandV(attributes, "admin/site-view");
	}

	@RequestMapping(value = { "/admin/site/add-submit" }, method = RequestMethod.POST)
	public ModelAndView submitSiteAdd(Site site, HttpServletRequest request, HttpServletResponse response) {
		Long siteId = siteDAO.createSite(site);
		Map<String, Object> attributes = new HashMap<String, Object>();
		attributes.put("message", "Site added (" + siteId + ")");
		ModelAndView layoutMandV = new ModelAndView();
		layoutMandV.addAllObjects(attributes);
		layoutMandV.setViewName("forward:/admin/site");
		return layoutMandV;
	}

	protected ModelAndView getLayoutMandV(Map attributes, String viewName) {
		ModelAndView modelAndView = new ModelAndView(viewName);
		modelAndView.addAllObjects(attributes);
		return modelAndView;
	}

}
