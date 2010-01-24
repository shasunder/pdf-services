package com.san.jshoutbox.web;

import java.util.List;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.validation.BindException;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.SimpleFormController;
import org.springframework.web.servlet.view.velocity.VelocityView;

import com.san.jshoutbox.dao.ShoutDAO;
import com.san.jshoutbox.model.ShoutEntry;

public class MainController extends BaseSimpleFormController {
	ShoutDAO shoutDAO = new ShoutDAO();

	/**
	 * Set the command object name.
	 * <p>
	 * Command object is referenced using this name in view templates.
	 */
	protected MainController() {
		setCommandName("form");
	}

	/**
	 * Callback method to render the page. Overriding this to use velocity
	 * layout.
	 */
	protected ModelAndView showForm(HttpServletRequest request,
			HttpServletResponse response, BindException errors)
			throws Exception {
		List<ShoutEntry> shouts = shoutDAO.readAll();
		viewName = "index";
		ModelAndView mv= getDefaultModelAndView();
		mv.addObject("shouts", shouts);
		return mv;
	}

	@Override
	protected ModelAndView onSubmit(HttpServletRequest request,
			HttpServletResponse response, Object command, BindException errors)
			throws Exception {
		viewName = "index";
		ModelAndView mv = getDefaultModelAndView();
		ShoutBoxCommand cmd=(ShoutBoxCommand)command;
		
		shoutDAO.shout(cmd.getShouter(),cmd.getContent(), request.getRemoteHost());
		List<ShoutEntry> shouts = shoutDAO.readAll();
		mv.addObject("shouts", shouts);
		return mv;
	}

}
