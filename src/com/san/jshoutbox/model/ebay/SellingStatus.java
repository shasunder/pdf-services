package com.san.jshoutbox.model.ebay;

public class SellingStatus {
	String currentPrice;
	String convertedCurrentPrice;
	String sellingState;
	String timeLeft;
	String bidCount;
	
	public String getBidCount() {
		return bidCount;
	}

	public void setBidCount(String bidCount) {
		this.bidCount = bidCount;
	}

	public String getCurrentPrice() {
		return currentPrice;
	}

	public void setCurrentPrice(String currentPrice) {
		this.currentPrice = currentPrice;
	}

	public String getConvertedCurrentPrice() {
		return convertedCurrentPrice;
	}

	public void setConvertedCurrentPrice(String convertedCurrentPrice) {
		this.convertedCurrentPrice = convertedCurrentPrice;
	}

	public String getSellingState() {
		return sellingState;
	}

	public void setSellingState(String sellingState) {
		this.sellingState = sellingState;
	}

	public String getTimeLeft() {
		return timeLeft;
	}

	public void setTimeLeft(String timeLeft) {
		this.timeLeft = timeLeft;
	}

}
