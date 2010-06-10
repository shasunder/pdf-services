package com.san.jshoutbox.model.ebay;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;

public class FindItemsByKeywordsResponse {

	String ack;
	String version;
	String timestamp;
	SearchResult searchResult;
	PaginationOutput paginationOutput;

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}
}
