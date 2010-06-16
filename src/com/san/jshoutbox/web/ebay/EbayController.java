package com.san.jshoutbox.web.ebay;

import java.io.StringReader;
import java.util.HashMap;
import java.util.Map;

import javax.servlet.http.HttpServletRequest;

import org.apache.commons.lang.StringUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.jdom.Document;
import org.jdom.input.SAXBuilder;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;
import org.xml.sax.InputSource;

import com.san.jshoutbox.model.ebay.EbayUrl;
import com.san.jshoutbox.model.ebay.Site;
import com.san.jshoutbox.util.EbayUtil;
import com.san.jshoutbox.util.ValidateUser;

@Controller
public class EbayController {
	String viewName = "ebay/listing";
	@Autowired
	ValidateUser validateUser;

	EbayUtil ebayUtil = EbayUtil.getInstance();

	// app key is stored as user password. :D
	String securityAppName;
	private static Log logger = LogFactory.getLog(EbayController.class);

	@RequestMapping(value = { "/ebay" }, method = RequestMethod.GET)
	protected ModelAndView show(@RequestParam(value = "keyword", required = false) String keyword, HttpServletRequest request) throws Exception {

		init();
		Object siteAttribute = request.getAttribute("site");
		if (siteAttribute == null) {
			logger.error("Site not found!!");
			return new ModelAndView(viewName);
		}

		Site site = (Site) siteAttribute;
		logger.info(site);

		EbayUrl ebayUrl = new EbayUrl(site.getEbayUrl());
		String keywords = StringUtils.defaultString(keyword, "");
		if (keywords==null || !keywords.contains(site.getKeyword())) {
			keywords = site.getKeyword();
		}
		
		Map<String, Object> variables = new HashMap<String, Object>();
		variables.put("keywords", keywords);
		variables.put("appname", securityAppName);
		
		String url = ebayUrl.toFullUrl(variables);
		logger.info(url);
		String result = EbayUtil.getInstance().search(url);
		Document root = null;
		try {
			SAXBuilder builder = new SAXBuilder("org.apache.xerces.parsers.SAXParser");
			root = builder.build(new InputSource(new StringReader(result)));
		} catch (Exception e) {
			e.printStackTrace();
		}
		ModelAndView mv = new ModelAndView(viewName);
		mv.addObject("root", root);
		mv.addObject("keyword", keyword);
		return mv;
	}

	private void init() {
		if (securityAppName == null) {
			securityAppName = validateUser.getPassword("ebayappname");
		}
	}

}
