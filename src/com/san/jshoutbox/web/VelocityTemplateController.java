package com.san.jshoutbox.web;

import java.io.File;
import java.io.IOException;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.velocity.Template;
import org.apache.velocity.app.VelocityEngine;
import org.apache.velocity.runtime.parser.node.ASTprocess;
import org.springframework.validation.BindException;
import org.springframework.web.context.WebApplicationContext;
import org.springframework.web.context.support.WebApplicationContextUtils;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.util.HtmlUtils;

public class VelocityTemplateController extends BaseSimpleFormController {
	VelocityEngine ve;

	protected VelocityTemplateController() {
		setCommandName("form");
	}

	protected ModelAndView showForm(HttpServletRequest request, HttpServletResponse response, BindException errors) throws Exception {
		if (ve == null) {
			WebApplicationContext webApplicationContext = WebApplicationContextUtils.getWebApplicationContext(getServletContext());
			ve = (VelocityEngine) webApplicationContext.getBean("velocityEngine");
		}
		viewName = "velocity-manage";
		String velocityTemplate = request.getParameter("template");
		String data = getTemplate(velocityTemplate);
		VelocityCommand form = new VelocityCommand();
		data=HtmlUtils.htmlEscape(data);
		form.setVelocity(data);
		form.setTemplateName(velocityTemplate);
		ModelAndView mv = new ModelAndView(viewName);
		if (data == null) {
			form.setResult("Template not found : " + velocityTemplate);
		}
		return mv;
	}

	private String getTemplate(String velocityTemplate) throws Exception {
		Template template = ve.getTemplate(velocityTemplate);
		ASTprocess data2 = (ASTprocess) template.getData();
		return data2.literal();
	}

	@Override
	protected ModelAndView onSubmit(HttpServletRequest request, HttpServletResponse response, Object command, BindException errors) throws Exception {
		viewName = "velocity-edit";

		ModelAndView mv = new ModelAndView(viewName);
		VelocityCommand form = (VelocityCommand) command;
		String result = doIt(form.getTemplateName(), form.getVelocity());
		form.setResult(result);
		mv.getModel().put("form", command);
		return mv;
	}

	private String doIt(String velocityTemplate, String content) throws IOException, Exception {
		Template template = ve.getTemplate(velocityTemplate);
		if (template == null) {
			return "Template not found : " + velocityTemplate;
		}
		return "";
	}

}
