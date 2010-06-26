package com.san.jshoutbox.util;

import java.io.IOException;
import java.util.List;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;

import org.apache.commons.fileupload.FileItemIterator;
import org.apache.commons.fileupload.FileItemStream;
import org.apache.commons.fileupload.FileUploadException;
import org.apache.commons.fileupload.servlet.ServletFileUpload;
import org.apache.commons.io.IOUtils;

import com.google.appengine.api.datastore.Blob;
import com.san.jshoutbox.model.File;
import com.san.jshoutbox.model.User;

public class WebUtil {
	private static final String SESSION_ATTRIBUTE_USER = "session.user";

	public int computeTotalRating(int ratingUser, int ratingStored) {
		return ratingUser + ratingStored / ratingUser;
	}

	public User getUserInSession(HttpServletRequest request) {
		HttpSession session = request.getSession();
		User user = (session != null) ? (User) session.getAttribute(SESSION_ATTRIBUTE_USER) : null;
		return user;
	}

	public void removeLoggedInUser(List<User> users, HttpServletRequest request) {
		User loggedInUser = getUserInSession(request);
		if (loggedInUser != null) {
			users.remove(loggedInUser);
		}
	}

	public File getFile(HttpServletRequest request) throws FileUploadException, IOException {
		ServletFileUpload upload = new ServletFileUpload();
		FileItemIterator itemIterator = upload.getItemIterator(request);
		String fileName = null, caption = null, userId = null;
		byte[] fileContent = null;
		String category=null;
		// TODO: fix this ugly hack to retreive input fields from a file upload form.
		while (itemIterator.hasNext()) {
			FileItemStream item = itemIterator.next();
			if ("caption".equals(item.getFieldName())) {
				caption = IOUtils.toString(item.openStream());
			} else if ("file".equals(item.getFieldName())) {
				fileContent = IOUtils.toByteArray(item.openStream());
				fileName = item.getName();
			} else if ("category".equals(item.getFieldName())) {
				category = IOUtils.toString(item.openStream());
			}
		}
		File file = new File();
		file.setCaption(caption);
		file.setName(fileName);
		file.setCategory(category);
		file.setType(fileName.substring(fileName.lastIndexOf(".") + 1, fileName.length()));

		file.setContent(new Blob(fileContent));
		return file;
	}

	private static WebUtil _instance = new WebUtil();

	private WebUtil() { // singleton
	}

	public static WebUtil getInstance() {
		return _instance;
	}
}
