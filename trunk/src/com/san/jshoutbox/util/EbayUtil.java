package com.san.jshoutbox.util;

import java.io.IOException;
import java.io.InputStream;
import java.net.URL;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.apache.commons.io.IOUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

import com.san.jshoutbox.model.ebay.FindItemsByKeywordsResponse;
import com.san.jshoutbox.model.ebay.Item;

public class EbayUtil {

	public static final String KEYWORD = "keyword";
	public static final String URL = "url";
	public static final Integer SIZE = 20;

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

	public FindItemsByKeywordsResponse toObject(String xml) {
		Map<String, Class> aliases = new HashMap<String, Class>();
		aliases.put("findItemsByKeywordsResponse", FindItemsByKeywordsResponse.class);
		aliases.put("item", Item.class);
		aliases.put("shipToLocations", String.class);
		
		FindItemsByKeywordsResponse objectMarshalled = (FindItemsByKeywordsResponse) XstreamUtil.fromXML(aliases, xml);
		return objectMarshalled;
	}

	private static EbayUtil _instance = new EbayUtil();

	private EbayUtil() { // singleton
	}

	public static EbayUtil getInstance() {
		return _instance;
	}
}
