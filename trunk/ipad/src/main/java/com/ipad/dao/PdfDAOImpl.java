/*
 * @author Sandeep.Maloth
 */
package com.ipad.dao;

import static com.ipad.common.Constants.ERROR_CODE_400;
import static com.ipad.common.Constants.ERROR_CODE_404;
import static com.ipad.common.Constants.SQL_OUT_PARAM_ERROR_CODE;
import static com.ipad.common.Constants.SQL_OUT_PARAM_ERROR_DESC;
import static com.ipad.common.Constants.SQL_OUT_PARAM_TRANSACTION_ID;

import java.util.HashMap;
import java.util.Map;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.stereotype.Component;

import com.ipad.common.PdfException;
import com.ipad.common.util.DBUtils;
import com.ipad.model.Pdf;

/**
 * Implements the contract defined by PdfDAO.
 */
@Component
public class PdfDAOImpl implements PdfDAO {

	private static Log logger = LogFactory.getLog(PdfDAOImpl.class);
	private static DBUtils dbUtils = DBUtils.getInstance();

	public void create(Pdf pdf) {

		Map result = new HashMap();
		checkErrorsAndThrowWhenFailed(result, ERROR_CODE_400);
	}

	/**
	 * @throws PdfException when pdf not found!!
	 */
	public Pdf readById(String pdfId) {
		Pdf pdf = null;
		return pdf;
	}

	public void update(Pdf pdf) {
		Map result = new HashMap();
		checkErrorsAndThrowWhenFailed(result, ERROR_CODE_404);
	}

	public void delete(Pdf pdf) {
		Map result = new HashMap();
		checkErrorsAndThrowWhenFailed(result, ERROR_CODE_404);
	}

	protected void checkErrorsAndThrowWhenFailed(Map result, String httpStatusCode) {
		if (result.get(SQL_OUT_PARAM_ERROR_CODE) != null || result.get(SQL_OUT_PARAM_ERROR_DESC) != null) {
			throw new PdfException("An exception occured in stored procedure while storing pdf!", dbUtils.defaultEmpty(result.get(SQL_OUT_PARAM_TRANSACTION_ID)), result.get(SQL_OUT_PARAM_ERROR_CODE)
					+ "", result.get(SQL_OUT_PARAM_ERROR_DESC) + "", httpStatusCode);
		}
	}
}
