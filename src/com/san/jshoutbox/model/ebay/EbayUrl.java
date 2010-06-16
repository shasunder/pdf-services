package com.san.jshoutbox.model.ebay;

import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;
import java.util.HashMap;
import java.util.Map;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;

import com.san.jshoutbox.util.SimpleVelocityUtil;

public class EbayUrl {
	String fullUrl;

	String endpoint;
	String operationName;
	String serviceVersion = "1.0.0"; // default
	String securityAppName;
	String globalId = "EBAY-US";
	String keywords;
	Integer entriesPerPage = 20;

	public EbayUrl(String fullUrl) {
		this.fullUrl = fullUrl;
	}

	public EbayUrl(String endpoint, String operationName, String securityAppName, String keywords) {
		this.endpoint = endpoint;
		this.operationName = operationName;
		this.securityAppName = securityAppName;
		this.keywords = keywords;
	}

	public String getEndpoint() {
		return endpoint;
	}

	public EbayUrl setEndpoint(String endpoint) {
		this.endpoint = endpoint;
		return this;
	}

	public String getOperationName() {
		return operationName;
	}

	public EbayUrl setOperationName(String operationName) {
		this.operationName = operationName;
		return this;
	}

	public String getServiceVersion() {
		return serviceVersion;
	}

	public EbayUrl setServiceVersion(String serviceVersion) {
		this.serviceVersion = serviceVersion;
		return this;
	}

	public String getSecurityAppName() {
		return securityAppName;
	}

	public EbayUrl setSecurityAppName(String securityAppName) {
		this.securityAppName = securityAppName;
		return this;
	}

	public String getGlobalId() {
		return globalId;
	}

	public EbayUrl setGlobalId(String globalId) {
		this.globalId = globalId;
		return this;
	}

	public String getKeywords() {
		return keywords;
	}

	public EbayUrl setKeywords(String keywords) {
		this.keywords = keywords;
		return this;
	}

	public Integer getEntriesPerPage() {
		return entriesPerPage;
	}

	public EbayUrl setEntriesPerPage(Integer entriesPerPage) {
		this.entriesPerPage = entriesPerPage;
		return this;
	}

	public String toFullUrl(Map<String, Object> variables) {
		return SimpleVelocityUtil.getInstance().evaluate(fullUrl, variables);
	}
	public String toUrl() {
		StringBuilder sb = new StringBuilder();
		try {
			sb.append(endpoint).append("?OPERATION-NAME=").append(operationName).append("&SERVICE-VERSION=").append(serviceVersion).append("&SECURITY-APPNAME=").append(securityAppName).append(
					"&GLOBAL-ID=").append(globalId).append("&keywords=").append(encode(keywords)).append("&paginationInput.entriesPerPage=").append(entriesPerPage);
			return sb.toString();
		} catch (Exception e) {
			throw new RuntimeException(e);
		}
	}

	private String encode(String s) throws UnsupportedEncodingException {
		return URLEncoder.encode(s, "UTF-8");
	}

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}
}
