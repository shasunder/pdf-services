package com.san.jshoutbox.model.ebay;

import java.util.ArrayList;
import java.util.List;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;

public class SearchResult {
	String count;
	List<Item> item=new ArrayList<Item>();

	
	public String getCount() {
		return count;
	}


	public void setCount(String count) {
		this.count = count;
	}


	public List<Item> getItem() {
		return item;
	}


	public void setItem(List<Item> item) {
		this.item = item;
	}


	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}
}
