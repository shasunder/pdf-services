<tr>
									<td valign="middle" colspan="3" align="left">
									<br/>
										<span class="redText" style="font-size:18px;">Quick Search</span>
										<hr/>
									</td>
								</tr>

								<tr>

								<td align="left">

<div class="left" style="">
											<!-- SEARCH FORM ST-->
											<form method="get" action="searchresults.php" name="quicksearch" style="margin: 0px;">
												<div style="padding: 7px 0pt 3px 0px;">
													<select name="gender" style="width: 65px;">

													<?php
													if($_SESSION['Gender']=="Female")
													{
														echo "<option value='Male' selected='selected'>Groom</option>";
													}
													else if($_SESSION['Gender']=="Male")
													{
														echo "<option value='Female' selected='selected'>Bride</option>";
													}
													else
													{
														echo "<option value='Female' selected='selected'>Bride</option>";
														echo "<option value='Male' >Groom</option>";
													}
													?>


													</select>

													<!-- &nbsp; with photo <input name="photograph" value="Yes" type="checkbox" style="vertical-align: bottom;"> -->
												</div>
											  <div style="padding: 3px 0px;">
													aged <select name="agefrom" style="width: 44px;"><option selected>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option><option>60</option></select> to <select name="ageto" style="width: 44px;"><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option><option selected>60</option></select> years
												</div><div style="padding: 3px 0px;">
								<select name="countryofresidence" style="width: 140px;"><option value="">Country</option>

								<?php
									$sqlCountry = "SELECT * FROM countries order by CountryID";
									$resultCountry = mysql_query($sqlCountry, $conn);
									if (@mysql_num_rows($resultCountry)!=0){
										while($rowCountry = mysql_fetch_array($resultCountry))
										{
											?>
											<option value="<?php echo $rowCountry['CountryID']?>"
											<?php
											if($_REQUEST['CountryID'] == $rowCountry['CountryID'])
												echo "selected";
											?>
											><?php echo $rowCountry['Country']?></option>
											<?
										}
									}
									?>

								</select> &nbsp;
								</div>
								<!--div style="padding: 3px 0px; margin-right: 25px;">
								<select name="mothertongue" id="mothertongue" style="width: 125px;"><option value="">Mother Tongue</option><option value="Aka">Aka</option><option value="Arabic">Arabic</option><option value="Arunachali">Arunachali</option><option value="Assamese">Assamese</option><option value="Awadhi">Awadhi</option><option value="Baluchi">Baluchi</option><option value="Bengali">Bengali</option><option value="Bhojpuri">Bhojpuri</option><option value="Bhutia">Bhutia</option><option value="Brahui">Brahui</option><option value="Brij">Brij</option><option value="Burmese">Burmese</option><option value="Chattisgarhi">Chattisgarhi</option><option value="Chinese">Chinese</option><option value="Coorgi">Coorgi</option><option value="Dogri">Dogri</option><option value="English">English</option><option value="French">French</option><option value="Garhwali">Garhwali</option><option value="Garo">Garo</option><option value="Gujarati">Gujarati</option><option value="Haryanavi">Haryanavi</option><option value="Himachali/Pahari">Himachali/Pahari</option><option value="Hindi">Hindi</option><option value="Hindko">Hindko</option><option value="Kakbarak">Kakbarak</option><option value="Kanauji">Kanauji</option><option value="Kannada">Kannada</option><option value="Kashmiri">Kashmiri</option><option value="Khandesi">Khandesi</option><option value="Khasi">Khasi</option><option value="Konkani">Konkani</option><option value="Koshali">Koshali</option><option value="Kumaoni">Kumaoni</option><option value="Kutchi">Kutchi</option><option value="Ladakhi">Ladakhi</option><option value="Lepcha">Lepcha</option><option value="Magahi">Magahi</option><option value="Maithili">Maithili</option><option value="Malay">Malay</option><option value="Malayalam">Malayalam</option><option value="Manipuri">Manipuri</option><option value="Marathi">Marathi</option><option value="Marwari">Marwari</option><option value="Miji">Miji</option><option value="Mizo">Mizo</option><option value="Monpa">Monpa</option><option value="Nepali">Nepali</option><option value="Oriya">Oriya</option><option value="Pashto">Pashto</option><option value="Persian">Persian</option><option value="Punjabi">Punjabi</option><option value="Rajasthani">Rajasthani</option><option value="Russian">Russian</option><option value="Sanskrit">Sanskrit</option><option value="Santhali">Santhali</option><option value="Seraiki">Seraiki</option><option value="Sindhi">Sindhi</option><option value="Sinhala">Sinhala</option><option value="Spanish">Spanish</option><option value="Swedish">Swedish</option><option value="Tagalog">Tagalog</option><option value="Tamil">Tamil</option><option value="Telugu">Telugu</option><option value="Tulu">Tulu</option><option value="Urdu">Urdu</option><option value="Other">Other</option></select>

								</div-->
								<div style="padding: 3px 0px;">
								<?php include("sections/subcastes.php"); ?>

									&nbsp;&nbsp;&nbsp;<input  style="border:none;padding:1px" src="images/go.gif" title="Search" align="top" border="0" type="image"/>
								</div>

											</form>
											<!-- SEARCH FORM EN-->
										</div>
							</td>