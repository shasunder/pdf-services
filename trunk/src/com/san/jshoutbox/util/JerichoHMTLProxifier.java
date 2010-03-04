package com.san.jshoutbox.util;

import java.io.IOException;
import java.io.InputStream;
import java.net.URL;
import java.net.URLEncoder;
import java.util.List;

import net.htmlparser.jericho.Attribute;
import net.htmlparser.jericho.Element;
import net.htmlparser.jericho.HTMLElementName;
import net.htmlparser.jericho.OutputDocument;
import net.htmlparser.jericho.Source;

import org.apache.commons.lang.StringUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

public class JerichoHMTLProxifier {

	private static Log logger = LogFactory.getLog(JerichoHMTLProxifier.class);
	static String host = "jshoutbox.appspot.com"; // "localhost:8888";//
	static String proxy = "http://" + host + "/proxy/";
	static String imageProxy = "http://" + host + "/image/";

	private static JerichoHMTLProxifier _instance = new JerichoHMTLProxifier();

	private JerichoHMTLProxifier() { // singleton
	}

	public static JerichoHMTLProxifier getInstance() {
		return _instance;
	}

	public String doIt(String url) throws Exception {
		String sanitizedURL = (containsHttp(url) ? "" : Constants.HTTP_WITH_SLASH) + url;
		url = sanitizedURL;
		InputStream input = new URL(url).openStream();
		try {
			Source source = new Source(input);
			String proxified = proxify(url, source);
			return proxified;
		} finally {
			if (input != null)
				input.close();
		}
	}

	public String doIt(String url, String input) throws Exception {
		String sanitizedURL = (containsHttp(url) ? "" : Constants.HTTP_WITH_SLASH) + url;
		url = sanitizedURL;
		Source source = new Source(input);
		String proxified = proxify(url, source);
		return proxified;
	}

	public String proxify(String url, Source source) throws IOException {

		source.fullSequentialParse();
		OutputDocument outputDocument = new OutputDocument(source);

		String requestHostPart = StringUtils.substringBetween(url, "://", "/");
		String requestHost = StringUtils.substringBefore(url, "://") + "://" + requestHostPart;
		requestHost = requestHostPart == null ? url : StringUtils.substringBefore(url, "://") + "://" + requestHostPart;

		if (StringUtils.isEmpty(requestHost)) {
			requestHost = StringUtils.substringBefore(url, "/");
		}

		proxyAnchor(requestHost, source, outputDocument);
		proxyForm(requestHost, source, outputDocument);
		proxyImage(requestHost, source, outputDocument);

		String proxified = outputDocument.toString();
		logger.info(proxified);
		return proxified;
	}

	void proxyAnchor(String url, Source source, OutputDocument outputDocument) {
		List<Element> elements = source.getAllElements(HTMLElementName.A);
		for (Element element : elements) {
			Attribute hrefAttribute = element.getStartTag().getAttributes().get("href");
			if (hrefAttribute == null) {
				continue;
			}
			String href = hrefAttribute.getValue();
			String proxyTemp = getProxy(url, proxy, href);
			outputDocument.replace(hrefAttribute.getValueSegment(), proxyTemp);
			logger.info("Proxified " + href + " to " + proxyTemp);
		}
	}

	void proxyForm(String url, Source source, OutputDocument outputDocument) {
		List<Element> elements = source.getAllElements(HTMLElementName.FORM);
		for (Element element : elements) {
			Attribute actionAttribute = element.getStartTag().getAttributes().get("action");
			if (actionAttribute == null) {
				continue;
			}
			String actionValue = actionAttribute.getValue();
			String proxyTemp = getProxy(url, proxy, actionValue);
			outputDocument.replace(actionAttribute.getValueSegment(), proxyTemp);
			logger.info("Proxified " + actionValue + " to " + proxyTemp);
		}
	}

	void proxyImage(String url, Source source, OutputDocument outputDocument) {
		List<Element> elements = source.getAllElements(HTMLElementName.IMG);
		for (Element element : elements) {
			Attribute imgSrcAttribute = element.getStartTag().getAttributes().get("src");
			if (imgSrcAttribute == null) {
				continue;
			}
			String actionValue = imgSrcAttribute.getValue();
			String proxyTemp = getProxy(url, imageProxy, actionValue);
			outputDocument.replace(imgSrcAttribute.getValueSegment(), proxyTemp);
			logger.info("Proxified " + actionValue + " to " + proxyTemp);
		}
	}

	private String getProxy(String url, String proxy, String path) {
		String proxyTemp;
		try {
			String tempPath = containsHttp(path) ? path : (url + path);
			proxyTemp = proxy + "?url=" + URLEncoder.encode(tempPath, "utf-8");
		} catch (Exception e) {
			throw new RuntimeException(e);
		}
		return proxyTemp;
	}

	private boolean containsHttp(String path) {
		return (path.toLowerCase().startsWith("http:") || path.toLowerCase().startsWith("https:"));
	}

	public static void main(String[] args) throws Exception {

		String url = "http://google.com";
		new JerichoHMTLProxifier().doIt(url);
	}
}
