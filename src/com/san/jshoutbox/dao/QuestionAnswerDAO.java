package com.san.jshoutbox.dao;

import java.util.Date;
import java.util.List;

import javax.jdo.PersistenceManager;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;
import org.springframework.stereotype.Component;

import com.google.appengine.api.datastore.Key;
import com.google.appengine.api.datastore.KeyFactory;
import com.san.jshoutbox.model.QuestionAnswer;

@Component
public class QuestionAnswerDAO {

	private static Log logger = LogFactory.getLog(QuestionAnswerDAO.class);

	public void create(QuestionAnswer qAObj) {

		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			pm.makePersistent(qAObj);
		} finally {
			pm.close();
		}
	}

	public void update(QuestionAnswer qA) {

		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			QuestionAnswer storedQuestionBank = read(qA.getId(), pm);
			storedQuestionBank.setQuestion(qA.getQuestion());
			storedQuestionBank.setAnswer(qA.getAnswer());
			storedQuestionBank.setCategory(qA.getCategory());
			storedQuestionBank.setSubCategory(qA.getSubCategory());
			storedQuestionBank.setRating(qA.getRating());
			storedQuestionBank.setDate(new Date());
			storedQuestionBank.setLanguage(qA.getLanguage());
			storedQuestionBank.setUsersRated(qA.getUsersRated() > 0 ? qA.getUsersRated() : storedQuestionBank.getUsersRated());
			// pm.makePersistent(qA);
		} finally {
			pm.close();
		}
	}

	public void updateRated(QuestionAnswer qA, String ip) {

	}

	private int computeTotalRating(QuestionAnswer qA, QuestionAnswer storedQuestionBank) {

		return qA.getRating() + storedQuestionBank.getRating() / qA.getRating();
	}

	private QuestionAnswer read(Long id, PersistenceManager pm) {
		Key k = KeyFactory.createKey(QuestionAnswer.class.getSimpleName(), id);
		QuestionAnswer q = pm.getObjectById(QuestionAnswer.class, k);
		return q;
	}

	public QuestionAnswer read(Long id) {
		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			return read(id, pm);
		} finally {
			pm.close();
		}
	}

	public void delete(Long id) {
		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			pm.deletePersistent(read(id, pm));
		} finally {
			pm.close();
		}
	}

	public List<QuestionAnswer> readAll() {
		PersistenceManager pm = PMF.get().getPersistenceManager();
		try {
			javax.jdo.Query q = pm.newQuery("select from " + QuestionAnswer.class.getName() + " order by id desc");
			List<QuestionAnswer> entries = (List<QuestionAnswer>) q.execute();
			logger.debug(entries);
			return entries;
		} finally {
			pm.close();
		}
	}
}
