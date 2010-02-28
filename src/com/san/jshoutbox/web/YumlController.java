package com.san.jshoutbox.web;

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
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.apache.velocity.Template;
import org.apache.velocity.VelocityContext;
import org.apache.velocity.app.VelocityEngine;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.util.Constants;

@Controller("yumlController")
public class YumlController {
	static final String VELOCITY_TEMPLATE_PATH = "WEB-INF/view/yumlToJava.vm";
	VelocityEngine ve = new VelocityEngine();
	String viewName = "yuml";
	static Log logger = LogFactory.getLog(YumlController.class);

	@RequestMapping(value = "/yuml", method = RequestMethod.GET)
	protected ModelAndView showForm(HttpServletRequest request, HttpServletResponse response) throws Exception {
		ModelAndView mv = new ModelAndView(viewName);
		return mv;
	}

	@RequestMapping(value = "/yuml/{encoded}", method = RequestMethod.GET)
	protected ModelAndView showForm(@PathVariable("encoded") String yumlEncoded) throws Exception {
		ModelAndView mv = new ModelAndView(viewName);
		YumlCommand form = new YumlCommand();

		form.setYumlEncoded(yumlEncoded);
		String yumlMultiLine = decodeYuml(yumlEncoded);
		form.setResult(doIt(yumlMultiLine));
		form.setYuml(yumlMultiLine);
		mv.getModel().put("form", form);
		return mv;
	}

	@RequestMapping(value = "/yuml", method = RequestMethod.POST)
	protected ModelAndView onSubmit(HttpServletRequest request, YumlCommand form) throws Exception {
		ModelAndView mv = new ModelAndView(viewName);
		try {
			String yuml = form.getYuml();
			form.setYumlEncoded(encodeYuml(yuml));
			form.setResult(doIt(yuml));
		} catch (Exception e) {
			logger.error(e, e);
			form.setResult("Sorry!! Either the yuml is bad or I am not smart enough to deal with it!! >:) ");
		}

		mv.getModel().put("form", form);
		return mv;
	}

	private String encodeYuml(String yumlMultiline) {
		String multi[] = StringUtils.split(yumlMultiline, Constants.RETURN_NEW_LINE);
		String encoded = "";
		for (int i = 0; i < multi.length; i++) {
			encoded = encoded + multi[i] + ",";
		}
		return encoded;
	}

	private String decodeYuml(String yumlEncoded) {
		String multi[] = StringUtils.split(yumlEncoded, Constants.COMMA);
		String yumlMultiLine = "";
		for (int i = 0; i < multi.length; i++) {
			yumlMultiLine = yumlMultiLine + multi[i] + Constants.RETURN_NEW_LINE;
		}
		return yumlMultiLine;
	}
	
	private String doIt(String yumlMultiLine) throws IOException, Exception {
		Scanner scanner = new Scanner(yumlMultiLine);

		StringBuffer result = new StringBuffer();
		List entitiesList = new ArrayList();
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
				if (!entitiesList.contains(entityName)) {
					entitiesList.add(entityName);
				} else {
					continue; // skip
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

		Template t = ve.getTemplate(VELOCITY_TEMPLATE_PATH);

		StringWriter writer = new StringWriter();
		t.merge(context, writer);

		System.out.println(writer.toString());
		return writer.toString();
	}

}
