<?php
	if(!defined('SLOPT_CMS')) 
	{ 
		die('Lo sentimos, pero no puede acceder a este archivo!'); 
	}
	/* 
		Functions list Class User.
		---------------
		checkUser();
		hashed();
		validName();
		userData();
		emailTaken();
		userTaken();
		refUser();
		login();
		register();
		userRefClaim();
		editPassword();
		editEmail();
		editHotelSettings();
		editUsername();
	*/
	class User 
	{
		public static function checkUser($password, $passwordDb, $username)
		{
			global $dbh;
			if (substr($passwordDb, 0, 1) == "$") 
			{
				if (password_verify($password, $passwordDb))
				{
					return true;
				}
				return false;
			}
			else 
			{
				$passwordBcrypt = self::hashed($password);
				if (md5($password) == $passwordDb) 
				{	
					$stmt = $dbh->prepare("UPDATE users SET password = :password WHERE username = :username");
					$stmt->bindParam(':username', $username); 
					$stmt->bindParam(':password', $passwordBcrypt); 
					$stmt->execute(); 
					return true;
				}
				return false;	
			}
		}
		public static function hashed($password)
		{	
			return password_hash($password, PASSWORD_BCRYPT);
		}
		public static function validName($username)
		{
			if(strlen($username) <= 12 && strlen($username) >= 3 && ctype_alnum($username))
			{
				return true;
			}
			return false;
		}
		public static function userData($key)
		{
			global $dbh,$config;
			if (loggedIn())
			{
					if ($config['hotelEmu'] == 'arcturus')
				{
					if ( in_array($key, array('activity_points', 'vip_points')) )
					{
						switch($key)
						{
							case "activity_points":
							$key = '0';
							break;
							case "vip_points":
							$key = '5';
							break;
							default:
							break;
						}
						$stmt = $dbh->prepare("SELECT ".$key.",user_id,type,amount FROM users_currency WHERE user_id = :id AND type = :type");
						$stmt->bindParam(':id', $_SESSION['id']);
						$stmt->bindParam(':type', $key);
						$stmt->execute();
						if ($stmt->RowCount() > 0)
						{
							$row = $stmt->fetch();
							return $row['amount'];
						}
						else
						{
							return '0';
						}
					}
					else
					{	
						$stmt = $dbh->prepare("SELECT ".$key." FROM users WHERE id = :id");
						$stmt->bindParam(':id', $_SESSION['id']);
						$stmt->execute();
						$row = $stmt->fetch();
						return filter($row[$key]);
					}
				}
				else
				{
					$stmt = $dbh->prepare("SELECT ".$key." FROM users WHERE id = :id");
					$stmt->bindParam(':id', $_SESSION['id']);
					$stmt->execute();
					$row = $stmt->fetch();
					return filter($row[$key]);
				}
			}
			
		}
		public static function emailTaken($email)
		{
			global $dbh;
			$stmt = $dbh->prepare("SELECT mail FROM users WHERE mail = :email LIMIT 1");
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			if ($stmt->RowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public static function userTaken($username)
		{
			global $dbh;
			$stmt = $dbh->prepare("SELECT username FROM users WHERE username = :username LIMIT 1");
			$stmt->bindParam(':username', $username);
			$stmt->execute();
			if ($stmt->RowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public static function refUser($refUsername)
		{
			global $dbh, $lang;
			$getUsernameRef = $dbh->prepare("SELECT username,ip_reg FROM users WHERE username = :username LIMIT 1");
			$getUsernameRef->bindParam(':username', $refUsername);
			$getUsernameRef->execute();
			$getUsernameRefData = $getUsernameRef->fetch();
			if ($getUsernameRef->RowCount() > 0)
			{
				if ($getUsernameRefData['ip_reg'] == userIp())
				{
					html::error($lang["RsameIpRef"]);
				}
				else
				{
					return true;
				}
			}
			else
			{	
				html::error($lang["RnotExist"]);
				return false;
			}
		}
		public static function login()
		{
			global $dbh,$config,$lang;
			if (isset($_POST['login']))
			{
				if (!empty($_POST['username']))
				{
					if (!empty($_POST['password']))
					{
						$stmt = $dbh->prepare("SELECT id, password, username, rank FROM users WHERE username = :username");
						$stmt->bindParam(':username', $_POST['username']); 
						$stmt->execute();
						if ($stmt->RowCount() == 1)
						{
							$row = $stmt->fetch();
							if (self::checkUser($_POST['password'], $row['password'],$row['username']))
							{	
								$_SESSION['id'] = $row['id'];
								if (!$config['maintenance'] == true)
								{
										$userLastIp = 'ip_last';	
									$stmt = $dbh->prepare("UPDATE users SET ".$userLastIp." = :userip WHERE id = :id");
									$stmt->bindParam(':id', $_SESSION['id']);
									$stmt->bindParam(':userip', userIp());
									$stmt->execute(); 
									header('Location: '.$config['hotelUrl'].'/me');
								}
								else
								{	
									if ($row['rank'] >= $config['maintenancekMinimumRankLogin'])
									{
										$_SESSION['adminlogin'] = true;
										header('Location: '.$config['hotelUrl'].'/me');	
									}
									return html::error($lang["Mnologin"]);
								}
							}
							return html::error($lang["Lpasswordwrong"]);
						}
						return html::error( $lang["Lnotexistuser"]);
					}
					return html::error($lang["Lnopassword"]);
				}
				return html::error('');
			}
		}
		public static function register()
		{

			$userRealIp = userIp();
			global $config, $lang, $dbh;
			if (isset($_POST['register']))
			{
				if ($config['registerEnable'] == true)
				{
					if (!empty($_POST['username']))
					{
						if (self::validName($_POST['username']))
						{
							if (!empty($_POST['password']))
							{
								if (!empty($_POST['password_repeat']))
								{
									if (!empty($_POST['email']))
									{
										if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
										{
											if (!self::userTaken($_POST['username']))
											{
												if (!self::emailTaken($_POST['email']))
												{
													if (strlen($_POST['password']) >= 6)
													{
														if ($_POST['password'] == $_POST['password_repeat'])
														{	
														    $userRegIp = 'ip_reg';	
															$stmt = $dbh->prepare("SELECT ".$userRegIp." FROM users WHERE ".$userRegIp." = :userip");
															$stmt->bindParam(':userip', $userRealIp);
															
															$stmt->execute();
															if ($stmt->RowCount() < 4)
															{
																if (self::refUser($_POST['referrer']) || empty($_POST['referrer']))
																{
																	if(!$config['recaptchaSiteKeyEnable'] == true)
																	{
																		$_POST['g-recaptcha-response'] = true;
																	}
																	if ($_POST['g-recaptcha-response'])
																	{		
																		if ($_POST['genero'] == "hombre")
																		{
																		$avatar = 'ch-875-92-92.sh-3089-110.cc-3158-100.hd-185-1.lg-3023-110.hr-828-1407';
																		}
																		else
																		{
																			if ($_POST['genero'] == "mujer")
																			{
																			$avatar = 'ch-645-92.cc-9563-100.sh-3089-110.hd-628-1.lg-3023-110.hr-540-61';
																			}
																			else
																			{
																			$avatar = 'ch-645-92.cc-9563-100.sh-3089-110.hd-628-1.lg-3023-110.hr-540-61';
																			}
																		}																		
																		$motto = filter($_POST['motto'] );
																		$password = self::hashed($_POST['password']);
																			$addNewUser = $dbh->prepare("
																			INSERT INTO
																			users
																			(username, password, rank, auth_ticket, motto, account_created, last_online, mail, look, ip_current, ip_register, credits)
																			VALUES
																			(
																			:username, 
																			:password, 
																			'1',
																			:sso,
																			:motto, 
																			:time, 
																			:last_online,
																			:email, 
																			:avatar,
																			:userip, 
																			:userip, 
																			:credits
																			)");
																			$addNewUser->bindParam(':username', $_POST['username']);
																			$addNewUser->bindParam(':password', $password);
																			$addNewUser->bindParam(':motto', $motto);
																			$addNewUser->bindParam(':sso', game::sso('register'));
																			$addNewUser->bindParam(':email', $_POST['email']);
																			$addNewUser->bindParam(':avatar', $avatar);
																			$addNewUser->bindParam(':credits', $config['credits']);
																			$addNewUser->bindParam(':userip', userIp());
																			$addNewUser->bindParam(':time', strtotime('now'));
																			$addNewUser->bindParam(':last_online', strtotime('now'));
																			$addNewUser->execute();
																	    
																		
																		
																		$_SESSION['id'] = $lastId;
																		$lastId = $dbh->lastInsertId();
																		//badge register//
																		if ($_POST['placa'] == "MRG01")
																		{
																		$badge = 'MRG01';
																		}
																		else
																		{
																			if ($_POST['placa'] == "MRG02")
																			{
																			$badge = 'MRG02';
																			}
																			else
																			{
																				if ($_POST['placa'] == "MRG03")
																				{
																				$badge = 'MRG03';
																				}	
																				else
																				{
																					if ($_POST['placa'] == "MRG04")
																					{
																					$badge = 'MRG04';
																					}
																					else
																					{
																						if ($_POST['placa'] == "MRG05")
																						{
																						$badge = 'MRG05';
																						}
																						else
																						{
																							$badge = 'FAN';
																						}
																					}																					
																				}	
																			}
																		}
																			$addBadgeuser = $dbh->prepare("
																			INSERT INTO
																			user_badges
																			(user_id, badge_id)
																			VALUES
																			(
																			:user_id, 
																			:badge_id
																			)");
																			$addBadgeuser->bindParam(':user_id', $lastId);
																			$addBadgeuser->bindParam(':badge_id', $badge);
																			$addBadgeuser->execute();
																		
																			
																		//User referrer//
																		if (!empty($_POST['referrer']))
																		{	
																			$getUserRef = $dbh->prepare("SELECT id,username FROM users WHERE username = :username LIMIT 1");
																			$getUserRef->bindParam(':username', $_POST['referrer']);
																			$getUserRef->execute();
																			$getInfoRefUser = $getUserRef->fetch();
																			$addRef = $dbh->prepare("
																			INSERT INTO
																			referrer
																			(userid, refid,diamonds)
																			VALUES
																			(
																			:lastid, 
																			:refid,
																			:diamonds
																			)");
																			$addRef->bindParam(':lastid', $lastId);
																			$addRef->bindParam(':refid', $getInfoRefUser['id']);
																			$addRef->bindParam(':diamonds', $config['diamondsRef']);
																			$addRef->execute();
																			$stmt = $dbh->prepare("SELECT*FROM referrerbank WHERE userid = :id LIMIT 1");
																			$stmt->bindParam(':id', $getInfoRefUser['id']);
																			$stmt->execute();
																			if ($stmt->RowCount() == 0)
																			{
																				$addDiamondsRow = $dbh->prepare("
																				INSERT INTO
																				referrerbank
																				(userid,diamonds)
																				VALUES
																				(
																				:lastid, 
																				:diamonds
																				)");
																				$addDiamondsRow->bindParam(':lastid', $getInfoRefUser['id']);
																				$addDiamondsRow->bindParam(':diamonds', $config['diamondsRef']);
																				$addDiamondsRow->execute();
																			}
																			else
																			{
																				$addDiamonds = $dbh->prepare("
																				UPDATE referrerbank SET 
																				diamonds=diamonds + :diamonds 
																				WHERE 
																				userid=:lastid
																				");
																				$addDiamonds->bindParam(':lastid', $getInfoRefUser['id']);
																				$addDiamonds->bindParam(':diamonds', $config['diamondsRef']);
																				$addDiamonds->execute(); 
																			}
																			$_SESSION['id'] = $lastId;
																		}
																		
																		else
																		{
																			$_SESSION['id'] = $lastId;
																		}
																	}
																	else
																	{
																		return html::error($lang["Rrobot"]); 
																	}
																}
															}
															else
															{
																return html::error($lang["Rmaxaccounts"]); 
															}
														}
														else
														{
															return html::error($lang["Rpasswordswrong"]);
														}
													}
													else
													{
														return html::error($lang["Rpasswordshort"]); 
													}
												}
												else
												{
													return html::error($lang["Remailexists"]);
												}
											}
											else
											{
												return html::error($lang["Rusernameused"]);
											}
										}
										else
										{
											return html::error($lang["Remailnotallowed"]);
										}
									}
									else
									{
										return html::error($lang["Remailempty"]);
									}
								}
								else
								{
									return html::error($lang["Rpasswordsempty"]); 
								}
							}
							else
							{
								return html::error($lang["Rpasswordsempty"]); 
							}
						}
						else
						{
							return html::error($lang["Rusernameshort"]);
						}
					}
					else
					{
						return html::error($lang["Rusrnameempty"]);
					}
				}
				else
				{
					return html::error($lang["RregisterDisable"]);
				}
			}
		}
		public static function userRefClaim()
		{
			global $dbh, $lang;
			if (isset($_POST['claimdiamonds']))
			{
				if (User::userData('online') == 0)
				{
					$bankCount = $dbh->prepare("SELECT userid,diamonds FROM referrerbank WHERE userid = :userid");
					$bankCount->bindParam(':userid', $_SESSION['id']);
					$bankCount->execute();
					$bankCountData = $bankCount->fetch();
					if ($bankCountData['diamonds'] == 0)
					{
						return html::error($lang["MrefNoDia"]);
					}
					else
					{
						$addDiamondsRef = $dbh->prepare("
						UPDATE users SET 
						vip_points=vip_points + :diamonds 
						WHERE 
						id=:id
						");
						$addDiamondsRef->bindParam(':id', $_SESSION['id']);
						$addDiamondsRef->bindParam(':diamonds', $bankCountData['diamonds']);
						$addDiamondsRef->execute();
						$DiamondsCountRemove = $dbh->prepare("
						UPDATE referrerbank SET 
						diamonds = 0 
						WHERE 
						userid=:userid
						");
						$DiamondsCountRemove->bindParam(':userid', $_SESSION['id']);
						$DiamondsCountRemove->execute();
						return html::errorSucces($lang["MrefSucces"]);
					}	
				}
				else
				{
					return html::error($lang["MrefOnline"]);
				}
			}
		}
		public static function userRewardclain()
		{
			global $dbh, $lang;
			if (isset($_POST['clainrewards']))
			{
				if (User::userData('online') == 0)
				{
					$bankCount = $dbh->prepare("SELECT rewards FROM users WHERE id = :userid");
					$bankCount->bindParam(':userid', $_SESSION['id']);
					$bankCount->execute();
					$bankCountData = $bankCount->fetch();
						$addDiamondsRef = $dbh->prepare("
						UPDATE users SET 
						vip_points=vip_points + :rewards 
						WHERE 
						id=:id
						");
		echo '				
	<div id="notice">
	<i class="fa fa-trophy fa-3x" id="trophy-icon"></i>
	<span id="notice-title">'.$lang["Succes1"].'</span>
	<span id="notice-desc">
		'.$bankCountData['rewards'].' Diamantes recibidos
		</span>
</div>
						
						';
						$addDiamondsRef->bindParam(':id', $_SESSION['id']);
						$addDiamondsRef->bindParam(':rewards', $bankCountData['rewards']);
						$addDiamondsRef->execute();
						$DiamondsCountRemove = $dbh->prepare("
						UPDATE users SET 
						rewards = 0 
						WHERE 
						id=:userid
						");
						$DiamondsCountRemove->bindParam(':userid', $_SESSION['id']);
						$DiamondsCountRemove->execute();
						
				}
				else
				{
							return html::error($lang["MrefOnline"]);

				}
			}
		}
		Public static function editPassword()
		{
			global $dbh,$lang;
			if (isset($_POST['password']))
			{
				if (isset($_POST['oldpassword']) && !empty($_POST['oldpassword']))
				{
					if (isset($_POST['newpassword']) && !empty($_POST['newpassword']))
					{
						$stmt = $dbh->prepare("SELECT id, password, username FROM users WHERE id = :id");
						$stmt->bindParam(':id', $_SESSION['id']);
						$stmt->execute();
						$getInfo = $stmt->fetch();
						if (self::checkUser(filter($_POST['oldpassword']), $getInfo['password'], filter($getInfo['username'])))
						{
							if (strlen($_POST['newpassword']) >= 6)
							{
								$newPassword = self::hashed($_POST['newpassword']);
								$stmt = $dbh->prepare("
								UPDATE 
								users 
								SET password = 
								:newpassword 
								WHERE id = 
								:id
								");
								$stmt->bindParam(':newpassword', $newPassword); 
								$stmt->bindParam(':id', $_SESSION['id']); 
								$stmt->execute(); 
								return Html::errorSucces($lang["Ppasswordchanges"]);
							}
							else
							{
								return Html::error($lang["Ppasswordshort"]);
							}
						}
						else
						{
							return Html::error($lang["Poldpasswordwrong"]);
						}
					}
					else
					{
					return Html::error($lang["Ppasswordold"]);
					}
				}
				else
				{
						return Html::error($lang["Ppasswordnew"]);
				}
			}
		}
		Public static function editEmail()
		{
			global $lang,$dbh;
			if (isset($_POST['account']))
			{
				if (isset($_POST['email']) && !empty($_POST['email']))
				{
					if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
					{
						if (!self::emailTaken($_POST['email']))
						{
							$stmt = $dbh->prepare("
							UPDATE 
							users 
							SET mail = 
							:newmail
							WHERE id = 
							:id
							");
							$stmt->bindParam(':newmail', $_POST['email']); 
							$stmt->bindParam(':id', $_SESSION['id']); 
							$stmt->execute(); 
							return Html::errorSucces($lang["Eemailchanges"]);
						}
						else
						{
							return Html::error($lang["Eemailexists"]);
						}
					}
					else
					{
						return Html::error($lang["Eemailnotallowed"]);
					}
				}
				else
				{
					return Html::error($lang["Enoemail"]);
				}
			}
		}
		Public static function editHotelSettings()
		{
			global $lang,$dbh;
			if (isset($_POST['hinstellingenv']))
			{
				$stmt = $dbh->prepare("
				UPDATE 
				users 
				SET ignore_invites = 
				:hinstellingenv
				WHERE id = 
				:id
				");
				$stmt->bindParam(':hinstellingenv', $_POST['hinstellingenv']); 
				$stmt->bindParam(':id', $_SESSION['id']); 
				$stmt->execute(); 
			}
			if (isset($_POST['hinstellingenl']))
			{
				$stmt = $dbh->prepare("
				UPDATE 
				users 
				SET allow_mimic = 
				:hinstellingenl
				WHERE id = 
				:id
				");
				$stmt->bindParam(':hinstellingenl', $_POST['hinstellingenl']); 
				$stmt->bindParam(':id', $_SESSION['id']); 
				$stmt->execute(); 
			}
			if (isset($_POST['hinstellingeno']))
			{
				$stmt = $dbh->prepare("
				UPDATE 
				users 
				SET hide_online = 
				:hinstellingeno
				WHERE id = 
				:id
				");
				$stmt->bindParam(':hinstellingeno', $_POST['hinstellingeno']); 
				$stmt->bindParam(':id', $_SESSION['id']); 
				$stmt->execute(); 
			}
			if (isset($_POST['hotelsettings']))
			{
				return Html::errorSucces($lang["Hchanges"]);
			}
		}
		Public static function editUsername()
		{
			global $lang,$dbh;
			if (isset($_POST['editusername']))
			{
				if(!User::userData('fbenable') == 1)
				{
					if(!self::userTaken($_POST['username']))
					{
						if(self::validName($_POST['username']))
						{
							$stmt = $dbh->prepare("UPDATE users SET username = :username, fbenable = '1' WHERE id = :id");
							$stmt->bindParam(':username', $_POST['username']); 
							$stmt->bindParam(':id', $_SESSION['id']); 
							$stmt->execute(); 
							header('Location: '.$config['hotelUrl'].'/me');
						}
						else
						{
							return Html::error($lang["Cusernameshort"]);
						}
					}
					else
					{
						return html::error($lang["Cusernameused"]);
					}
				}
				else
				{
					return html::error($lang["Cchangeno"]);
				}
			}
		}
	}
?>																																	