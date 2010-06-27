package com.san.jshoutbox.web.convertors;

import static com.san.jshoutbox.util.Constants.LINE;
import static com.san.jshoutbox.util.Constants.RETURN_NEW_LINE;

import java.io.ByteArrayInputStream;
import java.util.Map;

import javax.servlet.http.HttpServletRequest;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.util.Java2ObjectiveCUtil;
import com.san.jshoutbox.web.command.J2OCommand;

@Controller
public class Java2ObjectiveCController {

	private static Log logger = LogFactory.getLog(Java2ObjectiveCController.class);

	final String viewName = "java2objectivec";
	final String separator= RETURN_NEW_LINE + LINE + RETURN_NEW_LINE;

	@RequestMapping(value = { "/java2objectivec", "/j2o" }, method = RequestMethod.GET)
	public ModelAndView show() throws Exception {
		return new ModelAndView(viewName);
	}

	@RequestMapping(value = { "/java2objectivec", "/j2o" }, method = RequestMethod.POST)
	protected ModelAndView onSubmit(HttpServletRequest request, J2OCommand form) throws Exception {
		ModelAndView mv = new ModelAndView(viewName);
		try {
			String java = form.getJava();
			Map<String, String> objC = Java2ObjectiveCUtil.getInstance().javaToObjectiveC(new ByteArrayInputStream(java.getBytes()));
			String result = "";
			for (Map.Entry<String, String> entry : objC.entrySet()) {
				String key = entry.getKey();
				String value = entry.getValue();
				result = result +separator + key + separator+ value ;

			}
			form.setResult(result);

		} catch (Exception e) {
			logger.error(e, e);
			form.setResult("Sorry!! Either the java is bad or I am not smart enough to deal with it!! >:) " + e.getMessage());
		}

		mv.getModel().put("form", form);
		return mv;
	}

}
