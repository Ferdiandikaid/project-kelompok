package main

import (
	"database/sql"
	"encoding/json"
	"fmt"
	"io"
	"net/http"

	_ "github.com/go-sql-driver/mysql"
)

type UserData struct {
	Username    string `json:"username"`
	Email       string `json:"email"`
	Description string `json:"description"`
	Password    string `json:"password"`
}

func main() {
	var mux = http.NewServeMux()
	mux.HandleFunc("/sendAllData", api_sendAllData)
	fmt.Println("Server is running on port 8080")
	http.ListenAndServe(":8080", mux)
}

func connect() (*sql.DB, error) {
	connection, err := sql.Open("mysql", "root:@tcp(127.0.0.1)/database_kelompok")
	if err != nil {
		return nil, err
	}
	return connection, nil
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

	connection, err := connect()
	if err != nil {
		http.Error(w, "Failed to connect to database: "+err.Error(), http.StatusInternalServerError)
		return
	}
	defer connection.Close()

	_, err = connection.Exec("INSERT INTO users (Username, Email, Description, Password) VALUES (?, ?, ?, ?)",
		userData.Username, userData.Email, userData.Description, userData.Password)
	if err != nil {
		http.Error(w, "Error executing SQL query: "+err.Error(), http.StatusInternalServerError)
		return
	}

	jsonData, err := json.Marshal(userData)
	if err != nil {
		http.Error(w, "Error marshalling JSON: "+err.Error(), http.StatusInternalServerError)
		return
	}
	w.Header().Set("Content-Type", "application/json")
	io.WriteString(w, string(jsonData))
}
