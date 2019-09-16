package main

import (
	"fmt"
	"io/ioutil"
	"math/rand"
	"time"
)

func main() {
	out := []byte{}

	// create students

	class := []student{}

	class = append(class, newStudent("Laura", "Herring"))
	class = append(class, newStudent("Anna", "Jung"))
	class = append(class, newStudent("Sara", "Froehlich"))
	class = append(class, newStudent("Louis", "Beul"))
	class = append(class, newStudent("Bartosz", "Burgiel"))
	class = append(class, newStudent("Tim", "Zirfas"))
	class = append(class, newStudent("Kai", "Sturm"))
	class = append(class, newStudent("Sara", "da Mata"))
	class = append(class, newStudent("Katharina", "Napiontek"))
	class = append(class, newStudent("Jarek", "Zielinski"))
	class = append(class, newStudent("Anna", "Rangnau"))
	class = append(class, newStudent("Melisa", "Yomralioglu"))
	class = append(class, newStudent("Christina", "Pfeifer"))
	class = append(class, newStudent("Jana", "Meudt"))
	class = append(class, newStudent("Tim", "Heuzeroth"))
	class = append(class, newStudent("Esther", "Brauer"))
	class = append(class, newStudent("Johann", "Strueder"))
	class = append(class, newStudent("Jason", "Arndt"))
	class = append(class, newStudent("Clevie", "Mundele"))
	class = append(class, newStudent("Nikita", "Railan"))
	class = append(class, newStudent("Pauline", "Schall"))

	// iterate over class and print the queries
	for _, member := range class {
		out = append(out, []byte(generateQuery(member))...)
		out = append(out, []byte("\n\n")...)
	}

	out = append(out, []byte("\n\n")...)

	// generate entries
	for n, member := range class {

		// sleep -> generation to fast :)
		time.Sleep(time.Duration(rand.Intn(100)) * time.Millisecond)

		out = append(out, []byte(generateQueryEntry(member, n))...)
		out = append(out, []byte("\n\n")...)

	}

	write(out)

	fmt.Println("dun")

}

// student struct
type student struct {
	firstName string
	lastName  string
	email     string
}

// generate entry keys
func (s student) getKey() string {
	return s.firstName + s.lastName + "Boi"
}

// getEmail generates email adress based on the name of the student
func getEmail(name, lastName string) string {
	return name + "." + lastName + "@somemail.com"
}

// generate student is quicker way to create new student struct
func newStudent(name, lastName string) student {
	return student{name, lastName, getEmail(name, lastName)}
}

// get current time in miliseconds
func getTime() int64 {
	return time.Now().UnixNano() / int64(time.Millisecond)
}

// get timestamp
func getDate(n int) string {
	return fmt.Sprintf("2019-09-06 11:30:%d", n)
}

// generate query creating a student
func generateQuery(s student) string {
	return "INSERT INTO guestbookUser \nVALUES (\n\"" + s.firstName + "\", \n\"" + s.lastName + "\", \n\"" + s.email + "\", \n\"" + s.getKey() + "\", \n\"root\" ) ;"

}

// generate "not automatically generated" entries
func generateQueryEntry(s student, n int) string {
	return "INSERT INTO guestbookEntry \nVALUES (\n" + "\"Herr Weyer ist der Allerbeste! Das ist kein automatisch generierter Eintrag.\",\n" + "\"" + s.getKey() + "\"" + ",\n\"" + getDate(n) + "\",\n" + fmt.Sprintf("\"%d\"", getTime()) + "\n) ;"
}

func write(data []byte) {
	err := ioutil.WriteFile("entries.sql", data, 0064)

	if err != nil {
		fmt.Println(err)
	}
}
