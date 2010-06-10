package com.san.jshoutbox.model.ebay;

import java.util.List;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;

public class SearchResult {
	String count;
	List<Item> items;

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}
}
