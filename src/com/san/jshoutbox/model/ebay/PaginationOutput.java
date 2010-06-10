package com.san.jshoutbox.model.ebay;

public class PaginationOutput {
	String pageNumber;
	String entriesPerPage;
	String totalPages;
	String totalEntries;

	public String getPageNumber() {
		return pageNumber;
	}

	public void setPageNumber(String pageNumber) {
		this.pageNumber = pageNumber;
	}

	public String getEntriesPerPage() {
		return entriesPerPage;
	}

	public void setEntriesPerPage(String entriesPerPage) {
		this.entriesPerPage = entriesPerPage;
	}

	public String getTotalPages() {
		return totalPages;
	}

	public void setTotalPages(String totalPages) {
		this.totalPages = totalPages;
	}

	public String getTotalEntries() {
		return totalEntries;
	}

	public void setTotalEntries(String totalEntries) {
		this.totalEntries = totalEntries;
	}

}
