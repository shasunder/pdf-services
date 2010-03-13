package com.san.jshoutbox.util;

import javax.servlet.http.HttpSession;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import com.san.jshoutbox.dao.UserDAO;
import com.san.jshoutbox.model.User;

@Component
public class ValidateUser {
	@Autowired
	UserDAO userDAO;

	public static final String USER_ADMIN = "admin";
	public static final String USER_ADMIN_EMAIL = "admin-email";

	public boolean validate(String userName, String password, HttpSession session) {
		if (password == null && session.getAttribute(userName) != null) {
			password = (String) session.getAttribute(userName);
		}
		if (password == null)
			return false;
		User storedUser = userDAO.readByName(userName);
		String storePassword = storedUser.getPassword();
		session.setAttribute(userName, storePassword);
		return (password.equals(storePassword));
	}
}
