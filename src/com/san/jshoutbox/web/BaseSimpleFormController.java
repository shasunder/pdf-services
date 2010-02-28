package com.san.jshoutbox.web;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.validation.BindException;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.SimpleFormController;

import com.san.jshoutbox.web.view.CommonVelocityLayoutView;


public abstract class BaseSimpleFormController extends SimpleFormController {
	protected static Log log = LogFactory.getLog(BaseSimpleFormController.class);

	protected CommonVelocityLayoutView layoutView;
	protected String viewName;
	protected String title;

	/**
	 * Set the command object name.
	 * <p>
	 * Command object is referenced using this name in view templates.
	 */
	protected BaseSimpleFormController() {
		setCommandName("form");
	}

	/**
	 * Callback method to render the page. Overriding this to use velocity layout.
	 */
	@Override
	protected ModelAndView showForm(HttpServletRequest request, HttpServletResponse response, BindException errors) throws Exception {
		ModelAndView mv = super.showForm(request, response, errors);
		CommonVelocityLayoutView layoutViewTmp = getLayoutView();
		layoutViewTmp.setUrl(new StringBuilder(viewName).append(".vm").toString());
		mv.setView(layoutViewTmp);
		mv.addAllObjects(layoutViewTmp.getIncludes());
		return mv;
	}

	protected ModelAndView getDefaultModelAndView() {
		layoutView.setUrl(new StringBuilder(viewName).append(".vm").toString());
		return _getModelAndView();
	}

	protected ModelAndView getStaticModelAndView(String page) {
		layoutView.setUrl(page);
		return _getModelAndView();
	}

	private ModelAndView _getModelAndView() {
		ModelAndView mav = new ModelAndView();
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

	public void setViewName(String viewName) {
		this.viewName = viewName;
	}

	public void setTitle(String title) {
		this.title = title;
	}
}
