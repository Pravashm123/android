var mongoose = require("mongoose");
var Schema = mongoose.Schema;

var employeesSchema = new Schema(
    {


     name:{
         type:String,
         required:true

     },
     phone:{
         type:String,
         required:true
     },
     salary:{
         type:String,
         required:true
     },
     email:{
         type:String,
         required:true
     },
     image:{
        type:String,
        default:''
      },
      department:{
          type:String,
          required:true
      }

    }
);

var employee = mongoose.model("employee", employeesSchema);
module.exports = employee;

