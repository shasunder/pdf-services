package com.san.jshoutbox.web;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.lang.builder.ToStringBuilder;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.Controller;


public abstract class BaseController implements Controller {


	protected static Log log = LogFactory.getLog(BaseController.class);

	protected CommonVelocityLayoutView layoutView;

	protected String viewName;
	protected String title;

	protected ModelAndView getDefaultModelAndView() {
		ModelAndView mav = new ModelAndView();
		layoutView.setUrl(viewName + ".vm");
		mav.setView(getLayoutView());
		mav.addAllObjects(getLayoutView().getIncludes());
		mav.addObject("title", title);
		return mav;
	}


	protected ModelAndView getStaticModelAndView(String page) {
		ModelAndView mav = new ModelAndView();
		layoutView.setUrl(page);
		mav.setView(getLayoutView());
		mav.addAllObjects(getLayoutView().getIncludes());
		mav.addObject("title", title);
		return mav;
	}

	public CommonVelocityLayoutView getLayoutView() {
		return layoutView;
	}

	public void setLayoutView(CommonVelocityLayoutView layoutView) {
		this.layoutView = layoutView;
	}

	public abstract ModelAndView handleRequest(HttpServletRequest arg0, HttpServletResponse arg1) throws Exception;

	public void setViewName(String viewName) {
		this.viewName = viewName;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	public String toString() {
		return ToStringBuilder.reflectionToString(this);
	}
}
