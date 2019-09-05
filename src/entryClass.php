<?php

	class Entry{
		private $firstName;
		public $lastName;
		public $userEmail;
		public $userEntry;
		private $entryDate;


		// Getter and setter
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


		// Print entry as table row 
		function printRow() {
			echo "
				<tr>
					<td>$this->firstName</td>
					<td>$this->lastName</td>
					<td>$this->userEmail</td>
					<td>$this->userEntry</td>
					<td>$this->entryDate</td>
				</tr>";
		}

		// Generates WHERE - part of a sql query
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


	}

?>