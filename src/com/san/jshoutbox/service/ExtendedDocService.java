package com.san.jshoutbox.service;

import java.io.IOException;
import java.io.InputStream;
import java.net.URL;

import com.google.gdata.client.AuthTokenFactory;
import com.google.gdata.client.docs.DocsService;
import com.google.gdata.data.DateTime;
import com.google.gdata.data.media.IMediaContent;
import com.google.gdata.util.ContentType;
import com.google.gdata.util.ServiceException;

public class ExtendedDocService extends DocsService {

	public ExtendedDocService(String applicationName){
		super(applicationName);
	}
			
	public ExtendedDocService(String applicationName, GDataRequestFactory requestFactory, AuthTokenFactory authTokenFactory) {
		super(applicationName, requestFactory, authTokenFactory);
	}

	private InputStream getMediaResource(URL mediaUrl, ContentType contentType, DateTime ifModifiedSince)
     throws IOException, ServiceException
 {
     startVersionScope();
     com.google.gdata.client.Service.GDataRequest request = createRequest(com.google.gdata.client.Service.GDataRequest.RequestType.QUERY, mediaUrl, contentType);
     request.setIfModifiedSince(ifModifiedSince);
     request.execute();
     java.io.InputStream resultStream = request.getResponseStream();
     endVersionScope();
     return resultStream;
 }

	public InputStream getMediaAsInputStream(IMediaContent mediaContent)
     throws IOException, ServiceException
 {
     URL mediaUrl = null;
     mediaUrl = new URL(mediaContent.getUri());
     return getMediaResource(mediaUrl, mediaContent.getMimeType(), null);
 }
}
