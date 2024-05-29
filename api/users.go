package main

import (
	"database/sql"
	"fmt"
	"strconv"
	"time"

	"github.com/gin-gonic/gin"
	_ "github.com/go-sql-driver/mysql"
)

type UserData struct {
	ID          int       `json:"id"`
	Username    string    `json:"username"`
	Email       string    `json:"email"`
	Description string    `json:"description"`
	Password    string    `json:"password"`
	CreatedAt   int64     `json:"created_at"`
	Tanggal     time.Time `json:"tanggal"`
}

func main() {
	r := gin.Default()
	r.SetTrustedProxies([]string{"36.95.3.26"})

	db, err := sql.Open("mysql", "root:@tcp(127.0.0.1)/database_kelompoks?parseTime=true")
	if err != nil {
		fmt.Println(err)
		return
	}
	defer db.Close()

	r.GET("/getAllData", func(c *gin.Context) {
		userData, err := getAllData(db)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(200, userData)
	})

	r.GET("/getAllDataById/:id", func(c *gin.Context) {
		id, err := strconv.Atoi(c.Param("id"))
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid ID"})
			return
		}
		userData, err := getDataById(db, id)
		if err != nil {
			c.JSON(404, gin.H{"error": "User not found"})
			return
		}
		c.JSON(200, userData)
	})

	r.POST("/sendAllData", func(c *gin.Context) {
		var userData UserData
		err := c.BindJSON(&userData)
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid request"})
			return
		}
		userData.CreatedAt = time.Now().UnixMilli()
		userData.Tanggal = time.Unix(0, userData.CreatedAt*1e6)
		err = sendData(db, userData)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(201, gin.H{"message": "Data inserted successfully"})
	})

	r.PUT("/updateData/:id", func(c *gin.Context) {
		id, err := strconv.Atoi(c.Param("id"))
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid ID"})
			return
		}
		var userData UserData
		userData.ID = id
		err = c.BindJSON(&userData)
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid request"})
			return
		}
		err = updateData(db, userData)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(200, gin.H{"message": "Data updated successfully"})
	})

	r.DELETE("/deleteData/:id", func(c *gin.Context) {
		id, err := strconv.Atoi(c.Param("id"))
		if err != nil {
			c.JSON(400, gin.H{"error": "Invalid ID"})
			return
		}
		err = deleteData(db, id)
		if err != nil {
			c.JSON(500, gin.H{"error": err.Error()})
			return
		}
		c.JSON(200, gin.H{"message": "Data deleted successfully"})
	})

	r.Run(":8080")
}

func getAllData(db *sql.DB) ([]UserData, error) {
	var userDataArray []UserData
	data, err := db.Query("SELECT Id, Username, Email, Description, Password, Created_at, Tanggal FROM users")
	if err != nil {
		return nil, err
	}
	defer data.Close()
	for data.Next() {
		var userData UserData
		err = data.Scan(&userData.ID, &userData.Username, &userData.Email, &userData.Description, &userData.Password, &userData.CreatedAt, &userData.Tanggal)
		if err != nil {
			return nil, err
		}
		userDataArray = append(userDataArray, userData)
	}
	return userDataArray, nil
}

func getDataById(db *sql.DB, id int) ([]UserData, error) {
	var userDataArray []UserData
	querySql := "SELECT * FROM users WHERE Id=?"
	data, err := db.Query(querySql, id)
	if err != nil {
		return nil, err
	}
	defer data.Close()
	for data.Next() {
		var userData UserData
		err = data.Scan(&userData.ID, &userData.Username, &userData.Email, &userData.Description, &userData.Password, &userData.CreatedAt, &userData.Tanggal)
		if err != nil {
			return nil, err
		}
		userDataArray = append(userDataArray, userData)
	}
	return userDataArray, nil
}

func sendData(db *sql.DB, user UserData) error {
	_, err := db.Exec("INSERT INTO users (Id,Username,Email,Description,Password,Created_at,Tanggal) VALUES (?,?,?,?,?,?,?)", user.ID, user.Username, user.Email, user.Description, user.Password, user.CreatedAt, user.Tanggal)
	return err
}

func updateData(db *sql.DB, user UserData) error {
	_, err := db.Exec("UPDATE users SET Username=?, Email=?, Description=?, Password=? WHERE Id=?", user.Username, user.Email, user.Description, user.Password, user.ID)
	return err
}

func deleteData(db *sql.DB, id int) error {
	_, err := db.Exec("DELETE FROM users WHERE Id=?", id)
	return err
}
