package com.san.jshoutbox.web;

import java.text.DateFormat;
import java.text.ParseException;
import java.util.Calendar;
import java.util.Date;
import java.util.List;

import org.apache.commons.lang.StringUtils;
import org.apache.commons.validator.routines.DateValidator;
import org.springframework.validation.Errors;
import org.springframework.validation.Validator;


public class SearchValidator implements Validator {

    public boolean supports(Class arg0) {
        
        return true;
    }

    public void validate(Object arg0, Errors arg1) {
        // TODO Auto-generated method stub
        
    }
	
}
