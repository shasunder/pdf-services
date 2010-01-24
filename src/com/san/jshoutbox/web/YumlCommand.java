package com.san.jshoutbox.web;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;

public class YumlCommand {

	String yuml;
	String result;

	public String getYuml() {
		return yuml;
	}

	public void setYuml(String yuml) {
		this.yuml = yuml;
	}

	public String getResult() {
		return result;
	}

	public void setResult(String result) {
		this.result = result;
	}

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}

}
