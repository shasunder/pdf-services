package com.san.jshoutbox.dao;

import java.util.List;

import javax.jdo.PersistenceManager;

import org.springframework.stereotype.Component;

import com.san.jshoutbox.model.ebay.Site;

@Component
public class SiteDAO {

	public Long createSite(Site site) {
		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			pm.makePersistent(site);
		} finally {
			pm.close();
		}
		return site.getSiteId().getId();
	}

	public List<Site> readAll(int count) {
		PersistenceManager pm = PMF.get().getPersistenceManager();
		javax.jdo.Query q = pm.newQuery("select from " + Site.class.getName() + "");
		List<Site> entries = (List<Site>) q.execute();
		return entries;
	}
}
