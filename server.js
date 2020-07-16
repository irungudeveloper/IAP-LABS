const express = require("express");
const bodyParser = require("body-parser");
const app = express();
const port = process.env.PORT || 3000;
const host = '0.0.0.0';

//parse the requests of the content-type: app/json

app.use(bodyParser.json());

//parse requests for content-type: app/x-www-form-urlencoded

app.use(bodyParser.urlencoded({ extended:true }));

//Routes

app.get("/",(req, res)=>{

	res.json({ message: "API running" });

});


require("./app/routes/student.routes.js")(app);

app.listen(port,host, ()=>{

	console.log("Server running on port :"+port);

});