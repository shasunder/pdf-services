package com.san.jshoutbox.model;

import java.util.Date;

import javax.jdo.annotations.IdGeneratorStrategy;
import javax.jdo.annotations.IdentityType;
import javax.jdo.annotations.NotPersistent;
import javax.jdo.annotations.PersistenceCapable;
import javax.jdo.annotations.Persistent;
import javax.jdo.annotations.PrimaryKey;

import org.apache.commons.lang.builder.ReflectionToStringBuilder;

import com.google.appengine.api.datastore.Text;

@PersistenceCapable(identityType = IdentityType.APPLICATION)
public class QuestionAnswer {

	@PrimaryKey
	@Persistent(valueStrategy = IdGeneratorStrategy.IDENTITY)
	Long id;

	@Persistent
	String language;
	@Persistent
	String category;
	@Persistent
	String subCategory;

	@Persistent
	Text questionTxt;
	
	@Persistent
	Text answerTxt;
	
	//as string lenght is small. using Text object
	@NotPersistent
	String question;
	@NotPersistent
	String answer;
	
	@Persistent
	int rating;
	@Persistent
	Date date;
	@Persistent
	int usersRated;
	@Persistent
	int level;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getQuestion() {
		return questionTxt.getValue();
	}

	public void setQuestion(String question) {
		this.question = question;
		this.questionTxt = new Text(question);
	}

	public String getAnswer() {
		return answerTxt.getValue();
	}

	public void setAnswer(String answer) {
		this.answer = answer;
		this.answerTxt = new Text(answer);
	}

	public int getRating() {
		return rating;
	}

	public void setRating(int rating) {
		this.rating = rating;
	}

	public Date getDate() {
		return date;
	}

	public void setDate(Date date) {
		this.date = date;
	}

	public int getUsersRated() {
		return usersRated;
	}

	public void setUsersRated(int usersRated) {
		this.usersRated = usersRated;
	}

	public String getLanguage() {
		return language;
	}

	public void setLanguage(String language) {
		this.language = language;
	}

	public String getCategory() {
		return category;
	}

	public void setCategory(String category) {
		this.category = category;
	}

	public String getSubCategory() {
		return subCategory;
	}

	public void setSubCategory(String subCategory) {
		this.subCategory = subCategory;
	}

	public int getLevel() {
		return level;
	}

	public void setLevel(int level) {
		this.level = level;
	}
	

	public Text getQuestionTxt() {
		return questionTxt;
	}

	public void setQuestionTxt(Text questionTxt) {
		this.questionTxt = questionTxt;
	}

	public Text getAnswerTxt() {
		return answerTxt;
	}

	public void setAnswerTxt(Text answerTxt) {
		this.answerTxt = answerTxt;
	}

	@Override
	public String toString() {
		return ReflectionToStringBuilder.toString(this);
	}

}
