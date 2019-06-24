var mongoose = require("mongoose");
var Schema = mongoose.Schema;

var expenseSchema = new Schema(
    {
        expensedate:{
            type:Date,
            required:true

        },
        name:{
            type:String,
            required:true
        },
        rate:{
            type:String,
            required:true
        },
        expensnature:{
            type:String,
            required:true
        }

    });
    var expenses = mongoose.model("expense", expenseSchema);
module.exports = expenses;
