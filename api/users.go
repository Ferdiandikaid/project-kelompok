package main

import (
	"database/sql"
	"encoding/json"
	"fmt"
	"io"
	"net/http"
	"time"

	_ "github.com/go-sql-driver/mysql"
)

type UserData struct {
	Id          int       `json:"id"`
	Username    string    `json:"username"`
	Email       string    `json:"email"`
	Description string    `json:"description"`
	Password    string    `json:"password"`
	CreatedAt   int64     `json:"createdat"`
	Tanggal     time.Time `json:"tanggal"`
}

func main() {
	var mux = http.NewServeMux()
	mux.HandleFunc("/sendAllData", api_sendAllData)
	mux.HandleFunc("/getAllData", api_getAllData)
	fmt.Println("Server is running on port 8080")
	http.ListenAndServe(":8080", mux)
}

func connect() *sql.DB {
	connection, err := sql.Open("mysql", "root:@tcp(127.0.0.1)/database_kelompok?parseTime=true")
	if err != nil {
		panic(err)
	}
	return connection
}

func getData(connection *sql.DB) []UserData {
	var userDataArray []UserData
	data, err := connection.Query("SELECT Id, Username, Email, Description, Password, Created_at, Tanggal FROM users")
	if err != nil {
		panic(err)
	} else {
		for data.Next() {
			var userData UserData
			err = data.Scan(&userData.Id, &userData.Username, &userData.Email, &userData.Description, &userData.Password, &userData.CreatedAt, &userData.Tanggal)
			if err != nil {
				panic(err)
			} else {
				userDataArray = append(userDataArray, userData)
			}
		}
	}
	return userDataArray
}

func api_getAllData(w http.ResponseWriter, r *http.Request) {
	connection := connect()
	var userData = getData(connection)
	dataJson, err := json.Marshal(userData)
	if err != nil {
		panic(err)
	} else {
		w.Header().Set("Content-Type", "application/json")
		io.WriteString(w, string(dataJson))
	}
}

func api_sendAllData(w http.ResponseWriter, r *http.Request) {
	if r.Method != http.MethodPost {
		http.Error(w, "Method not allowed", http.StatusMethodNotAllowed)
		return
	}

	var userData UserData
	err := json.NewDecoder(r.Body).Decode(&userData)
	if err != nil {
		http.Error(w, "Error decoding JSON: "+err.Error(), http.StatusBadRequest)
		return
	}
	userData.CreatedAt = time.Now().Unix()
	err = sendData(connect(), userData)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	fmt.Println("Data inserted successfully (Print on terminal)")
	io.WriteString(w, "Data inserted successfully (Print on web/postman)")
}

func sendData(connection *sql.DB, user UserData) error {
	_, err := connection.Exec("INSERT INTO users (Id,Username,Email,Description,Password,Created_at) VALUES (?,?,?,?,?,?)", user.Id, user.Username, user.Email, user.Description, user.Password, user.CreatedAt)
	return err
}
