THis is the Express.js lab API

Testing

To test this API, run the following routes on postman

 1.) https://crud-api-express.herokuapp.com/api/v1/student with the GET method to fetch all student data as shown below
 ![alt text](https://github.com/irungudeveloper/IAP-LABS/blob/master/getallstudents.png?raw=true)
 
 2.) https://crud-api-express.herokuapp.com/api/v1/student with the POST method and the following fields inside the body in JSON FORMAT to insert a new student
    a.) first_name
    b.) last_name
    c.) birth_date
    d.) registration_date
    
     ![alt text](https://github.com/irungudeveloper/IAP-LABS/blob/master/insertstudent.png?raw=true)
    
  3.) https://crud-api-express.herokuapp.com/api/v1/student/{id} with the GET method to fetch record of one student as shown below

       ![alt text](https://github.com/irungudeveloper/IAP-LABS/blob/master/getonestudent.png?raw=true)  
       
  4.) https://crud-api-express.herokuapp.com/api/v1/student/{id} with the PUT method and the following fields inside the body in JSON FORMAT to update an existing student
    a.) first_name
    b.) last_name
    c.) birth_date
    d.) registration_date
    
     ![alt text](https://github.com/irungudeveloper/IAP-LABS/blob/master/updatestudent.png?raw=true)
     
  5.) https://crud-api-express.herokuapp.com/api/v1/student/{id} with the DELETE method to delete record of one student. It will delete if the record is available
  
  BUGS: 
  1.) No data pagiation
  2.) The delete function returns a response on the console but not on PostMan
  
  111841-Edwin Irungu-ICS3C 
