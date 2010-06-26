package com.san.jshoutbox.dao;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.stereotype.Component;

import com.san.jshoutbox.model.File;

@Component
public class FileDAO extends BaseDAO<File> {

	private static Log logger = LogFactory.getLog(FileDAO.class);


}