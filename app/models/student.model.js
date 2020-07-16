const sql = require("./db.js");

const Student = function(student){

	this.first_name = student.first_name;
	this.last_name = student.last_name;
	this.birth_date = student.birth_date;
	this.registration_date = student.registration_date;

};

Student.create = (newStudent, result)=>{

	sql.query("INSERT INTO students SET ?", newStudent, (err, res) =>{

		if (err) {
			console.log("error : ", err);
			result(err, null);
			return;
		}

		console.log("Student registered: ", {id: res.insertId, ...newStudent});
		result(null, {id: res.insertId, ...newStudent});

	});

};

Student.findById = (studentId, result) => {

	sql.query(`SELECT * FROM students WHERE id = ${studentId}`, (err,res) => {

		if (err) {
			console.log("error: ", err);
			result(err, null);
			return;
		}

		if (res.length) {
			console.log("Student Found: ", res[0]);
			result(null, res[0]);
			return;
		}

		result({ kind: "student not found" }, null);

	});

};

Student.getAll = result => {
	sql.query("SELECT * FROM students", (err, res) => {

		if (err) {
			console.log("error: ", err);
			result(null,err);
			return;
		}

		console.log("Student Records: ", res);
		result(null,res);

	});
};

Student.updateById = (id, student, result) => {
	sql.query("UPDATE students SET first_name = ?, last_name = ?, birth_date = ?, registration_date = ? WHERE id = ?", [student.first_name, student.last_name, student.birth_date, student.registration_date, id],

			(err, res) => {

				if (err) {
					console.log("error: ",err);
					result(null, err);
					return;
				}

				if (res.affectedRows == 0) {
					result({ kind: "Student not updated" },null);
					return;
				}

				console.log("updated student: ", { id: id, ...student });
      			result(null, { id: id, ...student });

			}

		);

};

Student.remove = (id, result)=>{
	sql.query("DELETE FROM students WHERE id = ?", id, (err,res) => {
		if (err) {
			console.log("error: ", err);
			result(null, err);
			return;
		}

		if (res.affectedRows == 0) {
			result({ kind: "Record not found" }, null);
			return;
		}

		console.log("Deleted Student record with id: ", id);
		return(null, res);

	});

};

module.exports = Student;