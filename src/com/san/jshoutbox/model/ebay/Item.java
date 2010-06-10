package com.san.jshoutbox.model.ebay;

import java.util.List;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;

public class Item {
	String itemId;
	String title;
	String globalId;
	String galleryURL;
	String viewItemURL;
	String productId;
	List<PaymentMethod> paymentMethod;
	String autoPay;
	String postalCode;
	String location;
	String country;
	String subtitle;
	PrimaryCategory primaryCategory;
	ShippingInfo shippingInfo;
	SellingStatus sellingStatus;
	ListingInfo listingInfo;
	Condition condition;
	String galleryPlusPictureURL;
	String secondaryCategory;
	String charityId;
	public String getSecondaryCategory() {
		return secondaryCategory;
	}

	public void setSecondaryCategory(String secondaryCategory) {
		this.secondaryCategory = secondaryCategory;
	}

	public String getGalleryPlusPictureURL() {
		return galleryPlusPictureURL;
	}

	public void setGalleryPlusPictureURL(String galleryPlusPictureURL) {
		this.galleryPlusPictureURL = galleryPlusPictureURL;
	}

	public String getItemId() {
		return itemId;
	}

	public void setItemId(String itemId) {
		this.itemId = itemId;
	}

	public String getTitle() {
		return title;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	public String getGlobalId() {
		return globalId;
	}

	public void setGlobalId(String globalId) {
		this.globalId = globalId;
	}

	public String getGalleryURL() {
		return galleryURL;
	}

	public void setGalleryURL(String galleryURL) {
		this.galleryURL = galleryURL;
	}

	public String getViewItemURL() {
		return viewItemURL;
	}

	public void setViewItemURL(String viewItemURL) {
		this.viewItemURL = viewItemURL;
	}

	public String getProductId() {
		return productId;
	}

	public void setProductId(String productId) {
		this.productId = productId;
	}


	public List<PaymentMethod> getPaymentMethod() {
		return paymentMethod;
	}

	public void setPaymentMethod(List<PaymentMethod> paymentMethod) {
		this.paymentMethod = paymentMethod;
	}

	public String getAutoPay() {
		return autoPay;
	}

	public void setAutoPay(String autoPay) {
		this.autoPay = autoPay;
	}

	public String getPostalCode() {
		return postalCode;
	}

	public void setPostalCode(String postalCode) {
		this.postalCode = postalCode;
	}

	public String getLocation() {
		return location;
	}

	public void setLocation(String location) {
		this.location = location;
	}

	public String getCountry() {
		return country;
	}

	public void setCountry(String country) {
		this.country = country;
	}

	public String getSubtitle() {
		return subtitle;
	}

	public void setSubtitle(String subtitle) {
		this.subtitle = subtitle;
	}

	public PrimaryCategory getPrimaryCategory() {
		return primaryCategory;
	}

	public void setPrimaryCategory(PrimaryCategory primaryCategory) {
		this.primaryCategory = primaryCategory;
	}

	public ShippingInfo getShippingInfo() {
		return shippingInfo;
	}

	public void setShippingInfo(ShippingInfo shippingInfo) {
		this.shippingInfo = shippingInfo;
	}

	public SellingStatus getSellingStatus() {
		return sellingStatus;
	}

	public void setSellingStatus(SellingStatus sellingStatus) {
		this.sellingStatus = sellingStatus;
	}

	public ListingInfo getListingInfo() {
		return listingInfo;
	}

	public void setListingInfo(ListingInfo listingInfo) {
		this.listingInfo = listingInfo;
	}

	public Condition getCondition() {
		return condition;
	}

	public void setCondition(Condition condition) {
		this.condition = condition;
	}

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}
}
