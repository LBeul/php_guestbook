<?php

	class Entry{
		private $firstName;
		public $lastName;
		public $userEmail;
		public $userEntry;
		private $entryDate;


		//getter and setter
		function getFirstName() {
			return $this->firstName;
		}

		function setFirstName($firstName) {
			$this->firstName = $firstName;
		}

		function getLastName() {
			return $this->lastName;
		}

		function setLastName($lastName) {
			$this->lastName = $lastName;
		}

		function getUserEmail() {
			return $this->userEmail;
		}

		function setUserEmail($userEmail) {
			$this->userEmail = $userEmail;
		}

		function getUserEntry() {
			return $this->userEntry;
		}

		function setUserEntry($userEntry) {
			$this->userEntry = $userEntry;
		}

		function getEntryDate() {
			return $this->entryDate;
		}

		function setEntryDate($entryDate) {
			$this->entryDate = $entryDate;
		}


		//print entry as table row 
		function printRow() {
			echo "<tr>
					<td>$this->firstName</td>
					<td>$this->lastName</td>
					<td>$this->userEmail</td>
					<td>$this->userEntry</td>
					<td>$this->entryDate</td>
					<td></td>
				</tr>";
		}

		//generates WHERE - part of a sql query
		function generateQuery() {
			return "WHERE firstName = '$this->firstName'
					lastName = '$this->lastName'
					userEmail = '$this->userEmail'
					userEntry = '$this->userEntry'
					entryDate = '$this->entryDate'";
		}

		function deleteSQL() {
			return "DELETE FROM guestbook " . $this->generateQuery();
		}


		// Generate unique ID for every entry
		// ID consits of:
		// First 3 characters of name and last name
		// Mil;iseconds from current time
		// First and last 3 letters from the entry
		function generateKey() {
			
			//first 3 characters of name 
			$firstName = substr($this->firstName, 0, 3);
			
			//last 3 characters of name
			$lastName  = substr($this->lastName, 0, 3);

			//get milliseconds
			$millisec = round(microtime(true) * 1000);		

			//first 3 characters of entry
			$firstEntry = substr($this->userEntry, 0, 3);
			
			//last 3 characters of entry
			$lastEntry = substr($this->userEntry, strlen($this->userEntry)-4, strlen($this->userEntry)-1);

			return $firstName.$lastName.$millisec.$firstEntry.$lastEntry;
		}


	}

?>