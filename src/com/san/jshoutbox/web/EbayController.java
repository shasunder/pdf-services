package com.san.jshoutbox.web;

import java.io.StringReader;

import javax.servlet.http.HttpServletRequest;

import org.apache.commons.lang.StringUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.apache.velocity.anakia.NodeList;
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

		EbayUrl ebayUrl = ebayUtil.getDefaultEbayUrl();

		ebayUrl.setSecurityAppName(securityAppName);
		ebayUrl.setKeywords(StringUtils.defaultString(keyword, ""));

		String url = ebayUrl.toUrl();
		logger.info(url);
		String result = EbayUtil.getInstance().search(url);
		Document root = null;
		NodeList itemNodes = null;
		try {
			SAXBuilder builder = new SAXBuilder("org.apache.xerces.parsers.SAXParser");
			root = builder.build(new InputSource(new StringReader(result)));

		} catch (Exception e) {
			e.printStackTrace();
		}
		ModelAndView mv = new ModelAndView(viewName);
		mv.addObject("root", root);
		mv.addObject("itemNodes", itemNodes);

		return mv;
	}

	private void init() {
		if (securityAppName == null) {
			securityAppName = validateUser.getPassword("ebayappname");
		}
	}

}
