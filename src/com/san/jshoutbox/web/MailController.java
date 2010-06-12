package com.san.jshoutbox.web;

import java.util.Properties;

import javax.mail.Message;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;
import javax.servlet.http.HttpServletRequest;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.util.ValidateUser;
import com.san.jshoutbox.web.command.MailCommand;

@Controller("mailController")
public class MailController {
	String viewName = "send-mail";
	
	@Autowired
	ValidateUser validateUser;
	private static Log logger = LogFactory.getLog(MailController.class);

	@RequestMapping(value = { "/mail.html", "/mail" }, method = RequestMethod.GET)
	protected ModelAndView show() throws Exception {
		return new ModelAndView(viewName);
	}

	@RequestMapping(value = { "/mail/from:{from},to:{to},subject:{subject},body:{body},password:{password}" }, method = RequestMethod.GET)
	protected ModelAndView sendUrl(HttpServletRequest request, @PathVariable("from") String from, @PathVariable("to") String to, @PathVariable("subject") String subject,
			@PathVariable("body") String body, @PathVariable("password") String password) throws Exception {
		ModelAndView mv = new ModelAndView("send-mail-result");
		MailCommand mail = new MailCommand();
		mail.setFrom(from);
		mail.setTo(to);
		mail.setSubject(subject);
		mail.setMessage(body);
		mv.getModel().put("form", mail);
		if (!validPassword(password, request)) {
			mv.setViewName("send-mail");
			mv.getModel().put("message", "Invalid password!!");
			return mv;
		}
		logger.info("Sending mail from IP : " + request.getRemoteHost() + " message : " + mail);
		sendEmail(mail);
		return mv;
	}

	@RequestMapping(value = { "/mail", "/mail.html" }, method = RequestMethod.POST)
	protected ModelAndView post(MailCommand mail, HttpServletRequest request) throws Exception {
		ModelAndView mv = new ModelAndView("send-mail-result");
		mv.getModel().put("form", mail);
		if (!validPassword(mail.getPassword(),request)) {
			mv.setViewName("send-mail");
			mv.getModel().put("message", "Invalid password!!");
			return mv;
		}
		sendEmail(mail);
		return mv;
	}

	private boolean validPassword(String password, HttpServletRequest request) {
		return validateUser.validate(ValidateUser.USER_ADMIN_EMAIL, password, request.getSession(true));
	}

	private void sendEmail(MailCommand mail) {
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
	}
}
