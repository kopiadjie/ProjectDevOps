const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');

const app = express();
const port = 8000 || process.env.PORT;

const connection = mysql.createConnection({
  host: 'sql12.freesqldatabase.com',
  user: 'sql12677358', 
  password: 'vc7m1qNTnh', 
  database: 'sql12677358', 
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL:', err);
    return;
  }
  console.log('Connected to MySQL');
});

app.use(bodyParser.json());

// User
app.get('/', (req, res) => {
  connection.query('SELECT * FROM users', (error, results) => {
    if (error) throw error;
    res.json(results);
  });
});

// Input
app.post('/', (req, res) => {
  const { id, username, email, password } = req.body;
  const userBaru = { id, username, email, password};
  connection.query('INSERT INTO users SET ?', userBaru, (error, results) => {
    if (error) throw error;
    res.json({ message: 'User Berhasil di Tambahkan', id: results.insertId });
  });
});

// Edit
app.put('/:id', (req, res) => {
  const id = req.params.id;
  const {username, email, password} = req.body;
  connection.query('UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?', [username, email, password, id], (error, results) => {
    if (error) throw error;
    res.json({ message: 'User Berhasil di Update' });
  });
});

// Hapus
app.delete('/:id', (req, res) => {
  const id = req.params.id;
  connection.query('DELETE FROM users WHERE id = ?', id, (error, results) => {
    if (error) throw error;
    res.json({ message: 'User Telah di Hapus' });
  });
});

app.listen(port, () => {
  console.log(`Server berjalan di http://localhost:${port}`);
});
