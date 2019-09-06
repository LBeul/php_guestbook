<?php

	class Entry{
		private $firstName;
		public $lastName;
		public $userEmail;
		public $userEntry;
		private $entryDate;
		private $key;

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

		function getKey() {
			return $this->key;
		}

		function setKey($key) {
			$this->key = $key;
		}


		//print entry as table row 
		function printRow() {
			echo "<tr>
					<td>$this->firstName</td>
					<td>$this->lastName</td>
					<td>$this->userEmail</td>
					<td>$this->userEntry</td>
					<td>$this->key</td>
					<td>LÖSCHEN</td>
				</tr>";
		}

		//generates WHERE - part of a sql query
		static function generateQuery() {
			return " WHERE guestbookUser.userEntryKey = guestbookEntry.userEntryKey ";
		}

		function deleteSQL() {
			return "DELETE FROM guestbook " . $this->generateQuery();
		}
	}
?>