package com.san.jshoutbox.util;

import java.io.IOException;
import java.io.InputStream;
import java.net.URL;

import org.apache.commons.io.IOUtils;

public class EbayUtil {

	public static final String KEYWORD = "keyword";
	public static final String URL = "url";
	public static final Integer SIZE = 20;

	public static String search(String url) {
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
	
	private static EbayUtil _instance = new EbayUtil();

	private EbayUtil() { //singleton
	}

	public static EbayUtil getInstance() {
		return _instance;
	}
}
