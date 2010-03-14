package com.san.jshoutbox.web;

import java.util.Date;
import java.util.List;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.lang.math.RandomUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

import com.san.jshoutbox.dao.QuoteDAO;
import com.san.jshoutbox.model.Quote;
import com.san.jshoutbox.util.ValidateUser;

@Controller
public class QuoteController {

	@Autowired
	QuoteDAO quoteDAO;

	@Autowired
	ValidateUser validateUser;
	List<Quote> quotes;

	@RequestMapping(value = { "/quote/admin" }, method = RequestMethod.GET)
	public ModelAndView show(@RequestParam(value="password",required=false) String password, HttpServletRequest request) {
		ModelAndView mv = new ModelAndView("quote-admin");
		if (validateUser.validate(ValidateUser.USER_ADMIN, password,request.getSession(true))) {
			mv.addObject("quotes", quoteDAO.readAll());
		} else {
			mv.addObject("message", "Invalid admin password");
		}
		return mv;
	}

	@RequestMapping(value = { "/quote/all" }, method = RequestMethod.GET)
	public ModelAndView showAll() {
		ModelAndView mv = new ModelAndView("text");
		mv.addObject("text", quoteDAO.readAll());
		return mv;
	}

	@RequestMapping(value = { "/quote/{id}" }, method = RequestMethod.GET)
	public ModelAndView read(@PathVariable("id") Long id) {
		ModelAndView mv = new ModelAndView("quote");
		mv.addObject("quote", quoteDAO.read(id));
		return mv;
	}

	@RequestMapping(value = { "/quote/random" }, method = RequestMethod.GET)
	public ModelAndView showRandom() {
		ModelAndView mv = new ModelAndView("quote");
		if (quotes == null) {
			quotes = quoteDAO.readAll();
		}
		int random = RandomUtils.nextInt() % quotes.size();
		mv.addObject("quote", quotes.get(random));
		return mv;
	}

	@RequestMapping(value = { "/quote/add" }, method = RequestMethod.POST)
	public ModelAndView add(Quote quote) {

		quote.setRating(0);
		quote.setDate(new Date());
		quoteDAO.create(quote);
		quotes.add(quote);
		ModelAndView mv = new ModelAndView("forward:/quote/admin");
		mv.addObject("message", "Added!!");
		return mv;
	}

	@RequestMapping(value = { "/quote/delete/{id}" }, method = RequestMethod.GET)
	public ModelAndView delete(@PathVariable("id") Long id, HttpServletResponse response) {

		ModelAndView mv = new ModelAndView("forward:/quote/admin");
		quoteDAO.delete(id);
		mv.addObject("message", "Deleted!!");
		return mv;
	}

	@RequestMapping(value = { "/quote/edit" }, method = RequestMethod.POST)
	public ModelAndView update(Quote quote) {
		quoteDAO.update(quote);
		ModelAndView mv = new ModelAndView("redirect:/quote/admin");
		mv.addObject("message", "Updated!!");
		mv.addObject("quotes", quoteDAO.readAll());
		return mv;
	}

	@RequestMapping(value = { "/quote/rate/{quoteId}/{rating}" }, method = RequestMethod.GET)
	public ModelAndView updateRating(@PathVariable("rating") int rating, @PathVariable("quoteId") long quoteId, HttpServletRequest request) {
		Quote quote = new Quote();
		quote.setId(quoteId);
		quote.setRating(rating);
		quoteDAO.updateRated(quote, request.getRemoteHost());
		ModelAndView mv = new ModelAndView("redirect:/quote/" + quoteId);
		return mv;
	}
}
