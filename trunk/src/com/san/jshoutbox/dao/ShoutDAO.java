package com.san.jshoutbox.dao;

import java.util.Date;
import java.util.List;

import javax.jdo.PersistenceManager;

import com.san.jshoutbox.model.ShoutEntry;
import com.san.jshoutbox.util.DateUtil;

public class ShoutDAO {

	public void shout(String shouter, String content, String ip) {

		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			// ... do stuff with pm ...
			ShoutEntry s = new ShoutEntry();
			s.setShouter(shouter);
			s.setContent(content);
			s.setDate(new Date());
			s.setIp(ip);
			pm.makePersistent(s);
		} finally {
			pm.close();
		}
	}

	public List<ShoutEntry> readAll() {
		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			javax.jdo.Query q = pm.newQuery("select from "
					+ ShoutEntry.class.getName()+" order by date desc");
			List<ShoutEntry> entries = (List<ShoutEntry>) q.execute();
			System.out.println(entries);
			return entries;
		} finally {
			pm.close();
		}
	}
}
