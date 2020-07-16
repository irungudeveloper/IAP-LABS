const Student = require("../models/student.model.js");

//Create Student
exports.create = (req, res) => {
  // Validate request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }

  // Create a Customer
  const student = new Student({
    first_name: req.body.first_name,
    last_name: req.body.last_name,
    birth_date:req.body.birth_date,
    registration_date: req.body.registration_date
  });

  // Save Student in the database
  Student.create(student, (err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while creating the Customer."
      });
    else res.send(data);
  });
};

//Display All Students
exports.findAll = (req, res) => {
	Student.getAll((err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while retrieving students."
      });
    else res.send(data);
  });

};

//Display One Student
exports.findOne = (req, res) => {
	Student.findById(req.params.studentId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found Student with id ${req.params.studentId}.`
        });
      } else {
        res.status(500).send({
          message: "Error retrieving Student with id " + req.params.studentId
        });
      }
    } else res.send(data);
  });
};

//Update Student
exports.update = (req, res) => {
	if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }

  Student.updateById(
    req.params.studentId,
    new Student(req.body),
    (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found Student with id ${req.params.studentId}.`
          });
        } else {
          res.status(500).send({
            message: "Error updating Student with id " + req.params.studentId
          });
        }
      } else res.send(data);
    }
  );

};

//Delete Sigle Student
exports.delete = (req, res) => {
  Student.remove(req.params.studentId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found Student with id ${req.params.studentId}.`
        });
      } else {
        res.status(500).send({
          message: "Could not delete Student with id " + req.params.studentId
        });
      }
    } else res.send({ message: `Student was deleted successfully!` });
  });
};