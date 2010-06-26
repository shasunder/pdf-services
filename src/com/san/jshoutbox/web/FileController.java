package com.san.jshoutbox.web;

import java.io.IOException;
import java.util.Calendar;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.TimeZone;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.lang.math.RandomUtils;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.dao.FileDAO;
import com.san.jshoutbox.model.File;
import com.san.jshoutbox.util.WebUtil;

/**
 * 
 * Upload a file. Files can be rated by the user. Duplicate rating is checked using ip.
 */
@Controller
public class FileController {

	private static Log logger = LogFactory.getLog(FileController.class);
	@Autowired
	FileDAO fileDAO;

	@RequestMapping(value = { "/file/view" }, method = { RequestMethod.GET, RequestMethod.POST })
	public ModelAndView view() {
		ModelAndView mv = new ModelAndView("file/upload");
		return mv;
	}

	@RequestMapping(value = { "/file/upload" }, method = RequestMethod.POST)
	protected ModelAndView upload(HttpServletRequest request) throws Exception {

		Map<String, Object> attributes = new HashMap<String, Object>();
		File file = WebUtil.getInstance().getFile(request);
		fileDAO.create(file);
		attributes.put("message", "Thank you! You have now uploaded your file " + file.getName()+" and can view <a href=\"/file/"+file.getId()+"\">here</a>");
		ModelAndView layoutMandV = new ModelAndView();
		layoutMandV.addAllObjects(attributes);
		layoutMandV.setViewName("forward:/file/view");
		return layoutMandV;
	}

	@RequestMapping(value = { "/file/{category}/all" }, method = RequestMethod.GET)
	// eg: /file/image/all
	public ModelAndView showAll(@RequestParam(value = "size", required = false) Integer size, @PathVariable("category") String category) {
		ModelAndView mv = new ModelAndView("file/list");
		mv.addObject("files", fileDAO.read(File.class, "category =='" + category + "'", "order by date desc", size == null ? 1000 : size));
		return mv;
	}
	
	@RequestMapping(value = { "/file/{category}/ids" }, method = RequestMethod.GET)
	// eg: /file/image/all
	public ModelAndView showAllIds(@RequestParam(value = "size", required = false) Integer size, @PathVariable("category") String category) {
		ModelAndView mv = new ModelAndView("file/list-ids");
		mv.addObject("files", fileDAO.read(File.class, "category =='" + category + "'", "order by date desc", size == null ? 1000 : size));
		return mv;
	}

	@RequestMapping(value = { "/file/{id}" }, method = RequestMethod.GET)
	public void read(@PathVariable("id") Long id, HttpServletResponse response) {
		File file = fileDAO.read(id, File.class);
		if ((file.getCategory().contains("image"))) {
			response.setHeader("Cache-Control", "max-age=3600");
			response.setContentType("image/"+file.getType());
			Calendar calendarInstance = Calendar.getInstance(TimeZone.getTimeZone("GMT"));
			calendarInstance.add(Calendar.HOUR_OF_DAY, 24);// add 24 hour from now
			response.setDateHeader("Expires", calendarInstance.getTimeInMillis());
		}
		try {
			// response.setContentType("application/zip");
			response.setHeader("Content-Disposition", "inline; filename=" + file.getName());

			response.getOutputStream().write(file.getContent().getBytes());
			response.flushBuffer();
		} catch (IOException e) {
			logger.error(e, e);
		}
	}

	@RequestMapping(value = { "/file/{category}/random" }, method = RequestMethod.GET)
	public ModelAndView showRandom(@PathVariable("category") String category) {
		ModelAndView mv = new ModelAndView("file");
		List<File> files = null;
		if (files == null) {
			files = fileDAO.read(File.class, "category =='" + category + "'", "", 1000);
		}
		int random = RandomUtils.nextInt() % files.size();
		mv.addObject("file", files.get(random));
		return mv;
	}

	@RequestMapping(value = { "/file/edit" }, method = RequestMethod.POST)
	public ModelAndView update(File file) {
		fileDAO.update(file, File.class);
		ModelAndView mv = new ModelAndView("redirect:/file/admin");
		mv.addObject("message", "Updated!!");
		mv.addObject("files", fileDAO.read(File.class, 1000));
		return mv;
	}

	@RequestMapping(value = { "/file/rate/{fileId}/{rating}" }, method = RequestMethod.GET)
	public ModelAndView updateRating(@PathVariable("rating") int rating, @PathVariable("fileId") long fileId, HttpServletRequest request) {
		File file = fileDAO.read(fileId, File.class);

		int totalRating = WebUtil.getInstance().computeTotalRating(rating, file.getRating());
		String ip = request.getRemoteHost();
		if (file.getIps() != null && !file.getIps().contains(ip)) {
			file.setRating(totalRating);
			file.setUsersRated(file.getUsersRated() > 0 ? file.getUsersRated() : file.getUsersRated() + 1);
			file.setIps(file.getIps() + ":" + ip);
		} else if (file.getIps() == null) {
			file.setRating(totalRating);
			file.setUsersRated(file.getUsersRated() > 0 ? file.getUsersRated() : file.getUsersRated() + 1);
			file.setIps(ip);
		}

		fileDAO.update(file, File.class);
		ModelAndView mv = new ModelAndView("redirect:/file/" + fileId);
		return mv;
	}

}
