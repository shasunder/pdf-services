package com.san.jshoutbox.util;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.apache.commons.lang.StringUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import com.san.jshoutbox.dao.SiteDAO;
import com.san.jshoutbox.model.ebay.Site;

@Component
public class SiteUtil {

	@Autowired
	protected SiteDAO siteDAO;

	private Map<String, Object> sites; // contains site domain and aliases as key and value as site object.

	public void addSite(Site site) {
		siteDAO.createSite(site);
	}

	public void reset() {
		getSites().clear();
		loadSiteCache();
	}

	public Map<String, Object> getSites() {
		if (sites == null) { // lazy load
			loadSiteCache();
		}
		return sites;
	}

	public void loadSiteCache() {
		sites = new HashMap<String, Object>();
		List<Site> sitesList = siteDAO.readAll(Constants.MAX_QUERY_RESULT);
		for (Site site : sitesList) {

			String hostName = site.getHostName();
			String aliasEncoded = site.getAlias();
			String aliases[] = StringUtils.split(aliasEncoded, ",");
			if (aliases != null) {
				for (String alias : aliases) {
					sites.put(alias.trim(), site);
				}
			}
			sites.put(hostName.trim(), site);
		}
	}

}
