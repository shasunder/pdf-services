package com.san.jshoutbox.web.servlet;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;

import javax.servlet.ServletException;
import javax.servlet.ServletRequest;
import javax.servlet.ServletResponse;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.sun.enterprise.web.connector.grizzly.comet.CometContext;
import com.sun.enterprise.web.connector.grizzly.comet.CometEngine;
import com.sun.enterprise.web.connector.grizzly.comet.CometEvent;
import com.sun.enterprise.web.connector.grizzly.comet.CometHandler;

public class CometChat extends HttpServlet {

	CometEngine engine = null;
	CometContext metaContext = null;

	@Override
	public void init() throws ServletException {
		super.init();
		engine = CometEngine.getEngine();
		metaContext = engine.register("/cometchat/meta");
		System.out.println("==== metaContext registered ====="+metaContext);
		
		Thread t = new Thread() {
			public int i = 0;

			public void run() {
				while (true) {

					try {
						System.out.println("==== metaContext registered ====="+metaContext);
						Thread.sleep(10000);
						metaContext.notify(new Integer(i++));
					} catch (IOException e) {
						e.printStackTrace();
					} catch (InterruptedException e) {
						e.printStackTrace();
						return;
					}
				}
			}
		};

		t.start();
	}

	@Override
	protected void service(HttpServletRequest request,
			HttpServletResponse response) throws ServletException, IOException {

		CometResponseHandler handler = null;

		response.setContentType("text/plain");
		response.setStatus(HttpServletResponse.SC_OK);

		if (request.getRequestURI().equals("/cometchat/meta")) {
			handler = new CometResponseHandler("/cometchat/meta");
			handler.attach(response);
			metaContext.addCometHandler(handler);
		}

		PrintWriter writer = response.getWriter();
		writer.flush();
		writer.println("---START---");
		writer.flush();

	}

	/**
	 * @param args
	 */
	public static void main(String[] args) {
	}

}