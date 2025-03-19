require.config({ paths: { 'vs': 'node_modules/monaco-editor/min/vs' }});
require(['vs/editor/editor.main'], function() {
  const editor = monaco.editor.create(document.getElementById('editor'), { 
    value: "// Viết mã của bạn ở đây",
    language: 'javascript'
  });

  document.getElementById('submit').addEventListener('click', () => {
    const code = editor.getValue(); 
    alert("Mã của bạn:\n" + code);
    fetch('/submit', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ code })
    })
    .then(response => response.json())
    .then(data => alert(data.message))
    .catch(error => console.error('Lỗi:', error));
  });
});

const express = require('express');
const bodyParser = require('body-parser');
const app = express();

app.use(bodyParser.json());
app.use(express.static(__dirname)); 

app.post('/submit', (req, res) => {
  const { code } = req.body;
  console.log("Mã nhận được từ sinh viên:", code);
  res.json({ message: 'Bài tập đã được nộp thành công!' });
});

app.listen(3000, () => {
  console.log('Server đang chạy tại http://localhost:3000');
});