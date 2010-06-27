package com.san.jshoutbox.util;

import japa.parser.JavaParser;
import japa.parser.ParseException;
import japa.parser.ast.CompilationUnit;

import java.io.InputStream;
import java.util.Map;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

import com.googlecode.java2objc.converters.CompilationUnitConverter;
import com.googlecode.java2objc.main.Config;

public class Java2ObjectiveCUtil {

	/**
	 * Convert to ObjectiveC from java Document
	 */
	public Map<String, String> javaToObjectiveC(InputStream in) {
		logger.debug("Converting java to obj c ....");

		try {
			CompilationUnit cu = JavaParser.parse(in);
			Config config = new Config();
			CompilationUnitConverter conv = new CompilationUnitConverter(config, cu);
			conv.generateSourceCode();
			return conv.getResult();
		} catch (ParseException e) {
			throw new RuntimeException(e);
		}
	}

	private Java2ObjectiveCUtil() {
	}

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}

	public static synchronized Java2ObjectiveCUtil getInstance() {
		return _instance;
	}

	private static Log logger = LogFactory.getLog(Java2ObjectiveCUtil.class.getName());
	private static Java2ObjectiveCUtil _instance = new Java2ObjectiveCUtil();
}