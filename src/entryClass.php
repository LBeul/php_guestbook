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
			$this->firstName = $lastName;
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
		function print() {
			echo "<tr>
					<td>$this->firstName</td>;
					<td>$this->lastName</td>;
					<td>$this->userEmail</td>;
					<td>$this->userEntry</td>;
					<td>$this->entryDate</td>;
				</tr>";
		}
	}

?>