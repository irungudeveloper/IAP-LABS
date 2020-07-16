module.exports = app => {
  const student = require("../controllers/student.controller.js");

  // Create a new Customer
  app.post("/api/v1/student", student.create);

  // Retrieve all Customers
  app.get("/api/v1/student", student.findAll);

  // Retrieve a single Customer with customerId
  app.get("/api/v1/student/:studentId", student.findOne);

  // Update a Customer with customerId
  app.put("/api/v1/student/:studentId", student.update);

  // Delete a Customer with customerId
  app.delete("/api/v1/student/:studentId", student.delete);

};