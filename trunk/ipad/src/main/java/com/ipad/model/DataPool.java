package com.ipad.model;

import java.awt.image.BufferedImage;
import java.util.HashMap;
import java.util.Map;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;

/**
 * Simulates a in memory temp database
 * @author san
 * 
 */
public class DataPool {
	Map<String, Izine> pdfs = new HashMap<String, Izine>();

	public Map<String, Izine> getPdfs() {
		return pdfs;
	}

	public void setPdfs(Map<String, Izine> pdfs) {
		this.pdfs = pdfs;
	}

	public BufferedImage getPdfPage(String name, Integer pageNo) {
		Izine izine = pdfs.get(name);
		if (izine != null) {
			return izine.pages.get(pageNo);
		}
		return null;
	}

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}
	
	private static DataPool _instance = new DataPool();

	private DataPool() { //singleton
	}

	public static DataPool getInstance() {
		return _instance;
	}
}
