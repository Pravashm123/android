var express = require("express");
var path = require("path");
var cookieParser = require("cookie-parser");
var logger = require("morgan");
var mongoose = require("mongoose");
var session = require("express-session");
var FileStore = require("session-file-store")(session);
var passport = require("passport");
var authenticate = require("./authenticate");
var auth = require("./verify");
var cors = require("cors");

const url = "mongodb://localhost:27017/hoteldb";
const connect = mongoose.connect(url, {
  useNewUrlParser: true,
  useCreateIndex: true
});
connect.then(
  db => {
    console.log("Connected to mongodb server");
  },
  err => {
    console.log(err);
  }
);
var indexRouter = require("./routes/index");
var usersRouter = require("./routes/users");
var roomRouter = require("./routes/room");
var uploadRouter = require("./routes/upload");
var roomReservation =require("./routes/roomreservation");
// var roomtypeRouter = require("./routes/roomtype");
var paymentsRouter = require("./routes/payments");
var expenseRouter=require("./routes/expense");
var employeeRouter=require("./routes/employee");

var app = express();

app.use(logger("dev"));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(express.static(path.join(__dirname, "public")));

app.use(cookieParser());

app.use(
  session({
    name: "session-id",
    secret: "mysessionkey",
    saveUninitialized: false,
    resave: false,
    store: new FileStore()
  })
);
app.use(passport.initialize());
app.use(passport.session());

app.use(
  "*",
  cors({ origin: "http://127.0.0.1:5501",
    credentials: true
  })
);


app.use("/users", usersRouter);
// app.use(auth);

app.use("/room", roomRouter);
app.use("/upload", uploadRouter);
app.use("/roomReservation",roomReservation);
// app.use("/roomtype", roomtypeRouter);
app.use("/payments", paymentsRouter);
app.use("/expense", expenseRouter);
app.use('/employee',employeeRouter);  

// app.use("/", indexRouter);

module.exports = app;
