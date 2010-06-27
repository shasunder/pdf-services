package com.san.jshoutbox.web.command;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;

public class J2OCommand {

	String java;
	String result;

	public String getJava() {
		return java;
	}

	public void setJava(String java) {
		this.java = java;
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
