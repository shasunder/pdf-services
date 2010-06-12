package com.san.jshoutbox.util;

import java.io.IOException;
import java.io.InputStream;
import java.net.URL;

import org.apache.commons.io.IOUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

import com.san.jshoutbox.model.ebay.EbayUrl;

public class EbayUtil {

	public static final String KEYWORD = "keyword";
	public static final String URL = "url";
	public static final Integer SIZE = 20;
	public static final String DEFAULT_LIVE_END_POINT = "http://svcs.ebay.com/services/search/FindingService/v1";
	public static final String DEFAULT_SANDBOX_ENDPOINT = "http://api.sandbox.ebay.com/ws/api.dll";
	public static final String DEFAULT_OPERATION = "findItemsByKeywords";
	public static final String DEFAULT_KEYWORD = "iphone";

	private static Log logger = LogFactory.getLog(EbayUtil.class);

	public String search(String url) {
		InputStream input = null;
		try {
			input = new URL(url).openStream();
			return IOUtils.toString(input);

		} catch (Exception e) {
			throw new RuntimeException(e);
		} finally {
			if (input != null)
				try {
					input.close();
				} catch (IOException e) {
					throw new RuntimeException(e);
				}
		}

	}

	public EbayUrl getDefaultEbayUrl() {
		return new EbayUrl(DEFAULT_LIVE_END_POINT, DEFAULT_OPERATION, "", DEFAULT_KEYWORD);
	}

	private static EbayUtil _instance = new EbayUtil();

	private EbayUtil() { // singleton
	}

	public static EbayUtil getInstance() {
		return _instance;
	}
}
