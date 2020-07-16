const express = require("express");
const bodyParser = require("body-parser");
const app = express();

//parse the requests of the content-type: app/json

app.use(bodyParser.json());

//parse requests for content-type: app/x-www-form-urlencoded

app.use(bodyParser.urlencoded({ extended:true }));

//Routes

app.get("/student",(req, res)=>{

	res.json({ message: "API running" });

});


require("./app/routes/student.routes.js")(app);

app.listen(3000, ()=>{

	console.log("Server running on port 3000");

});