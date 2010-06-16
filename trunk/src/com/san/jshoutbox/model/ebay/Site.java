package com.san.jshoutbox.model.ebay;

import javax.jdo.annotations.IdGeneratorStrategy;
import javax.jdo.annotations.PersistenceCapable;
import javax.jdo.annotations.Persistent;
import javax.jdo.annotations.PrimaryKey;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;

import com.google.appengine.api.datastore.Key;

@PersistenceCapable
public class Site {

	@PrimaryKey
	@Persistent(valueStrategy = IdGeneratorStrategy.IDENTITY)
	Key siteId;
	@Persistent
	String hostName;
	@Persistent
	String alias; // comma separated list of host aliases.

	@Persistent
	String title;

	@Persistent
	String keyword;

	@Persistent
	String ebayUrl;

	public String getKeyword() {
		return keyword;
	}

	public void setKeyword(String keyword) {
		this.keyword = keyword;
	}

	public String getEbayUrl() {
		return ebayUrl;
	}

	public void setEbayUrl(String ebayUrl) {
		this.ebayUrl = ebayUrl;
	}

	public String getTitle() {
		return title;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	public String getAlias() {
		return alias;
	}

	public void setAlias(String alias) {
		this.alias = alias;
	}

	public String getHostName() {
		return hostName;
	}

	public void setHostName(String hostName) {
		this.hostName = hostName;
	}

	public Key getSiteId() {
		return siteId;
	}

	public void setSiteId(Key siteId) {
		this.siteId = siteId;
	}

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}
}
