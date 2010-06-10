package com.san.jshoutbox.util;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.junit.Test;

import antlr.StringUtils;

import com.san.jshoutbox.model.ebay.EbayUrl;
import com.san.jshoutbox.model.ebay.FindItemsByKeywordsResponse;

public class EbayUtilTest {

	private static Log logger = LogFactory.getLog(EbayUtilTest.class);

	@Test
	public void testSearch() {

		FindItemsByKeywordsResponse result = getSampleResult();

		logger.info(result);
	}



	private FindItemsByKeywordsResponse getSampleResult() {
		EbayUrl ebayUrl = getSampleEbayUrl();
		
		ebayUrl.setEntriesPerPage(50).setGlobalId("EBAY-US");
		logger.info(ebayUrl.toUrl());
		FindItemsByKeywordsResponse result = EbayUtil.getInstance().search(ebayUrl.toUrl());
		return result;
	}

	private EbayUrl getSampleEbayUrl() {
		String appName = "";
		String liveEndPoint = "http://svcs.ebay.com/services/search/FindingService/v1";
		String sandboxEndPoint = "http://api.sandbox.ebay.com/ws/api.dll";
		String operation = "findItemsByKeywords";
		String keywords = "iphone";

		if(org.apache.commons.lang.StringUtils.isBlank(appName)){
			throw new RuntimeException("app name not set");
		}
		EbayUrl ebayUrl = new EbayUrl(liveEndPoint, operation, appName, keywords);
		return ebayUrl;
	}
}