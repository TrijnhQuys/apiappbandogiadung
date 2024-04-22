const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');

const app = express();
const con = mysql.createConnection({
    host: 'localhost',
    database: 'qlbandogiadung',
    user: 'root',
    password: '',
});
con.connect();
app.use(bodyParser.json());

app.post('/dang-nhap', (req, res)=>{
    let sql = `SELECT * FROM users WHERE name = '${req.body.name}' AND password = '${req.body.pass}'`;
    con.query(sql, (e, r, f)=>{
        if(!e){
            if(r.length == 1)
                res.json({log: true, info: r[0]});
            else 
                res.json({log: false, message: 'Sai tên truy cập hoặc mật khẩu'});
        }
        else
            res.json({log: false, message: 'Sai tên truy cập hoặc mật khẩu'});
    });
});
app.post('/dang-ky', (req, res)=>{
    let sql = `INSERT INTO users VALUES(NULL, '${req.body.email}', '${req.body.name}', '${req.body.pass}') `;
    con.query(sql, (e, r, f)=>{
        if(!e){
            if(r.insertId > 0)
                res.json({insert: true});
            else
                res.json({insert: false});
        }
        else
            res.json({insert: false});
    });
});
app.post('/gui-tin', (req, res)=>{
    let sql = `INSERT INTO message VALUES(NULL,'${req.body.noidungShopA}') `;
    con.query(sql, (e, r, f)=>{
        if(!e){
            if(r.insertId > 0)
                res.json({insert: true});
            else
                res.json({insert: false});
        }
        else
            res.json({insert: false});
    });
});
app.listen(process.env.PORT || 3000);