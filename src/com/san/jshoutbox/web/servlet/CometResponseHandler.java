package com.san.jshoutbox.web.servlet;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;

import javax.servlet.http.HttpServletResponse;

import com.sun.enterprise.web.connector.grizzly.comet.CometContext;
import com.sun.enterprise.web.connector.grizzly.comet.CometEngine;
import com.sun.enterprise.web.connector.grizzly.comet.CometEvent;
import com.sun.enterprise.web.connector.grizzly.comet.CometHandler;

public class CometResponseHandler implements CometHandler {

	private HttpServletResponse httpServletResponse;
	private String contextPath = null;

	public CometResponseHandler(String contextPath) {

	}

	public void attach(HttpServletResponse httpServletResponse) {
		this.httpServletResponse = httpServletResponse;
	}

	public void onEvent(CometEvent event) throws IOException {
		System.out.println("==== onEvent =====");
		PrintWriter printWriter = httpServletResponse.getWriter();
		printWriter.println("Handler:" + this.toString() + " - event{type:\""
				+ event.getType() + "\",\"" + event.attachment().toString()
				+ "\"}");
		printWriter.flush();

	}

	public void onInitialize(CometEvent event) throws IOException {
		System.out.println("==== onInitialize =====");
	}

	public void onTerminate(CometEvent event) throws IOException {
		System.out.println("==== onTerminate =====");
		onInterrupt(event);
	}

	public void onInterrupt(CometEvent event) throws IOException {
		System.out.println("==== onInterrupt =====");
		CometEngine cometEngine = CometEngine.getEngine();
		CometContext cometContext = cometEngine.getCometContext(contextPath);
		cometContext.removeCometHandler(this);
	}

	public void attach(Object arg0) {
		this.httpServletResponse = (HttpServletResponse) arg0;

	}
}