package com.san.jshoutbox.dao;

import java.util.Date;
import java.util.List;

import javax.jdo.PersistenceManager;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.apache.velocity.tools.generic.MathTool;
import org.springframework.stereotype.Component;

import com.google.appengine.api.datastore.Key;
import com.google.appengine.api.datastore.KeyFactory;
import com.san.jshoutbox.model.Quote;

@Component
public class QuoteDAO {

	private static Log logger = LogFactory.getLog(QuoteDAO.class);

	public void create(Quote quoteObj) {

		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			pm.makePersistent(quoteObj);
		} finally {
			pm.close();
		}
	}

	public void update(Quote quote) {

		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			Quote storedQuote = read(quote.getId(), pm);
			storedQuote.setAuthor(quote.getAuthor() != null ? quote.getAuthor() : storedQuote.getAuthor());
			storedQuote.setRating(quote.getRating());
			storedQuote.setQuote(quote.getQuote() != null ? quote.getQuote() : storedQuote.getQuote());
			storedQuote.setDate(new Date());
			storedQuote.setIps(quote.getIps());
			storedQuote.setUsersRated(quote.getUsersRated() > 0 ? quote.getUsersRated() : storedQuote.getUsersRated());
			// pm.makePersistent(quote);
		} finally {
			pm.close();
		}
	}

	public void updateRated(Quote quote, String ip) {

		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			Quote storedQuote = read(quote.getId(), pm);
			storedQuote.setAuthor(quote.getAuthor() != null ? quote.getAuthor() : storedQuote.getAuthor());
			if (storedQuote.getIps() != null && !storedQuote.getIps().contains(ip)) {
				storedQuote.setRating(computeTotalRating(quote, storedQuote));
				storedQuote.setUsersRated(quote.getUsersRated() > 0 ? quote.getUsersRated() : storedQuote.getUsersRated() + 1);
				storedQuote.setIps(storedQuote.getIps() + ":" + ip);
			} else if (storedQuote.getIps() == null) {
				storedQuote.setRating(computeTotalRating(quote, storedQuote));
				storedQuote.setUsersRated(quote.getUsersRated() > 0 ? quote.getUsersRated() : storedQuote.getUsersRated() + 1);
				storedQuote.setIps(ip);
			}
			storedQuote.setQuote(quote.getQuote() != null ? quote.getQuote() : storedQuote.getQuote());
			storedQuote.setDate(new Date());
			// pm.makePersistent(quote);
		} finally {
			pm.close();
		}
	}

	private int computeTotalRating(Quote quote, Quote storedQuote) {

		return quote.getRating() + storedQuote.getRating() / quote.getRating();
	}

	private Quote read(Long id, PersistenceManager pm) {
		Key k = KeyFactory.createKey(Quote.class.getSimpleName(), id);
		Quote q = pm.getObjectById(Quote.class, k);
		return q;
	}

	public Quote read(Long id) {
		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			return read(id, pm);
		} finally {
			pm.close();
		}
	}

	public void delete(Long id) {
		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			pm.deletePersistent(read(id, pm));
		} finally {
			pm.close();
		}
	}

	public List<Quote> readAll() {
		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			javax.jdo.Query q = pm.newQuery("select from " + Quote.class.getName() + " order by rating desc");
			List<Quote> entries = (List<Quote>) q.execute();
			logger.debug(entries);
			return entries;
		} finally {
			pm.close();
		}
	}
}
