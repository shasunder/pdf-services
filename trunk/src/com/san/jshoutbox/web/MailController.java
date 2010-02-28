package com.san.jshoutbox.web;

import java.util.Properties;

import javax.mail.Message;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

@Controller("mailController")
public class MailController {
	String viewName = "send-mail";

	@RequestMapping(value = { "/mail.html", "/mail" }, method = RequestMethod.GET)
	protected ModelAndView show() throws Exception {
		ModelAndView mv = new ModelAndView(viewName);
		return mv;
	}

	@RequestMapping(value = { "/mail/from:{from},to:{to},subject:{subject},body:{body},password:{password}" }, method = RequestMethod.GET)
	protected ModelAndView sendUrl(@PathVariable("from") String from, @PathVariable("to") String to, @PathVariable("subject") String subject, @PathVariable("body") String body,
			@PathVariable("password") String password) throws Exception {
		ModelAndView mv = new ModelAndView("send-mail-result");
		MailCommand mail = new MailCommand();
		mail.setFrom(from);
		mail.setTo(to);
		mail.setSubject(subject);
		mail.setMessage(body);

		if (!validPassword(password)) {
			mv.setViewName("send-mail");
			mv.getModel().put("message", "Invalid password!!");
			return mv;
		}

		sendEmail(mail);
		return mv;
	}

	@RequestMapping(value = { "/mail", "/mail.html" }, method = RequestMethod.POST)
	protected ModelAndView post(MailCommand mail) throws Exception {
		ModelAndView mv = new ModelAndView("send-mail-result");
		mv.getModel().put("form", mail);
		if (!validPassword(mail.getPassword())) {
			mv.setViewName("send-mail");
			mv.getModel().put("message", "Invalid password!!");
			return mv;
		}
		sendEmail(mail);
		return mv;
	}

	private boolean validPassword(String password) {
		return getPassword().equals(password);
	}

	private String getPassword() {
		//FIXME : pull this password from database!!!
		return "myfavouritepassword";
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
