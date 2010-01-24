package com.san.jshoutbox.web;

import java.io.File;
import java.io.IOException;
import java.io.StringWriter;
import java.util.ArrayList;
import java.util.Date;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;
import java.util.Scanner;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.lang.StringUtils;
import org.apache.velocity.Template;
import org.apache.velocity.VelocityContext;
import org.apache.velocity.app.VelocityEngine;
import org.springframework.validation.BindException;
import org.springframework.web.context.WebApplicationContext;
import org.springframework.web.context.support.WebApplicationContextUtils;
import org.springframework.web.servlet.ModelAndView;


public class YumlController extends BaseSimpleFormController {
	VelocityEngine ve;

	protected YumlController() {
		setCommandName("form");
	}

	protected ModelAndView showForm(HttpServletRequest request, HttpServletResponse response, BindException errors) throws Exception {
		viewName = "yuml";
		ModelAndView mv = new ModelAndView(viewName);
		return mv;
	}

	@Override
	protected ModelAndView onSubmit(HttpServletRequest request, HttpServletResponse response, Object command, BindException errors) throws Exception {
		WebApplicationContext webApplicationContext = WebApplicationContextUtils.getWebApplicationContext(getServletContext());
		ve=(VelocityEngine) webApplicationContext.getBean("velocityEngine");
		
		viewName = "yuml";
		ModelAndView mv = new ModelAndView(viewName);
		YumlCommand form = (YumlCommand) command;
		String result;
		try {
			result = doIt(form.getYuml());
			form.setResult(result);
		} catch (Exception e) {
			logger.error(e,e);
			form.setResult("Sorry!! Either the yuml is bad or I am not smart enough to deal with it!! >:) ");
		}
		
		mv.getModel().put("form", command);
		return mv;
	}

	private String doIt(String yuml) throws IOException, Exception {
		Scanner scanner = new Scanner(yuml);
		
		StringBuffer result = new StringBuffer();
		List entitiesList=new ArrayList();
		while (scanner.hasNextLine()) {
			VelocityContext context = new VelocityContext();

			context.put("date", new Date().toString());
			context.put("StringUtil", new StringUtils());

			String line = scanner.nextLine();
			String[] entities = StringUtils.substringsBetween(line, "[", "]");
			
			String entityName = null;
			for (int i = 0; i < entities.length; i++) {
				Map memberVariables = new LinkedHashMap();
				String entity = entities[i];
				// sanitize
				entity = StringUtils.replace(entity, "{bg:orange}", "");

				logger.info(entity);
				String[] tokens = entity.split("\\|");

				if (tokens.length == 2) {
					entityName = tokens[0];

					String memberVariablesEncoded = tokens[1];
					String[] variableKeyValEncoded = memberVariablesEncoded.split(";");
					for (int j = 0; j < variableKeyValEncoded.length; j++) {
						logger.info("processing : " + variableKeyValEncoded[j]);
						String[] variableKeyVal = variableKeyValEncoded[j].split(":");
						String variableName = variableKeyVal[0];
						String variableType = variableKeyVal.length == 2 ? variableKeyVal[1] : "$TYPE_NOT_FOUND";
						variableName = variableName.replace("+", "");
						memberVariables.put(variableName, variableType);
					}
				} else {
					entityName = tokens[0];
				}
				if(!entitiesList.contains(entityName)){
				entitiesList.add(entityName);
				}else{
					continue; //skip
				}
				
				context.put("className", entityName);
				context.put("memberVariables", memberVariables);
				String code = generateCode(context);
				result.append(code);
				
			}
		}

		return result.toString();
	}

	private String generateCode(VelocityContext context) throws Exception, IOException {

		Template t = ve.getTemplate("yumlToJava.vm");

		StringWriter writer = new StringWriter();
		t.merge(context, writer);

		System.out.println(writer.toString());
		return writer.toString();
	}

}
