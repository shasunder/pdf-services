package com.san.jshoutbox.web;

import java.util.Properties;

import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.AddressException;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.validation.BindException;
import org.springframework.web.servlet.ModelAndView;

public class MailController extends BaseSimpleFormController {
	public MailController() {
		setCommandName("form");
	}

	protected ModelAndView showForm(HttpServletRequest request, HttpServletResponse response, BindException errors) throws Exception {
		viewName = "send-mail";
		ModelAndView mv = new ModelAndView(viewName);
		return mv;
	}

	@Override
	protected ModelAndView onSubmit(HttpServletRequest request, HttpServletResponse response, Object command, BindException errors) throws Exception {
		viewName = "send-mail-result";
		ModelAndView mv = new ModelAndView(viewName);
		MailCommand mail = (MailCommand) command;
		mv.getModel().put("form", mail);
		if(!"myfavouritepassword".equals(mail.getPassword())){
			mv.setViewName("send-mail");
			mv.getModel().put("message", "Invalid password!!");
			return mv;
		}
		Properties props = new Properties();
		Session session = Session.getDefaultInstance(props, null);

		String msgBody = mail.getMessage();

		try {
			Message msg = new MimeMessage(session);
			msg.setFrom(new InternetAddress(mail.getFrom()));
			msg.addRecipient(Message.RecipientType.TO, new InternetAddress(mail.getTo()));
			msg.setSubject(mail.getSubject());
			msg.setText(msgBody);
			Transport.send(msg);

		} catch (Exception e) {
			throw new RuntimeException(e);
		}
		return mv;
	}
}
