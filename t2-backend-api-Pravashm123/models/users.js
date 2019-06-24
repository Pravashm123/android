var mongoose = require("mongoose");
var passportLocalMongoose = require("passport-local-mongoose");
var Schema = mongoose.Schema;
var userSchema = new Schema(
  {
    admin: {
      type: Boolean,
      default: false
    },
    firstname: {
      type: String,
      required: true
    },
    middlename: {
      type: String,
      required: true
    },
    lastname: {
      type: String,
      required: true
    },
    address: {
      type: String,
      required: true
    },

    contact: {
      type: String,
      required: true
    },
    email: {
      type: String,
      required: true
    }
  },
  {
    timestamps: true
  }
);
userSchema.plugin(passportLocalMongoose);

module.exports = mongoose.model("User", userSchema);
