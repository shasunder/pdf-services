package com.san.jshoutbox.model.ebay;

import java.util.List;

public class ShippingInfo {
	String shippingServiceCost;

	String shippingType;
	//List<String> shipToLocations;

	public String getShippingServiceCost() {
		return shippingServiceCost;
	}

	public void setShippingServiceCost(String shippingServiceCost) {
		this.shippingServiceCost = shippingServiceCost;
	}

	public String getShippingType() {
		return shippingType;
	}

	public void setShippingType(String shippingType) {
		this.shippingType = shippingType;
	}


}
