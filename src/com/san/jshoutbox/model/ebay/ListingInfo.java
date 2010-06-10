package com.san.jshoutbox.model.ebay;

public class ListingInfo {
	String bestOfferEnabled;
	String buyItNowAvailable;
	String buyItNowPrice;
	String startTime;
	String endTime;
	String listingType;
	String gift;
	String convertedBuyItNowPrice;

	public String getConvertedBuyItNowPrice() {
		return convertedBuyItNowPrice;
	}

	public void setConvertedBuyItNowPrice(String convertedBuyItNowPrice) {
		this.convertedBuyItNowPrice = convertedBuyItNowPrice;
	}

	public String getBuyItNowPrice() {
		return buyItNowPrice;
	}

	public void setBuyItNowPrice(String buyItNowPrice) {
		this.buyItNowPrice = buyItNowPrice;
	}

	public String getBestOfferEnabled() {
		return bestOfferEnabled;
	}

	public void setBestOfferEnabled(String bestOfferEnabled) {
		this.bestOfferEnabled = bestOfferEnabled;
	}

	public String getBuyItNowAvailable() {
		return buyItNowAvailable;
	}

	public void setBuyItNowAvailable(String buyItNowAvailable) {
		this.buyItNowAvailable = buyItNowAvailable;
	}

	public String getStartTime() {
		return startTime;
	}

	public void setStartTime(String startTime) {
		this.startTime = startTime;
	}

	public String getEndTime() {
		return endTime;
	}

	public void setEndTime(String endTime) {
		this.endTime = endTime;
	}

	public String getListingType() {
		return listingType;
	}

	public void setListingType(String listingType) {
		this.listingType = listingType;
	}

	public String getGift() {
		return gift;
	}

	public void setGift(String gift) {
		this.gift = gift;
	}

}
