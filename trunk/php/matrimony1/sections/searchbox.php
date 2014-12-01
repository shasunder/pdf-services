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
												<table>
												<tr>
												<td>Search </td>
												<td>
												   <select name="gender" style="width: 65px;">

													<?php
													if($_SESSION['Gender']=="Female"){
														echo "<option value='Male' selected='selected'>Groom</option>";
													}else if($_SESSION['Gender']=="Male")
													{
														echo "<option value='Female' selected='selected'>Bride</option>";
													}
													else{
														echo "<option value='Female' selected='selected'>Bride</option>";
														echo "<option value='Male' >Groom</option>";
													}
													?>


													</select>
												</td>
												</tr>

												<tr>
													<td>Age </td>
													<td>
														<select name="agefrom" style="width: 44px;"><option selected>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option><option>60</option></select> to <select name="ageto" style="width: 44px;"><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option selected>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option><option >60</option></select>
													</td>
													<td>yrs
													</td>
												</tr>
													<!-- &nbsp; with photo <input name="photograph" value="Yes" type="checkbox" style="vertical-align: bottom;"> -->


											  <tr>
											    <td>Caste</td>
												<td>
													<?php include("sections/subcastes.php"); ?>
												</td>

											   <td>

									<input  style="border:none;padding:1px" src="images/go.gif" title="Search" align="top" border="0" type="image"/>
												</td>
											 </tr>
								</table>
								</div>

											</form>
											<!-- SEARCH FORM EN-->
										</div>
							</td>